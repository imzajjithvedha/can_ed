<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\OurTeam; 

/**
 * Class TeamController.
 */
class TeamController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.team.index');
    }

    public function createTeam()
    {
        return view('backend.team.create');
    }

    public function storeTeam(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/our_team'),$imageName);

        $member = new OurTeam;

        $member->user_id = $user_id;
        $member->name = $request->name;
        $member->title = $request->title;
        $member->description = $request->description;
        $member->status = 'Approved';
        $member->image = $imageName;

        $member->save();

        
        return redirect()->route('admin.team.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getTeam(Request $request)
    {
        if($request->ajax())
        {
            $data = OurTeam::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.team.edit_team', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->addColumn('image', function($data){
                    $img = '<img src="'.url('images/our_team', $data->image).'" style="width: 70%">';
                 
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


    public function editTeam($id)
    {

        $member = OurTeam::where('id',$id)->first();

        return view('backend.team.edit',['member' => $member]);
    }

    public function updateTeam(Request $request)
    {    
        
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/our_team'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }
        
        $team = DB::table('our_team') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'status' => $request->status
            ]
        );
   
        return redirect()->route('admin.team.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteTeam($id)
    {
        $member = OurTeam::where('id', $id)->delete();
    }

}
