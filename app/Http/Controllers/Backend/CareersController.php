<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Excel;
use App\Models\Programs; 
use App\Models\Pages;
use App\Models\AllCareers;
use App\Imports\CareersImport; 

/**
 * Class CareersController.
 */
class CareersController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function howCareersCameAbout()
    {
        $career = Pages::where('name', 'how_these_career_came_about')->first();

        return view('backend.careers.how_these_careers_came', ['career' => $career]);
    }

    public function howCareersCameAboutUpdate(Request $request)
    {

        $career = DB::table('pages') ->where('name', 'how_these_career_came_about')->update(
            [
                'title' => $request->title,
                'description' => $request->description
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }


    public function hotCareers()
    {
        $career = Pages::where('name', 'hot_careers')->first();

        return view('backend.careers.hot_careers', ['career' => $career]);
    }

    public function hotCareersUpdate(Request $request)
    {

        $career = DB::table('pages') ->where('name', 'hot_careers')->update(
            [
                'title' => $request->title,
                'description' => $request->description
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }

    public function allCareers()
    {
        return view('backend.careers.index');
    }

    public function createCareer()
    {
        return view('backend.careers.create');
    }

    public function storeCareer(Request $request)
    {
        $user_id = auth()->user()->id;

        $career = new AllCareers;

        $career->user_id = $user_id;
        $career->level = $request->level;
        $career->hierarchical = $request->hierarchical;
        $career->code = $request->code;
        $career->title = $request->title;
        $career->definition = $request->definition;
        $career->status = 'Approved';
        $career->featured = $request->featured;


        $career->save();

        
        return redirect()->route('admin.careers.all_careers')->withFlashSuccess('Created Successfully');                      
    }


    public function getCareers(Request $request)
    {
        if($request->ajax())
        {
            $data = AllCareers::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.careers.edit_career', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Approval </a>';
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
                
                ->rawColumns(['action','status'])
                ->make(true);
        }
        
        return back();
    }


    public function editCareer($id)
    {

        $career = AllCareers::where('id', $id)->first();

        return view('backend.careers.edit', ['career' => $career]);
    }

    public function updateCareer(Request $request)
    {    
        $event = DB::table('all_careers')->where('id', request('hidden_id'))->update(
            [
                'level' => $request->level,
                'hierarchical' => $request->hierarchical,
                'code' => $request->code,
                'title' => $request->title,
                'definition' => $request->definition,
                'status' => $request->status,
                'featured' => $request->featured,
            ]
        );
   
        return redirect()->route('admin.careers.all_careers')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteCareer($id)
    {
        $career = AllCareers::where('id', $id)->delete();
    }


    public function importCareers()
    {
        return view('backend.careers.import');
    }

    public function import(Request $request)
    {
        Excel::import(new CareersImport, $request->file);

        return redirect()->route('admin.careers.all_careers')->withFlashSuccess('Uploaded Successfully');          
    }

}
