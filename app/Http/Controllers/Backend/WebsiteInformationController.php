<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\WebsiteInformation;
use Carbon\Carbon;

/**
 * Class WebsiteInformationController.
 */
class WebsiteInformationController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $information = WebsiteInformation::where('id', 1)->first();

        return view('backend.website.index', ['information' => $information]);
    }

    public function informationUpdate(Request $request)
    {

        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/home'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }

        $information = DB::table('website_information') ->where('id', 1)->update(
            [
                'name' => $request->name,
                'mantra' => $request->mantra,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'address_3' => $request->address_3,
                'address_4' => $request->address_4,
                'address_5' => $request->address_5,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'website_url' => $request->website_url,
                'facebook' => $request->facebook,
                'google' => $request->google,
                'you_tube' => $request->you_tube,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'main_banner' => $imageName,
                'featured_schools_description' => $request->featured_schools_description,
                'featured_businesses_description' => $request->featured_businesses_description,
                'featured_basic_articles_description' => $request->featured_basic_articles_description,
                'featured_international_articles_description' => $request->featured_international_articles_description,
                'featured_canadian_articles_description' => $request->featured_canadian_articles_description,
                'featured_work_study_articles_description' => $request->featured_work_study_articles_description,
                'featured_financial_planning_articles_description' => $request->featured_financial_planning_articles_description,
                'featured_academic_help_articles_description' => $request->featured_academic_help_articles_description,
                'featured_financial_help_articles_description' => $request->featured_financial_help_articles_description,
                'featured_immigration_articles_description' => $request->featured_immigration_articles_description,
                'featured_proxima_study_articles_description' => $request->featured_proxima_study_articles_description,
                'featured_need_help_articles_description' => $request->featured_need_help_articles_description,
                'featured_events_description' => $request->featured_events_description,
                'featured_videos_description' => $request->featured_videos_description,
                'recent_articles_description' => $request->recent_articles_description,
                'student_services_description' => $request->student_services_description,
                'advanced_search_description' => $request->advanced_search_description,
                'updated_at' => Carbon::now(),
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }
}
