<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\WebsiteInformation; 

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
                'featured_articles_description' => $request->featured_articles_description,
                'featured_events_description' => $request->featured_events_description,
                'featured_videos_description' => $request->featured_videos_description,
                'recent_articles_description' => $request->recent_articles_description,
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }
}
