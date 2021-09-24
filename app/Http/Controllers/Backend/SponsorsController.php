<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\OurSponsors; 

/**
 * Class SponsorsController.
 */
class SponsorsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.sponsors.index');
    }

    public function createSponsor()
    {
        return view('backend.sponsors.create');
    }

    public function storeSponsor(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/our_sponsors'),$imageName);

        $sponsor = new OurSponsors;

        $sponsor->user_id = $user_id;
        $sponsor->name = $request->name;
        $sponsor->country = $request->country;
        $sponsor->url = $request->url;
        $sponsor->status = 'Approved';
        $sponsor->image = $imageName;

        $sponsor->save();

        
        return redirect()->route('admin.sponsors.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getSponsors(Request $request)
    {
        if($request->ajax())
        {
            $data = OurSponsors::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.sponsors.edit_sponsor', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->addColumn('image', function($data){
                    $img = '<img src="'.url('images/our_sponsors', $data->image).'" style="width: 70%">';
                 
                    return $img;
                })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<span class="badge bg-success">Approved</span>';
                    }else{
                        $status = '<span class="badge bg-warning text-dark">Pending</span>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action','image', 'status'])
                ->make(true);
        }
        
        return back();
    }


    public function editSponsor($id)
    {

        $sponsor = OurSponsors::where('id',$id)->first();

        return view('backend.sponsors.edit', ['sponsor' => $sponsor]);
    }

    public function updateSponsor(Request $request)
    {    
        
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/our_sponsors'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }
        
        $sponsor = DB::table('our_sponsors') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'country' => $request->country,
                'url' => $request->url,
                'image' => $imageName,
                'status' => $request->status
            ]
        );
   
        return redirect()->route('admin.sponsors.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteSponsor($id)
    {
        $sponsor = OurSponsors::where('id', $id)->delete();
    }

}
