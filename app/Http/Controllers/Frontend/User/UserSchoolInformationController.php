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
use App\Models\SchoolPrograms;
use App\Mail\Frontend\SchoolUpdate;
use App\Mail\Frontend\UserSchoolUpdate;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

/**
 * Class UserSchoolInformationController.
 */
class UserSchoolInformationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolInformation()
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        if($school) {

            $images = json_decode($school->images);

            return view('frontend.user.user_school.school_information', ['school' => $school, 'images' => $images]);
        }
    }


    public function schoolInformationUpdate(Request $request) {


        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'website' => $request->website,
                'country' => $request->country,
                'school_email' => $request->email,
                'featured_image' => $request->featured_image,
                'images' => $request->images,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'you_tube' => $request->you_tube,
                'linked_in' => $request->linked_in,
                'vk' => $request->vk,
                'main_button_title' => $request->main_button_title,
                'main_button_sub_title' => $request->main_button_sub_title,
                'main_button_link' => $request->main_button_link,
                'other_button_title' => $request->other_button_title,
                'other_button_link' => $request->other_button_link,
                'quick_facts_status' => $request->quick_facts_status,
                'overview_status' => $request->overview_status,
                'programs_status' => $request->programs_status,
                'admissions_status' => $request->admissions_status,
                'financial_status' => $request->financial_status,
                'scholarships_status' => $request->scholarships_status,
                'contacts_status' => $request->contacts_status,
                'link_1_name' => $request->link_1_name,
                'link_1_url' => $request->link_1_url,
                'link_2_name' => $request->link_2_name,
                'link_2_url' => $request->link_2_url,
                'link_3_name' => $request->link_3_name,
                'link_3_url' => $request->link_3_url,
                'link_4_name' => $request->link_4_name,
                'link_4_url' => $request->link_4_url,
                'link_5_name' => $request->link_5_name,
                'link_5_url' => $request->link_5_url,
                'link_6_name' => $request->link_6_name,
                'link_6_url' => $request->link_6_url,
                'link_7_name' => $request->link_7_name,
                'link_7_url' => $request->link_7_url,
                'link_8_name' => $request->link_8_name,
                'link_8_url' => $request->link_8_url,
                'status' => 'Pending',
                'updated_at' => Carbon::now(),
            ]
        );

        if($request->status == 'Approved') {

            $details = [
                'name' => $request->name,
                'website' => $request->website,
                'country' => $request->country,
                'school_email' => $request->email,
            ];
    
            Mail::to(['zajjith@gmail.com', 'ccaned@gmail.com'])->send(new SchoolUpdate($details));
    
            Mail::to([auth()->user()->email])->send(new UserSchoolUpdate($details));
        }
   
        return back()->with('success', 'success');    
    }
}
