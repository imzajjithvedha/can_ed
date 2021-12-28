<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\SchoolScholarships;
use App\Models\Schools;
use Excel;
use App\Imports\SchoolScholarshipsImport; 

/**
 * Class AllScholarshipsController.
 */
class AllScholarshipsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.all_scholarships.index');
    }

    public function createScholarship()
    {
        $schools = Schools::where('status', 'Approved')->get();

        return view('backend.all_scholarships.create', ['schools' => $schools]);
    }

    public function storeScholarship(Request $request)
    {

        $featured = $request->file('featured_image');

        $featured_image = time().'_'.rand(1000,10000).'.'.$featured->getClientOriginalExtension();
        
        $featured->move(public_path('images/schools'), $featured_image);
    

        $user_id = auth()->user()->id;

        $scholarship = new SchoolScholarships;

        $scholarship->user_id = $user_id;
        $scholarship->name = $request->name;
        $scholarship->provider = $request->provider;
        $scholarship->summary = $request->summary;
        $scholarship->amount = $request->amount;
        $scholarship->school_id = $request->school;
        $scholarship->eligibility = json_encode($request->eligibility);
        $scholarship->award = $request->award;
        $scholarship->availability = $request->availability;
        $scholarship->level_of_study = $request->level_of_study;
        $scholarship->action = $request->action;
        $scholarship->date_posted = $request->date_posted;
        $scholarship->expiry_date = $request->expiry_date;
        $scholarship->deadline = $request->deadline;
        $scholarship->image = $featured_image;
        $scholarship->link = $request->link;
        $scholarship->featured = $request->featured;

        $scholarship->save();

        return redirect()->route('admin.scholarships.index')->withFlashSuccess('Scholarship Added Successfully');          
    }


    public function getScholarships(Request $request)
    {

        $data = SchoolScholarships::get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('admin.scholarships.edit_scholarship', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function editScholarship($id)
    {
        $scholarship = SchoolScholarships::where('id', $id)->first();

        $schools = Schools::where('status', 'Approved')->get();

        return view('backend.all_scholarships.edit', ['scholarship' => $scholarship, 'schools' => $schools]);
    }


    public function updateScholarship(Request $request) {

       $featured = $request->file('featured_image');

        if($featured != null) {
            $featured_image = time().'_'.rand(1000,10000).'.'.$featured->getClientOriginalExtension();
            
            $featured->move(public_path('images/schools'), $featured_image);
        } 
        else {
            $featured_image = $request->old_image;
        }

        $scholarship = DB::table('school_scholarships') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'provider' => $request->provider,
                'summary' => $request->summary,
                'amount' => $request->amount,
                'school_id' => $request->school,
                'eligibility' => json_encode($request->eligibility),
                'award' => $request->award,
                'availability' => $request->availability,
                'level_of_study' => $request->level_of_study,
                'action' => $request->action,
                'date_posted' => $request->date_posted,
                'expiry_date' => $request->expiry_date,
                'deadline' => $request->deadline,
                'image' => $featured_image,
                'link' => $request->link,
                'featured' => $request->featured,
            ]
        );
        
        return redirect()->route('admin.scholarships.index')->withFlashSuccess('Updated Successfully');
    }

    public function deleteScholarship($id)
    {
        $scholarship = SchoolScholarships::where('id', $id)->delete();

        return back();
    }


    public function importScholarships()
    {
        return view('backend.all_scholarships.import');
    }

    public function import(Request $request)
    {
        Excel::import(new SchoolScholarshipsImport, $request->file);

        return redirect()->route('admin.scholarships.index')->withFlashSuccess('Uploaded Successfully');          
    }

}
