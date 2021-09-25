<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Events; 

/**
 * Class EventsController.
 */
class EventsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.events.index');
    }

    public function createEvent()
    {
        return view('backend.events.create');
    }

    public function storeEvent(Request $request)
    {
        $user_id = auth()->user()->id;

        if($request->file('image') != null) {
            $image = $request->file('image');
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/events'),$imageName);
        }
        else {
            $imageName = 'null';
        }

        $event = new Events;

        $event->user_id = $user_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->country = $request->country;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->type = $request->type;
        $event->status = 'Approved';
        $event->organizer_email = $request->email;
        $event->organizer_phone = $request->phone;
        $event->url = $request->url;
        $event->image = $imageName;

        $event->save();

        
        return redirect()->route('admin.events.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getEvents(Request $request)
    {
        if($request->ajax())
        {
            $data = Events::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.events.edit_event', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Approval </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<span class="badge bg-success">Approved</span>';
                    }else{
                        $status = '<span class="badge bg-warning text-dark">Pending</span>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action','status'])
                ->make(true);
        }
        
        return back();
    }


    public function editEvent($id)
    {

        $event = Events::where('id',$id)->first();

        return view('backend.events.edit',['event' => $event]);
    }

    public function updateEvent(Request $request)
    {    
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/events'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }
        
        $event = DB::table('events') ->where('id', request('hidden_id'))->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'city' => $request->city,
                'country' => $request->country,
                'date' => $request->date,
                'time' => $request->time,
                'type' => $request->type,
                'status' => $request->status,
                'organizer_email' => $request->email,
                'organizer_phone' => $request->phone,
                'url' => $request->url,
                'image' => $imageName
            ]
        );
   
        return redirect()->route('admin.events.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteEvent($id)
    {
        $event = Events::where('id', $id)->delete();
    }

}
