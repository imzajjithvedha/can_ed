<?php

namespace App\Http\Controllers\Frontend\User;

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
use Carbon\Carbon;

/**
 * Class UserSchoolContactController.
 */
class UserSchoolContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolContacts()
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        $contacts = SchoolContacts::where('school_id', $school->id)->get();


        return view('frontend.user.user_school.school_contacts', ['contacts' => $contacts, 'school' => $school]);
    }


    public function schoolContactCreate(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        
            $image->move(public_path('images/schools'), $imageName);
        }
        else {
            $imageName = null;
        }

        


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
        $contact->orders = $request->orders;
        $contact->image = $imageName;

        $contact->save();

        return redirect()->route('frontend.user.school_contacts')->with('created', 'created');       
    }


    public function getSchoolContacts(Request $request)
    {
        $user_id = auth()->user()->id;

        $school_id = Schools::where('user_id', $user_id)->first()->id;

        $data = SchoolContacts::where('school_id', $school_id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.user.school_contact_edit', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolContactEdit($id)
    {
        $contact = SchoolContacts::where('id', $id)->first();

        return view('frontend.user.user_school.school_contact_edit', ['contact' => $contact]);
    }


    public function schoolContactUpdate(Request $request) {

        $user_id = auth()->user()->id;

        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/schools'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }

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
                'orders' => $request->orders,
                'image' => $imageName,
                'updated_at' => Carbon::now(),
            ]
        );
        
        return redirect()->route('frontend.user.school_contacts')->with('success', 'success');     
    }

    public function SchoolContactDelete($id)
    {
        $contact = SchoolContacts::where('id', $id)->delete();

        return back();
    }



    public function schoolContactsParagraphUpdate(Request $request) {

        $user_id = auth()->user()->id;

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'contacts_page_paragraph' => $request->paragraph,
            ]
        );
        
        return redirect()->route('frontend.user.school_contacts')->with('paragraph', 'paragraph');     
    }
}
