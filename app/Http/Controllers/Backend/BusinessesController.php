<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Businesses; 
use App\Models\BusinessCategories;
use Carbon\Carbon;
use App\Imports\BusinessesImport;
use Excel;

/**
 * Class BusinessesController.
 */
class BusinessesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.businesses.index');
    }

    public function createBusiness()
    {
        $categories = BusinessCategories::where('status', 'Approved')->orderBy('updated_at', 'DESC')->get();

        return view('backend.businesses.create', ['categories' => $categories]);
    }

    public function storeBusiness(Request $request)
    {
        $user_id = auth()->user()->id;

        $data = [];

        if($request->hasFile('single_image')) {
            $image = $request->file('single_image');
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/businesses'), $imageName);

            array_push($data, $imageName);

            $image_name = json_encode($data);
        }

        else if($request->hasFile('image')) {
            foreach($request->file('image') as $image)
            {
                $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/businesses'),$imageName);
                array_push($data, $imageName);

                $image_name = json_encode($data);
            }
        }

        if($request->featured != null) {
            $featured = $request->featured;
        } else {
            $featured = 'No';
        }

        $business = new Businesses;

        $business->user_id = $user_id;
        $business->name = $request->name;
        $business->category_1 = $request->category_1;
        $business->category_2 = $request->category_2;
        $business->category_3 = $request->category_3;
        $business->description = $request->description;
        $business->contact_name = $request->contact_name;
        $business->email = $request->email;
        $business->phone = $request->phone;
        $business->address = $request->address;
        $business->url = $request->url;
        $business->image = json_encode($data);
        $business->facebook = $request->facebook;
        $business->twitter = $request->twitter;
        $business->you_tube = $request->you_tube;
        $business->linked_in = $request->linked_in;
        $business->package = $request->package;
        $business->featured = $request->featured;
        $business->status = 'Approved';
        $business->student_service = $request->student_service;
        $business->advertised = $request->advertised;

        $business->save();

        return redirect()->route('admin.businesses.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getBusinesses(Request $request)
    {
        if($request->ajax())
        {
            $data = Businesses::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.businesses.edit_business', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Approval </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->editColumn('student_service', function($data){
                    if($data->student_service == 'Yes'){
                        $student_service = '<span class="badge bg-success">Yes</span>';
                    }else{
                        $student_service = '<span class="badge bg-warning text-dark">No</span>';
                    }   
                    return $student_service;
                })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<span class="badge bg-success">Approved</span>';
                    }else{
                        $status = '<span class="badge bg-warning text-dark">Pending</span>';
                    }   
                    return $status;
                })

                ->editColumn('featured', function($data){
                    if($data->featured == 'Yes'){
                        $featured = '<span class="badge bg-success">Yes</span>';
                    }else{
                        $featured = '<span class="badge bg-warning text-dark">No</span>';
                    }   
                    return $featured;
                })

                ->editColumn('advertised', function($data){
                    if($data->advertised == 'Yes'){
                        $advertised = '<span class="badge bg-success">Yes</span>';
                    }else{
                        $advertised = '<span class="badge bg-warning text-dark">No</span>';
                    }   
                    return $advertised;
                })
                
                ->rawColumns(['action','status', 'category', 'advertised', 'featured', 'student_service'])
                ->make(true);
        }
        
        return back();
    }


    public function editBusiness($id)
    {

        $categories = BusinessCategories::where('status', 'Approved')->orderBy('updated_at', 'DESC')->get();

        $business = Businesses::where('id',$id)->first();

        return view('backend.businesses.edit', ['business' => $business, 'categories' => $categories]);
    }

    public function updateBusiness(Request $request)
    {    
        $images = $request->file('new_image');

        $data = [];

        if($images != null) {
            foreach($images as $image)
            {
                $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/businesses'),$imageName);
                array_push($data, $imageName);
            }

            $business = DB::table('businesses') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $data,
                ]
            );

        }
        else {

            $business = DB::table('businesses') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $request->old_image,
                ]
            );
        }
        
        $business = DB::table('businesses') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'category_1' => $request->category_1,
                'category_2' => $request->category_2,
                'category_3' => $request->category_3,
                'description' => $request->description,
                'contact_name' => $request->contact_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'url' => $request->url,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'you_tube' => $request->you_tube,
                'linked_in' => $request->linked_in,
                'status' => $request->status,
                'featured' => $request->featured,
                'student_service' => $request->student_service,
                'advertised' => $request->advertised,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.businesses.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteBusiness($id)
    {
        $business = Businesses::where('id', $id)->delete();
    }


    public function importBusinesses()
    {
        return view('backend.businesses.import');
    }

    public function import(Request $request)
    {
        Excel::import(new BusinessesImport, $request->file);

        return redirect()->route('admin.businesses.index')->withFlashSuccess('Uploaded Successfully');          
    }

}
