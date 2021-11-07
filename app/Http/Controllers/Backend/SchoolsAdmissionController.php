<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use App\Models\Schools;

/**
 * Class SchoolsAdmissionController.
 */
class SchoolsAdmissionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolAdmission($id)
    {
        $school = Schools::where('id', $id)->first();

        return view('backend.schools.admission', ['school' => $school]);

    }

    public function schoolAdmissionUpdate(Request $request) {

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
            ]
        );
        
        return back()->withFlashSuccess('Updated Successfully');
    }
}
