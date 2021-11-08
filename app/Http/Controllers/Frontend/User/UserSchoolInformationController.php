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

        $featured = $request->file('featured_image');

        if($featured != null) {
            $featured_image = time().'_'.rand(1000,10000).'.'.$featured->getClientOriginalExtension();
            
            $featured->move(public_path('images/schools'), $featured_image);
        } 
        else {
            $featured_image = $request->old_image;
        }

        $images = [];

        if($request->hasFile('new_images'))
         {

            foreach($request->file('new_images') as $image)
            {
                $name= time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

                $image->move(public_path('images/schools'), $name); 

                array_push($images, $name); 
            }
         }
        else {

            if($request->old_images != null) {
                $images = $request->old_images;
            }
            else {
                $images = [];
            }
        }


        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'website' => $request->website,
                'country' => $request->country,
                'school_email' => $request->email,
                'featured_image' => $featured_image,
                'images' => json_encode($images),
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'you_tube' => $request->you_tube,
                'linked_in' => $request->linked_in,
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
                'status' => 'Pending'
            ]
        );
   
        return back()->with('success', 'success');    
    }
}
