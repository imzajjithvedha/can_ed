<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses; 
use DB;
use DataTables;
use File;
use App\Models\VirtualTours;
use App\Models\Schools;
use App\Mail\Frontend\VirtualTour;
use App\Mail\Frontend\UserVirtualTour;
use App\Mail\Frontend\VirtualTourUpdate;
use App\Mail\Frontend\UserVirtualTourUpdate;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

/**
 * Class UserSchoolVirtualToursController.
 */
class UserSchoolVirtualToursController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    public function virtualTours()
    {
        $user_id = auth()->user()->id;

        $virtual_tours = VirtualTours::where('user_id', $user_id)->orderBy('updated_at', 'desc')->get();

        return view('frontend.user.user_virtual_tours.virtual_tours', ['virtual_tours' => $virtual_tours]);
    }

    public function createVirtualTour()
    {
        return view('frontend.user.user_virtual_tours.virtual_tours_create');
    }

    public function storeVirtualTour(Request $request)
    {
        $user_id = auth()->user()->id;

        $school_id = Schools::where('user_id', $user_id)->first()->id;

        if($request->file('image') != null) {
            $image = $request->file('image');
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/virtual_tours'),$imageName);
        }
        else {
            $imageName = null;
        }

        $virtual_tour = new VirtualTours;

        $virtual_tour->user_id = $user_id;
        $virtual_tour->school_id = $school_id;
        $virtual_tour->city = $request->city;
        $virtual_tour->province = $request->province;
        $virtual_tour->country = $request->country;
        $virtual_tour->color = $request->color;
        $virtual_tour->link = $request->url;
        $virtual_tour->image = $imageName;
        $virtual_tour->status = 'Pending';
        $virtual_tour->featured = 'No';

        $virtual_tour->save();


        $details = [
            'school_id' => $school_id,
            'city' => $request->city,
            'province' => $request->province,
            'country' => $request->country,
            'url' => $request->url,
        ];


        Mail::to(['ccaned@gmail.com'])->send(new VirtualTour($details));
    
        Mail::to(auth()->user()->email)->send(new UserVirtualTour($details));

        return redirect()->route('frontend.user.virtual_tours')->with('created', 'created');
    }

    public function virtualTourEdit($id)
    {
        $virtual_tour = VirtualTours::where('id', $id)->first();

        return view('frontend.user.user_virtual_tours.virtual_tours_edit', ['virtual_tour' => $virtual_tour]);
    }


    public function VirtualTourUpdate(Request $request)
    {

        $user_id = auth()->user()->id;
        
        $school_id = Schools::where('user_id', $user_id)->first()->id;
        
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/virtual_tours'),$imageName);


            $virtual_tour = DB::table('virtual_tours') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $imageName,
                ]
            );
        }
        else {

            $virtual_tour = DB::table('virtual_tours') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $request->old_image,
                ]
            );
        }
        
        $virtual_tour = DB::table('virtual_tours') ->where('id', request('hidden_id'))->update(
            [

                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'link' => $request->url,
                'status' => 'Pending',
                'updated_at' => Carbon::now(),
            ]
        );


        if($request->status == 'Approved') {
            
            $details = [
                'school_id' => $school_id,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'url' => $request->url,
            ];
    
            Mail::to(['ccaned@gmail.com'])->send(new VirtualTourUpdate($details));
    
            Mail::to(auth()->user()->email)->send(new UserVirtualTourUpdate($details));
        }
   
        return redirect()->route('frontend.user.virtual_tours')->with('success', 'success');    
    }



    public function virtualTourDelete($id)
    {
        $virtual_tour = VirtualTours::where('id', $id)->delete();

        return back();
    }
}
