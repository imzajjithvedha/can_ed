<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use App\Models\Schools;

/**
 * Class SchoolsFinancialController.
 */
class SchoolsFinancialController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolFinancial($id)
    {

        $school = Schools::where('id', $id)->first();

        return view('backend.schools.financial', ['school' => $school]);

    }

    public function schoolFinancialUpdate(Request $request) {

        $user_id = auth()->user()->id;

        $programs4 = $request->programs4;

        $length4 = $request->length4;

        $canadian4 = $request->canadian4;

        $international4 = $request->international4;

        $provincial4 = $request->provincial4;

        $output4 = [];


        if($programs4 == null) {
            $school = DB::table('schools')->where('id', request('hidden_id'))->update([
                'financial_related_programs_4' => null
            ]);
        }
        else {
            foreach($programs4 as $key=>$program4) {

                $data = [
                    'name' => $program4,
                    'length' => $length4[$key],
                    'canadian' => $canadian4[$key],
                    'international' => $international4[$key],
                    'provincial' => $provincial4[$key],
                ];

                array_push($output4, $data); 
            }

            $school = DB::table('schools')->where('id', request('hidden_id'))->update([
                'financial_related_programs_4' => json_encode($output4)
            ]);
        }



        // $programs6 = $request->programs6;

        // $length6 = $request->length6;

        // $canadian6 = $request->canadian6;

        // $international6 = $request->international6;

        // $output6 = [];


        // if($programs6 == null) {
        //     $school = DB::table('schools')->where('id', request('hidden_id'))->update([
        //         'financial_related_programs_6' => null
        //     ]);
        // }
        // else {
        //     foreach($programs6 as $key=>$program6) {
        //         $data = [
        //             'name' => $program6,
        //             'length' => $length6[$key],
        //             'canadian' => $canadian6[$key],
        //             'international' => $international6[$key]
        //         ];
    
        //         array_push($output6, $data);
        //     }

        //     $school = DB::table('schools')->where('id', request('hidden_id'))->update([
        //         'financial_related_programs_6' => json_encode($output6)
        //     ]);
        // }




        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'financial_title_1' => $request->financial_title_1,
                'financial_title_1_paragraph' => $request->financial_title_1_paragraph,
                'financial_title_2' => $request->financial_title_2,
                'financial_title_2_tab_1' => $request->financial_title_2_tab_1,
                'financial_title_2_tab_2' => $request->financial_title_2_tab_2,
                'financial_title_2_tab_3' => $request->financial_title_2_tab_3,

                'financial_tab_1_sub_title_1' => $request->financial_tab_1_sub_title_1,
                'financial_tab_1_sub_title_1_bullet' => $request->financial_tab_1_sub_title_1_bullet,
                'financial_tab_1_sub_title_1_bullet_price' => $request->financial_tab_1_sub_title_1_bullet_price,
                'financial_tab_1_sub_title_2' => $request->financial_tab_1_sub_title_2,
                'financial_tab_1_sub_title_2_paragraph' => $request->financial_tab_1_sub_title_2_paragraph,
                'financial_tab_1_sub_title_3' => $request->financial_tab_1_sub_title_3,
                'financial_tab_1_sub_title_3_bullet_1' => $request->financial_tab_1_sub_title_3_bullet_1,
                'financial_tab_1_sub_title_3_bullet_1_price' => $request->financial_tab_1_sub_title_3_bullet_1_price,
                'financial_tab_1_sub_title_3_bullet_2' => $request->financial_tab_1_sub_title_3_bullet_2,
                'financial_tab_1_sub_title_3_bullet_2_price' => $request->financial_tab_1_sub_title_3_bullet_2_price,
                'financial_tab_1_sub_title_3_bullet_3' => $request->financial_tab_1_sub_title_3_bullet_3,
                'financial_tab_1_sub_title_3_bullet_3_price' => $request->financial_tab_1_sub_title_3_bullet_3_price,
                'financial_tab_1_sub_title_3_paragraph' => $request->financial_tab_1_sub_title_3_paragraph,

                'financial_tab_2_sub_title_1' => $request->financial_tab_2_sub_title_1,
                'financial_tab_2_sub_title_1_bullet' => $request->financial_tab_2_sub_title_1_bullet,
                'financial_tab_2_sub_title_1_bullet_price' => $request->financial_tab_2_sub_title_1_bullet_price,
                'financial_tab_2_sub_title_2' => $request->financial_tab_2_sub_title_2,
                'financial_tab_2_sub_title_2_paragraph' => $request->financial_tab_2_sub_title_2_paragraph,
                'financial_tab_2_sub_title_3' => $request->financial_tab_2_sub_title_3,
                'financial_tab_2_sub_title_3_bullet_1' => $request->financial_tab_2_sub_title_3_bullet_1,
                'financial_tab_2_sub_title_3_bullet_1_price' => $request->financial_tab_2_sub_title_3_bullet_1_price,
                'financial_tab_2_sub_title_3_bullet_2' => $request->financial_tab_2_sub_title_3_bullet_2,
                'financial_tab_2_sub_title_3_bullet_2_price' => $request->financial_tab_2_sub_title_3_bullet_2_price,
                'financial_tab_2_sub_title_3_bullet_3' => $request->financial_tab_2_sub_title_3_bullet_3,
                'financial_tab_2_sub_title_3_bullet_3_price' => $request->financial_tab_2_sub_title_3_bullet_3_price,
                'financial_tab_2_sub_title_3_paragraph' => $request->financial_tab_2_sub_title_3_paragraph,

                'financial_tab_3_sub_title_1' => $request->financial_tab_3_sub_title_1,
                'financial_tab_3_sub_title_1_bullet' => $request->financial_tab_3_sub_title_1_bullet,
                'financial_tab_3_sub_title_1_bullet_price' => $request->financial_tab_3_sub_title_1_bullet_price,
                'financial_tab_3_sub_title_2' => $request->financial_tab_3_sub_title_2,
                'financial_tab_3_sub_title_2_paragraph' => $request->financial_tab_3_sub_title_2_paragraph,
                'financial_tab_3_sub_title_3' => $request->financial_tab_3_sub_title_3,
                'financial_tab_3_sub_title_3_bullet_1' => $request->financial_tab_3_sub_title_3_bullet_1,
                'financial_tab_3_sub_title_3_bullet_1_price' => $request->financial_tab_3_sub_title_3_bullet_1_price,
                'financial_tab_3_sub_title_3_bullet_2' => $request->financial_tab_3_sub_title_3_bullet_2,
                'financial_tab_3_sub_title_3_bullet_2_price' => $request->financial_tab_3_sub_title_3_bullet_2_price,
                'financial_tab_3_sub_title_3_bullet_3' => $request->financial_tab_3_sub_title_3_bullet_3,
                'financial_tab_3_sub_title_3_bullet_3_price' => $request->financial_tab_3_sub_title_3_bullet_3_price,
                'financial_tab_3_sub_title_3_paragraph' => $request->financial_tab_3_sub_title_3_paragraph,

                'financial_title_3' => $request->financial_title_3,
                'financial_title_3_paragraph' => $request->financial_title_3_paragraph,
                'financial_title_4' => $request->financial_title_4,
                'financial_title_4_paragraph' => $request->financial_title_4_paragraph,
                'financial_title_5' => $request->financial_title_5,
                'financial_title_5_paragraph' => $request->financial_title_5_paragraph,
                'financial_title_6' => $request->financial_title_6,
                'financial_title_6_paragraph' => $request->financial_title_6_paragraph,
                'financial_text_content_1' => $request->financial_text_content_1,
            ]
        );
        
        return back()->withFlashSuccess('Updated Successfully');
    }
}
