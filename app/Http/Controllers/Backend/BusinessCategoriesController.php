<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Businesses; 
use App\Models\BusinessCategories;

/**
 * Class BusinessCategoriesController.
 */
class BusinessCategoriesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.business_categories.index');
    }

    public function createCategory()
    {
        return view('backend.business_categories.create');
    }

    public function storeCategory(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/business_categories'), $imageName);

        $category = new BusinessCategories;

        $category->user_id = $user_id;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageName;
        $category->status = 'Approved';

        $category->save();

        
        return redirect()->route('admin.categories.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getCategories(Request $request)
    {
        if($request->ajax())
        {
            $data = BusinessCategories::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.categories.edit_category', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->addColumn('image', function($data){
                    $img = '<img src="'.url('images/business_categories',$data->image).'" style="width: 70%">';
                 
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
                
                ->rawColumns(['action', 'image', 'status'])
                ->make(true);
        }
        
        return back();
    }


    public function editCategory($id)
    {
        $category = BusinessCategories::where('id',$id)->first();

        return view('backend.business_categories.edit', ['category' => $category]);
    }

    public function updateCategory(Request $request)
    {    
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/business_categories'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }
        
        $category = DB::table('business_categories') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $imageName
            ]
        );
   
        return redirect()->route('admin.categories.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteCategory($id)
    {
        $category = BusinessCategories::where('id', $id)->delete();
    }

}
