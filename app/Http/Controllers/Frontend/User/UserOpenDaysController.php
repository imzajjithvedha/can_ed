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
use App\Mail\Frontend\ProgramUpdate;
use App\Mail\Frontend\UserProgramUpdate;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

/**
 * Class UserOpenDaysController.
 */
class UserOpenDaysController extends Controller
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
        $user_id = auth()->user()->id;

        $open_days = OpenDays::where('user_id', $user_id)->orderBy('title', 'asc')->get();

        return view('frontend.user.user_open_days.open_days_create', ['open_days' => $open_days]);
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

        $open_day->save();

        return redirect()->route('frontend.user.open_days')->with('created', 'created');
    }

    public function suggestedProgramEdit($id)
    {
        $program = Programs::where('id', $id)->first();

        $degree_levels = DegreeLevels::where('status', 'Approved')->get();

        return view('frontend.user.user_suggested_program.suggested_programs_edit', ['program' => $program, 'degree_levels' => $degree_levels]);
    }


    public function suggestedProgramUpdate(Request $request)
    {
        
        $program = DB::table('programs') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'degree_level' => $request->degree_level,
                'description' => $request->description,
                'status' => 'Pending',
                'updated_at' => Carbon::now(),
            ]
        );


        if($request->status == 'Approved') {
            
            $details = [
                'name' => $request->name,
                'degree_level' => $request->degree_level,
                'description' => $request->description,
            ];
    
            Mail::to(['zajjith@gmail.com'])->send(new ProgramUpdate($details));
    
            Mail::to(auth()->user()->email)->send(new UserProgramUpdate());
        }
   
        return redirect()->route('frontend.user.suggested_programs')->with('success', 'success');    
    }



    public function suggestedProgramDelete($id)
    {
        $program = Programs::where('id', $id)->delete();

        return back();
    }
}
