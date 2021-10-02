<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Schools; 
use App\Models\Auth\User; 

/**
 * Class SchoolsController.
 */
class SchoolsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.schools.index');
    }

    // public function createArticle()
    // {
    //     return view('backend.articles.create');
    // }

    // public function storeArticle(Request $request)
    // {
    //     $user_id = auth()->user()->id;

    //     $image = $request->file('image');
    //     $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
    //     $image->move(public_path('images/articles'),$imageName);

    //     if($request->featured != null) {
    //         $featured = $request->featured;
    //     } else {
    //         $featured = 'No';
    //     }

    //     $article = new Articles;

    //     $article->user_id = $user_id;
    //     $article->title = $request->title;
    //     $article->description = $request->description;
    //     $article->featured = $featured;
    //     $article->status = 'Approved';
    //     $article->image = $imageName;

    //     $article->save();

        
    //     return redirect()->route('admin.articles.index')->withFlashSuccess('Created Successfully');                      
    // }


    public function getSchools(Request $request)
    {
        if($request->ajax())
        {
            $data = Schools::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.schools.edit_school', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->addColumn('email', function($data){
                    $email = User::where('id', $data->user_id)->first()->email;
                    
                    return $email;
                })

                ->addColumn('phone', function($data){
                    $phone = User::where('id', $data->user_id)->first()->phone;

                    if($phone != null) {
                        return $phone;
                    } else {
                        return '-';
                    }
                })

                
                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<span class="badge bg-success">Approved</span>';
                    }else{
                        $status = '<span class="badge bg-warning text-dark">Pending</span>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action', 'email', 'phone', 'status'])
                ->make(true);
        }
        
        return back();
    }


    public function editSchool($id)
    {

        $school = Schools::where('id',$id)->first();

        return view('backend.schools.edit',['school' => $school]);
    }

    public function updateSchool(Request $request)
    {    
        
        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'website' => $request->website,
                'country' => $request->country,
                'message' => $request->message,
                'status' => $request->status
            ]
        );
   
        return redirect()->route('admin.schools.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteSchool($id)
    {
        $school = Schools::where('id', $id)->delete();
    }
}
