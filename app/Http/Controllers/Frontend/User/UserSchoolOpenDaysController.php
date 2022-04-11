<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses; 
use DB;
use DataTables;
use File;
use App\Models\OpenDays;
use App\Models\Schools;
use App\Mail\Frontend\OpenDay;
use App\Mail\Frontend\UserOpenDay;
use App\Mail\Frontend\OpenDayUpdate;
use App\Mail\Frontend\UserOpenDayUpdate;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

/**
 * Class UserSchoolOpenDaysController.
 */
class UserSchoolOpenDaysController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    public function openDays()
    {
        $user_id = auth()->user()->id;

        $open_days = OpenDays::where('user_id', $user_id)->orderBy('title', 'asc')->get();

        return view('frontend.user.user_open_days.open_days', ['open_days' => $open_days]);
    }

    public function createOpenDay()
    {
        return view('frontend.user.user_open_days.open_days_create');
    }

    public function storeOpenDay(Request $request)
    {
        $user_id = auth()->user()->id;

        $school_id = Schools::where('user_id', $user_id)->first()->id;

        if($request->file('image') != null) {
            $image = $request->file('image');
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/open_days'),$imageName);
        }
        else {
            $imageName = null;
        }

        $open_day = new OpenDays;

        $open_day->user_id = $user_id;
        $open_day->school_id = $school_id;
        $open_day->title = $request->title;
        $open_day->description = $request->description;
        $open_day->address = $request->address;
        $open_day->city = $request->city;
        $open_day->country = $request->country;
        $open_day->date = $request->date;
        $open_day->time = $request->time;
        $open_day->school_email = $request->email;
        $open_day->school_phone = $request->phone;
        $open_day->url = $request->url;
        $open_day->image = $imageName;
        $open_day->status = 'Pending';
        $open_day->featured = 'No';

        $open_day->save();


        $details = [
            'school_id' => $school_id,
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'date' => $request->date,
            'time' => $request->time,
            'school_email' => $request->email,
            'school_phone' => $request->phone,
            'url' => $request->url,
        ];


        Mail::to(['ccaned@gmail.com'])->send(new OpenDay($details));
    
        Mail::to(auth()->user()->email)->send(new UserOpenDay($details));

        return redirect()->route('frontend.user.open_days')->with('created', 'created');
    }

    public function openDayEdit($id)
    {
        $open_day = OpenDays::where('id', $id)->first();

        return view('frontend.user.user_open_days.open_days_edit', ['open_day' => $open_day]);
    }


    public function OpenDayUpdate(Request $request)
    {

        $user_id = auth()->user()->id;
        
        $school_id = Schools::where('user_id', $user_id)->first()->id;
        
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/open_days'),$imageName);


            $open_day = DB::table('open_days') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $imageName,
                ]
            );
        }
        else {

            $open_day = DB::table('open_days') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $request->old_image,
                ]
            );
        }
        
        $open_day = DB::table('open_days') ->where('id', request('hidden_id'))->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'date' => $request->date,
                'time' => $request->time,
                'school_email' => $request->email,
                'school_phone' => $request->phone,
                'url' => $request->url,
                'status' => 'Pending',
                'updated_at' => Carbon::now(),
            ]
        );


        if($request->status == 'Approved') {
            
            $details = [
                'school_id' => $school_id,
                'title' => $request->title,
                'description' => $request->description,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'date' => $request->date,
                'time' => $request->time,
                'school_email' => $request->email,
                'school_phone' => $request->phone,
                'url' => $request->url,
            ];
    
            Mail::to(['zajjith@gmail.com'])->send(new OpenDayUpdate($details));
    
            Mail::to(auth()->user()->email)->send(new UserOpenDayUpdate($details));
        }
   
        return redirect()->route('frontend.user.open_days')->with('success', 'success');    
    }



    public function openDayDelete($id)
    {
        $open_day = OpenDays::where('id', $id)->delete();

        return back();
    }
}
