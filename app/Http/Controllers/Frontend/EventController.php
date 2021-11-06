<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Mail\Frontend\Event;
use Illuminate\Support\Facades\Mail;

/**
 * Class EventController.
 */
class EventController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = Events::where('status', 'Approved')->orderBy('updated_at', 'DESC')->get();

        return view('frontend.event.events', ['events' => $events]);
    }

    public function eventRequest(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

        
        $image->move(public_path('images/events'), $imageName);

        $event = new Events;

        $event->user_id = $user_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->country = $request->country;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->type = $request->type;
        $event->status = 'Pending';
        $event->organizer_email = $request->email;
        $event->organizer_phone = $request->phone;
        $event->url = $request->url;
        $event->image = $imageName;

        $event->save();

        $details = [
            'name' => $request->title,
            'description' => $request->description,
            'city' => $request->city,
            'country' => $request->country,
            'date' => $request->date,
            'time' => $request->time,
            'type' => $request->type,
            'organizer_email' => $request->email,
            'organizer_phone' => $request->phone,
            'url' => $request->url
        ];

        Mail::to(['zajjith@yopmail.com', 'zajjith@gmail.com', 'ccaned@gmail.com'])->send(new Event($details));

        return back()->with('success', 'success');

    }


    public function getEvents(Request $request)
    {

        $data = Events::where('status', 'Approved')->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.single_event', $data->id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none;">Read More</a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }


    public function singleEvent($id)
    {
        $event = Events::where('id', $id)->first();

        $more_events = Events::inRandomOrder()->limit(5)->get();

        return view('frontend.event.single_event', ['event' => $event, 'more_events' => $more_events]);
    }

}
