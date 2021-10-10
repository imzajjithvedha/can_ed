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
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }
}