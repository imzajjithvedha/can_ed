<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Programs; 
use App\Models\Pages; 

/**
 * Class PagesController.
 */
class PagesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function aboutUs()
    {
        $about = Pages::where('name', 'about_us')->first();

        return view('backend.pages.about_us', ['about' => $about]);
    }

    public function aboutUsUpdate(Request $request)
    {
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/pages'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }


        $about = DB::table('pages') ->where('name', 'about_us')->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }




    public function FAQ()
    {
        $faq = Pages::where('name', 'faq')->first();

        return view('backend.pages.faq', ['faq' => $faq]);
    }

    public function FAQUpdate(Request $request)
    {
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/pages'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }


        $privacy = DB::table('pages') ->where('name', 'faq')->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }




    public function meetOurTeam()
    {
        $team = Pages::where('name', 'meet_our_team')->first();

        return view('backend.pages.meet_our_team', ['team' => $team]);
    }

    public function meetOurTeamUpdate(Request $request)
    {
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/pages'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }


        $team = DB::table('pages') ->where('name', 'meet_our_team')->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }



    public function ourSponsors()
    {
        $sponsor = Pages::where('name', 'our_sponsors')->first();

        return view('backend.pages.our_sponsors', ['sponsor' => $sponsor]);
    }

    public function ourSponsorsUpdate(Request $request)
    {
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/pages'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }


        $sponsor = DB::table('pages') ->where('name', 'our_sponsors')->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }


    public function privacyPolicy()
    {
        $privacy = Pages::where('name', 'privacy_policy')->first();

        return view('backend.pages.privacy_policy', ['privacy' => $privacy]);
    }

    public function privacyPolicyUpdate(Request $request)
    {
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/pages'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }


        $privacy = DB::table('pages') ->where('name', 'privacy_policy')->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }




    public function disclaimer()
    {
        $disclaimer = Pages::where('name', 'disclaimer')->first();

        return view('backend.pages.disclaimer', ['disclaimer' => $disclaimer]);
    }

    public function disclaimerUpdate(Request $request)
    {
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/pages'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }


        $disclaimer = DB::table('pages') ->where('name', 'disclaimer')->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }

}
