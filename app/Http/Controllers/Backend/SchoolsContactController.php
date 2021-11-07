<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses; 
use DB;
use DataTables;
use File;
use App\Models\Schools;
use App\Models\SchoolTypes;
use App\Models\Programs;
use App\Models\SchoolContacts;
use App\Models\ProgramCategories;

/**
 * Class SchoolsContactController.
 */
class SchoolsContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolContacts($id)
    {
        $school = Schools::where('id', $id)->first();

        $contacts = SchoolContacts::where('school_id', $id)->get();


        return view('backend.schools.contacts', ['contacts' => $contacts, 'school' => $school]);
    }


    public function schoolContactCreate(Request $request)
    {
        $user_id = auth()->user()->id;

        $contact = new SchoolContacts;

        $contact->user_id = $user_id;
        $contact->school_id = $request->hidden_id;
        $contact->name = $request->name;
        $contact->department = $request->department;
        $contact->address = $request->address;
        $contact->city_province_postal_code = $request->other_address;
        $contact->country = $request->country;
        $contact->phone = $request->phone;
        $contact->fax = $request->fax;
        $contact->website = $request->website;

        $contact->save();

        return back()->withFlashSuccess('Contact Added Successfully');
    }


    public function getSchoolContacts($id, Request $request)
    {

        $data = SchoolContacts::where('school_id', $id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('admin.schools.school_contact_edit', [$data->school_id, $data->id]).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolContactEdit($id, $contact_id)
    {
        $contact = SchoolContacts::where('id', $contact_id)->first();

        $school = Schools::where('id', $id)->first();

        return view('backend.schools.contact_edit', ['school' => $school, 'contact' => $contact]);
    }


    public function schoolContactUpdate(Request $request) {

        $id = $request->school_id;

        $contact = DB::table('school_contacts') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'department' => $request->department,
                'address' => $request->address,
                'city_province_postal_code' => $request->other_address,
                'country' => $request->country,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'website' => $request->website,
            ]
        );
        
        return redirect()->route('admin.schools.school_contacts', $id)->withFlashSuccess('Updated Successfully');
    }

    public function SchoolContactDelete($id, $contact_id)
    {
        $contact = SchoolContacts::where('id', $contact_id)->delete();

        return back();
    }



    public function schoolContactsParagraphUpdate(Request $request) {


        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'contacts_page_paragraph' => $request->paragraph,
            ]
        );
        
        return back()->withFlashSuccess('Updated Successfully');
    }
}
