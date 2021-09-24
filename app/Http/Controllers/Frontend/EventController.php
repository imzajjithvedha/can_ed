<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Events;
use Illuminate\Http\Request;

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

        return view('frontend.events', ['events' => $events]);
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

        return back()->withFlashSuccess(__('alerts.frontend.event.sent'));

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

        return view('frontend.single_event', ['event' => $event, 'more_events' => $more_events]);
    }

}
