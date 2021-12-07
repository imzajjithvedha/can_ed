<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Schools;

/**
 * Class UserSchoolOverviewController.
 */
class UserSchoolOverviewController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolOverview()
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();


        return view('frontend.user.user_school.school_overview', ['school' => $school]);

    }


    public function schoolOverviewUpdate(Request $request) {

        $overview_title_3_image = $request->file('overview_title_3_image');

        if($overview_title_3_image != null) {
            $overview_title_3_image_call = time().'_'.rand(1000,10000).'.'.$overview_title_3_image->getClientOriginalExtension();
            
            $overview_title_3_image->move(public_path('images/schools'), $overview_title_3_image_call);
        } 
        else {
            $overview_title_3_image_call = $request->overview_title_3_old_image;
        }


        $overview_title_4_image = $request->file('overview_title_4_image');

        if($overview_title_4_image != null) {
            $overview_title_4_image_call = time().'_'.rand(1000,10000).'.'.$overview_title_4_image->getClientOriginalExtension();
            
            $overview_title_4_image->move(public_path('images/schools'), $overview_title_4_image_call);
        } 
        else {
            $overview_title_4_image_call = $request->overview_title_4_old_image;
        }


        $overview_title_9_image = $request->file('overview_title_9_image');

        if($overview_title_9_image != null) {
            $overview_title_9_image_call = time().'_'.rand(1000,10000).'.'.$overview_title_9_image->getClientOriginalExtension();
            
            $overview_title_9_image->move(public_path('images/schools'), $overview_title_9_image_call);
        } 
        else {
            $overview_title_9_image_call = $request->overview_title_9_old_image;
        }



        $programs = $request->programs;

        $length = $request->length;

        $canadian = $request->canadian;

        $international = $request->international;

        $provincial = $request->provincial;

        $output = [];


        if($programs == null) {
            $school = DB::table('schools')->where('id', request('hidden_id'))->update([
                'overview_related_programs' => null
            ]);
        }
        else {
            foreach($programs as $key=>$program) {
                $data = [
                    'name' => $program,
                    'length' => $length[$key],
                    'canadian' => $canadian[$key],
                    'international' => $international[$key],
                    'provincial' => $provincial[$key],
                ];
    
                array_push($output, $data);
            }

            $school = DB::table('schools')->where('id', request('hidden_id'))->update([
                'overview_related_programs' => json_encode($output)
            ]);
        }
        

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'overview_title_1' => $request->overview_title_1,
                "overview_title_1_paragraph" => $request->overview_title_1_paragraph,
                "overview_text_content_1" => $request->overview_text_content_1,
                "overview_title_2" => $request->overview_title_2,
                "overview_title_2_bullets" => json_encode($request->overview_title_2_bullets),
                "overview_title_3_image" => $overview_title_3_image_call,
                "overview_title_3_sub_title" => $request->overview_title_3_sub_title,
                "overview_title_3_paragraph" => $request->overview_title_3_paragraph,
                "overview_title_3_button" => $request->overview_title_3_button,
                "overview_title_3_link" => $request->overview_title_3_link,
                "overview_title_3_image_name" => $request->overview_title_3_image_name,
                "overview_title_3_date" => $request->overview_title_3_date,
                "overview_title_4" => $request->overview_title_4,
                "overview_title_4_paragraph" => $request->overview_title_4_paragraph,
                "overview_title_4_image" => $overview_title_4_image_call,
                "overview_title_5" => $request->overview_title_5,
                "overview_title_5_paragraph" => $request->overview_title_5_paragraph,
                "overview_title_6" => $request->overview_title_6,
                "overview_title_6_paragraph" => $request->overview_title_6_paragraph,
                "overview_title_6_button" => $request->overview_title_6_button,
                "overview_title_6_link" => $request->overview_title_6_link,
                "overview_title_7" => $request->overview_title_7,
                "overview_title_7_paragraph" => $request->overview_title_7_paragraph,
                "overview_title_8" => $request->overview_title_8,
                "overview_title_8_paragraph" => $request->overview_title_8_paragraph,
                "overview_title_8_link" => $request->overview_title_8_link,
                "overview_title_8_button" => $request->overview_title_8_button,
                "overview_title_9" => $request->overview_title_9,
                "overview_title_9_image" => $overview_title_9_image_call,
                "overview_title_9_sub_title" => $request->overview_title_9_sub_title,
                "overview_title_9_paragraph" => $request->overview_title_9_paragraph,
                "overview_title_9_button" => $request->overview_title_9_button,
                "overview_title_9_link" => $request->overview_title_9_link,
                "overview_title_9_image_name" => $request->overview_title_9_image_name,
                "overview_title_10" => $request->overview_title_10,
                "overview_title_10_paragraph" => $request->overview_title_10_paragraph,
                "overview_title_11" => $request->overview_title_11,
                "overview_title_11_paragraph" => $request->overview_title_11_paragraph,
                "overview_title_12" => $request->overview_title_12,
                "overview_title_12_bullets" => json_encode($request->overview_title_12_bullets),
                "overview_title_13" => $request->overview_title_13,
                "overview_title_13_paragraph" => $request->overview_title_13_paragraph,
            ]
        );
        
        return redirect()->route('frontend.user.school_overview')->with('overview', 'overview');     
    }
}
