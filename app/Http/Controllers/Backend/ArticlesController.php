<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Articles;
use Carbon\Carbon;

/**
 * Class ArticlesController.
 */
class ArticlesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.articles.index');
    }

    public function createArticle()
    {
        return view('backend.articles.create');
    }

    public function storeArticle(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/articles'),$imageName);

        if($request->featured != null) {
            $featured = $request->featured;
        } else {
            $featured = 'No';
        }

        $article = new Articles;

        $article->user_id = $user_id;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->type = $request->type;
        $article->featured = $featured;
        $article->status = 'Approved';
        $article->image = $imageName;

        $article->save();

        
        return redirect()->route('admin.articles.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getArticles(Request $request)
    {
        if($request->ajax())
        {
            $data = Articles::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.articles.edit_article', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->addColumn('image', function($data){
                    $img = '<img src="'.url('images/articles',$data->image).'" style="width: 70%">';
                 
                    return $img;
                })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" checked data-id='.$data->id.'></div>';
                    }else{
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" data-id='.$data->id.'></div>';
                    }   
                    return $status;
                })

                ->editColumn('featured', function($data){
                    if($data->featured == 'Yes'){
                        $featured = '<div class="form-check form-switch"><input class="form-check-input featured-check" type="checkbox" checked data-id='.$data->id.'></div>';
                    }else{
                        $featured = '<div class="form-check form-switch"><input class="form-check-input featured-check" type="checkbox" data-id='.$data->id.'></div>';
                    }   
                    return $featured;
                })

                ->rawColumns(['action','image', 'status', 'featured'])
                ->make(true);
        }
        
        return back();
    }


    public function editArticle($id)
    {

        $article = Articles::where('id',$id)->first();

        return view('backend.articles.edit',['article' => $article]);
    }

    public function updateArticle(Request $request)
    {    
        
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/articles'),$imageName);
        } 
        else {
            $imageName = $request->old_image;
        }
        
        $article = DB::table('articles') ->where('id', request('hidden_id'))->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'featured' => $request->featured,
                'image' => $imageName,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.articles.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteArticle($id)
    {
        $article = Articles::where('id', $id)->delete();
    }


    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $article = DB::table('articles')->where('id', request('id'))->update(
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

        $article = DB::table('articles')->where('id', request('id'))->update(
            [
                'featured' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }

}
