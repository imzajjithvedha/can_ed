<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use App\Models\Schools;
use Carbon\Carbon;

/**
 * Class UserSchoolAdmissionController.
 */
class UserSchoolAdmissionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolAdmission()
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        return view('frontend.user.user_school.school_admission', ['school' => $school]);

    }

    public function schoolAdmissionUpdate(Request $request) {

        $user_id = auth()->user()->id;

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'admission_paragraph' => $request->admission_paragraph,
                'admission_title_1' => $request->admission_title_1,
                'admission_title_1_paragraph' => $request->admission_title_1_paragraph,
                'admission_text_content_1' => $request->admission_text_content_1,
                'admission_title_2' => $request->admission_title_2,
                'admission_title_2_bullets' => json_encode($request->admission_title_2_bullets),
                'admission_title_3' => $request->admission_title_3,
                'admission_title_3_paragraph' => $request->admission_title_3_paragraph,
                'admission_title_4' => $request->admission_title_4,
                'admission_title_4_paragraph' => $request->admission_title_4_paragraph,
                'admission_title_5' => $request->admission_title_5,
                'admission_title_5_paragraph' => $request->admission_title_5_paragraph,
                'updated_at' => Carbon::now(),
                // 'admission_title_6' => $request->admission_title_6,
                // 'admission_title_6_paragraph' => $request->admission_title_6_paragraph,
            ]
        );
        
        return redirect()->route('frontend.user.school_admission')->with('admission', 'admission');     
    }
}
