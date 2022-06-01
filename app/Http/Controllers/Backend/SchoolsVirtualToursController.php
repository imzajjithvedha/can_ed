<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\VirtualTours;
use App\Models\Schools;
use Carbon\Carbon;

/**
 * Class SchoolsVirtualToursController.
 */
class SchoolsVirtualToursController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.virtual_tours.index');
    }

    public function createVirtualTour()
    {
        $schools = Schools::where('status', 'Approved')->orderBy('name', 'asc')->get();

        return view('backend.virtual_tours.create', ['schools' => $schools]);
    }

    public function storeVirtualTour(Request $request)
    {
        $user_id = auth()->user()->id;

        if($request->file('image') != null) {
            $image = $request->file('image');
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/virtual_tours'),$imageName);
        }
        else {
            $imageName = null;
        }

        $virtual_tour = new VirtualTours;

        $virtual_tour->user_id = $user_id;
        $virtual_tour->school_id = $request->school;
        $virtual_tour->city = $request->city;
        $virtual_tour->province = $request->province;
        $virtual_tour->country = $request->country;
        $virtual_tour->link = $request->url;
        $virtual_tour->color = $request->color;
        $virtual_tour->image = $imageName;
        $virtual_tour->status = 'Approved';
        $virtual_tour->featured = $request->featured;

        $virtual_tour->save();

        return redirect()->route('admin.virtual_tours.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getVirtualTours(Request $request)
    {
        if($request->ajax())
        {
            $data = VirtualTours::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.virtual_tours.edit_virtual_tour', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->editColumn('school', function($data){
                    $school = Schools::where('id', $data->school_id)->first()->name; 

                    return $school;
                })

                ->editColumn('image', function($data){
                    $image = '<img src="'.url('images/virtual_tours',$data->image).'" style="width: 100%">';
                 
                    return $image;
                })

                ->editColumn('featured', function($data){
                    if($data->featured == 'Yes'){
                        $featured = '<div class="form-check form-switch"><input class="form-check-input featured-check" type="checkbox" checked data-id='.$data->id.'></div>';
                    }else{
                        $featured = '<div class="form-check form-switch"><input class="form-check-input featured-check" type="checkbox" data-id='.$data->id.'></div>';
                    }   
                    return $featured;
                })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" checked data-id='.$data->id.'></div>';
                    }else{
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" data-id='.$data->id.'></div>';
                    }   
                    return $status;
                })

                ->rawColumns(['action', 'image', 'school', 'featured', 'status'])
                ->make(true);
        }
        
        return back();
    }


    public function editVirtualTour($id)
    {
        $schools = Schools::where('status', 'Approved')->orderBy('name', 'asc')->get();

        $virtual_tour = VirtualTours::where('id', $id)->first();

        return view('backend.virtual_tours.edit', ['virtual_tour' => $virtual_tour, 'schools' => $schools]);
    }

    public function updateVirtualTour(Request $request)
    {    
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/virtual_tours'),$imageName);


            $virtual_tour = DB::table('virtual_tours') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $imageName,
                ]
            );
        }
        else {

            $virtual_tour = DB::table('virtual_tours') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $request->old_image,
                ]
            );
        }
        
        $virtual_tour = DB::table('virtual_tours') ->where('id', request('hidden_id'))->update(
            [
                'school_id' => $request->school,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'color' => $request->color,
                'link' => $request->url,
                'status' => $request->status,
                'featured' => $request->featured,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.virtual_tours.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteVirtualTour($id)
    {
        $open_day = VirtualTours::where('id', $id)->delete();
    }


    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $virtual_tour = DB::table('virtual_tours')->where('id', request('id'))->update(
            [
                'status' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }


    public function changeFeatured ($id, $status) {

        if($status == 0) {
            $value = 'No';
        }
        else {
            $value = 'Yes';
        }

        $virtual_tour = DB::table('virtual_tours')->where('id', request('id'))->update(
            [
                'featured' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }


}
