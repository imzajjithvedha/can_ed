<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Schools; 
use App\Models\Auth\User; 
use Carbon\Carbon;
use Excel;
use App\Imports\SchoolsImport;

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

    public function createSchool()
    {
        return view('backend.schools.create');
    }

    public function storeSchool(Request $request)
    {
        $user_id = auth()->user()->id;

        $school = new Schools;

        $school->user_id = $user_id;
        $school->name = $request->name;
        $school->website = $request->website;
        $school->country = $request->country;
        $school->province = $request->province;
        $school->school_email = $request->email;
        $school->school_phone = $request->phone;
        $school->slug = str_replace(" ", "-", $request->name);
        $school->status = 'Pending';
        $school->featured = 'No';
        $school->quick_facts_status = 'No';
        $school->overview_status = 'No';
        $school->programs_status = 'No';
        $school->admissions_status = 'No';
        $school->financial_status = 'No';
        $school->scholarships_status = 'No';
        $school->contacts_status = 'No';
        $school->overview_title_2_bullets = '[null, null, null, null, null, null, null, null, null, null ]';
        $school->overview_title_12_bullets = '[null, null, null, null, null, null, null, null, null, null ]';
        $school->admission_title_2_bullets = '[null, null, null, null, null, null, null, null, null, null ]';

        $school->save();

        
        return redirect()->route('admin.schools.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getSchools(Request $request)
    {
        if($request->ajax())
        {
            $data = Schools::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.schools.school_information', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
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
                
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        
        return back();
    }

    public function deleteSchool($id)
    {
        $school = Schools::where('id', $id)->delete();
    }



    public function importSchools()
    {
        return view('backend.schools.import');
    }

    public function import(Request $request)
    {
        Excel::import(new SchoolsImport, $request->file);

        return redirect()->route('admin.schools.index')->withFlashSuccess('Uploaded Successfully');          
    }

}
