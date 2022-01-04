<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Businesses; 
use App\Models\BusinessCategories;

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

        if($request->hasFile('image')) {
            foreach($request->file('image') as $image)
            {
                $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/businesses'),$imageName);
                array_push($data, $imageName);
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
        $business->image = json_encode($data);
        $business->facebook = $request->facebook;
        $business->twitter = $request->twitter;
        $business->you_tube = $request->you_tube;
        $business->linked_in = $request->linked_in;
        $business->package = $request->package;
        $business->featured = $request->featured;
        $business->status = 'Approved';
        $business->student_service = $request->student_service;

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

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<span class="badge bg-success">Approved</span>';
                    }else{
                        $status = '<span class="badge bg-warning text-dark">Pending</span>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action','status', 'category'])
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
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'you_tube' => $request->you_tube,
                'linked_in' => $request->linked_in,
                'status' => $request->status,
                'featured' => $request->featured,
                'student_service' => $request->student_service,
            ]
        );
   
        return redirect()->route('admin.businesses.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteBusiness($id)
    {
        $business = Businesses::where('id', $id)->delete();
    }

}
