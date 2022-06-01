<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\OpenDays;
use App\Models\Schools;
use Carbon\Carbon;

/**
 * Class SchoolsOpenDaysController.
 */
class SchoolsOpenDaysController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.open_days.index');
    }

    public function createOpenDay()
    {
        $schools = Schools::where('status', 'Approved')->orderBy('name', 'asc')->get();

        return view('backend.open_days.create', ['schools' => $schools]);
    }

    public function storeOpenDay(Request $request)
    {
        $user_id = auth()->user()->id;

        if($request->file('image') != null) {
            $image = $request->file('image');
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/open_days'),$imageName);
        }
        else {
            $imageName = null;
        }

        $open_day = new OpenDays;

        $open_day->user_id = $user_id;
        $open_day->school_id = $request->school;
        $open_day->title = $request->title;
        $open_day->description = $request->description;
        $open_day->address = $request->address;
        $open_day->city = $request->city;
        $open_day->country = $request->country;
        $open_day->date = $request->date;
        $open_day->time = $request->time;
        $open_day->school_email = $request->email;
        $open_day->school_phone = $request->phone;
        $open_day->url = $request->url;
        $open_day->image = $imageName;
        $open_day->status = 'Approved';
        $open_day->featured = $request->featured;

        $open_day->save();

        return redirect()->route('admin.open_days.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getOpenDays(Request $request)
    {
        if($request->ajax())
        {
            $data = OpenDays::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.open_days.edit_open_day', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->editColumn('school', function($data){
                    $school = Schools::where('id', $data->school_id)->first()->name; 

                    return $school;
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

                ->rawColumns(['action', 'school', 'featured', 'status'])
                ->make(true);
        }
        
        return back();
    }


    public function editOpenDay($id)
    {
        $schools = Schools::where('status', 'Approved')->orderBy('name', 'asc')->get();

        $open_day = OpenDays::where('id', $id)->first();

        return view('backend.open_days.edit', ['open_day' => $open_day, 'schools' => $schools]);
    }

    public function updateOpenDay(Request $request)
    {    
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/open_days'),$imageName);


            $open_day = DB::table('open_days') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $imageName,
                ]
            );
        }
        else {

            $open_day = DB::table('open_days') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $request->old_image,
                ]
            );
        }
        
        $open_day = DB::table('open_days') ->where('id', request('hidden_id'))->update(
            [
                'title' => $request->title,
                'school_id' => $request->school,
                'description' => $request->description,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'date' => $request->date,
                'time' => $request->time,
                'school_email' => $request->email,
                'school_phone' => $request->phone,
                'url' => $request->url,
                'status' => $request->status,
                'featured' => $request->featured,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.open_days.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteOpenDay($id)
    {
        $open_day = OpenDays::where('id', $id)->delete();
    }


    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $open_day = DB::table('open_days')->where('id', request('id'))->update(
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

        $open_day = DB::table('open_days')->where('id', request('id'))->update(
            [
                'featured' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }

}
