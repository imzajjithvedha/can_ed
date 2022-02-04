<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Articles;
use App\Models\FavoriteArticles;
use App\Models\Quotes;
use App\Models\Events;
use DB;
use App\Models\WorldWideNetwork;
use App\Models\FavoriteBusinesses;
use App\Models\Auth\User;
use App\Models\FavoriteSchools;
use App\Models\FavoriteEvents;
use App\Models\Schools;
use App\Models\Programs;
use App\Mail\Frontend\EventUpdate;
use App\Mail\Frontend\UserEventUpdate;
use App\Mail\Frontend\NetworkUpdate;
use App\Mail\Frontend\UserNetworkUpdate;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\QuoteUpdate;
use App\Mail\Frontend\UserQuoteUpdate;
use Carbon\Carbon;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function accountDashboard()
    {
        $user_id = auth()->user()->id;

        $events = Events::where('user_id', $user_id)->count();

        $quotes = Quotes::where('user_id', $user_id)->count();

        $articles = FavoriteArticles::where('user_id', $user_id)->count();

        $businesses = FavoriteBusinesses::where('user_id', $user_id)->count();

        $schools = FavoriteSchools::where('user_id', $user_id)->count();

        $networks = WorldWideNetwork::where('user_id', $user_id)->count();

        $suggested_programs = Programs::where('user_id', $user_id)->count();


        return view('frontend.user.account_dashboard', ['events' => $events, 'quotes' => $quotes, 'articles' => $articles, 'networks' => $networks, 'businesses' => $businesses, 'schools' => $schools, 'suggested_programs' => $suggested_programs]);
    }

    
    public function accountInformation()
    {
        $user_id = auth()->user()->id;

        $user = User::where('id', $user_id)->first();

        return view('frontend.user.account_information', ['user' => $user]);
    }

    public function accountInformationUpdate(Request $request)
    {
        $first_name = request('first_name');
        $last_name = request('last_name');
        $email = request('email');
        $display_name = request('display_name');
        $user_type = request('user_type');
        $dob = request('dob');
        $gender = request('gender');
        $marital = request('marital');
        $city = request('city');
        $province = request('province');
        $country = request('country');
        $postal_code = request('postal_code');
        $home_phone = request('home_phone');
        $mobile_phone = request('mobile_phone');

        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/users'),$imageName);
        } 
        else {
            $imageName = $request->old_image;
        }

        $users = DB::table('users') ->where('id', request('hidden_id'))->update(
            [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'display_name' => $display_name,
                'user_type' => $user_type,
                'dob' => $dob,
                'gender' => $gender,
                'marital_status' => $marital,
                'city' => $city,
                'province' => $province,
                'country' => $country,
                'postal_code' => $postal_code,
                'home_phone' => $home_phone,
                'mobile_phone' => $mobile_phone,
                'image' => $imageName,
                'updated_at' => Carbon::now(),
            ]
        );

        return back()->with('success', 'success');
    }

    

    //user events
    public function userEvents()
    {
        $user_id = auth()->user()->id;

        $events = Events::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.user_event.user_events', ['events' => $events]);
    }

    public function userEventEdit($id)
    {
        $event = Events::where('id', $id)->first();

        return view('frontend.user.user_event.user_event_edit', ['event' => $event]);
    }


    public function userEventUpdate(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/events'),$imageName);
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
                'status' => 'Pending',
                'organizer_email' => $request->email,
                'organizer_phone' => $request->phone,
                'url' => $request->url,
                'image' => $imageName,
                'updated_at' => Carbon::now(),
            ]
        );

        if($request->status == 'Approved') {

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
                'url' => $request->url,
                'user_id' => $user_id,
            ];
    
            Mail::to(['zajjith@gmail.com', 'ccaned@gmail.com'])->send(new EventUpdate($details));
    
            Mail::to([$request->email])->send(new UserEventUpdate($details));
        }

   
        return redirect()->route('frontend.user.user_events')->with('success', 'success');    
    }



    public function userEventDelete($id)
    {
        $event = Events::where('id', $id)->delete();

        return back();
    }


    // favorite articles
    public function favoriteArticles()
    {
        $user_id = auth()->user()->id;

        $favorite = FavoriteArticles::where('user_id', $user_id)->get();

        $articles = Articles::orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.favorite_articles', ['favorite' => $favorite, 'articles' => $articles]);
    }

    public function favoriteArticleDelete($id)
    {
        $favorite = FavoriteArticles::where('article_id', $id)->delete();

        return back();
    }


    // favorite schools
    public function favoriteSchools()
    {
        $user_id = auth()->user()->id;

        $favorite = FavoriteSchools::where('user_id', $user_id)->get();

        $schools = Schools::orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.favorite_schools', ['favorite' => $favorite, 'schools' => $schools]);
    }

    public function favoriteSchoolDelete($id)
    {
        $favorite = FavoriteSchools::where('school_id', $id)->delete();

        return back();
    }


    // favorite events
    public function favoriteEvents()
    {
        $user_id = auth()->user()->id;

        $favorite = FavoriteEvents::where('user_id', $user_id)->get();

        $events = Events::orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.favorite_events', ['favorite' => $favorite, 'events' => $events]);
    }

    public function favoriteEventDelete($id)
    {
        $favorite = FavoriteEvents::where('event_id', $id)->delete();

        return back();
    }





    //quotes
    public function userQuotes()
    {
        $user_id = auth()->user()->id;

        $quotes = Quotes::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.user_quote.user_quotes', ['quotes' => $quotes]);
    }

    public function getUserQuote($id)
    {
        $quo = Quotes::where('id', $id)->first();

        $quote = json_encode($quo);

        return $quote;
    }

    public function userQuoteUpdate(Request $request)
    {
        $quote = DB::table('quotes') ->where('id', request('hidden_id'))->update(
            [
                'quote' => $request->quote,
                'status' => 'Pending',
                'updated_at' => Carbon::now(),
            ]
        );


        if($request->status == 'Approved') {
            
            $details = [
                'quote' => $request->quote,
            ];
    
            Mail::to(['zajjith@gmail.com', 'ccaned@gmail.com'])->send(new QuoteUpdate($details));
    
            Mail::to([auth()->user()->email])->send(new UserQuoteUpdate($details));
        }
   

        
        return back()->with('success', 'success');    
    }

    public function userQuoteDelete($id)
    {
        $quotes = Quotes::where('id', $id)->delete();

        return back();
    }




    //world wide networks
    public function userNetworks()
    {
        $user_id = auth()->user()->id;

        $networks = WorldWideNetwork::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.user_network.user_networks', ['networks' => $networks]);
    }

    public function userNetworkEdit($id)
    {
        $network = WorldWideNetwork::where('id', $id)->first();

        return view('frontend.user.user_network.user_network_edit', ['network' => $network]);
    }

 
    public function userNetworkUpdate(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/world-wide-network'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }

        $network = DB::table('world_wide_network') ->where('id', request('hidden_id'))->update(
            [
                'user_id' => $user_id,
                'website_name' => $request->website_name,
                'url' => $request->website_url,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'country' => $request->country,
                'our_banner_url' => $request->our_banner_url,
                'image' => $imageName,
                'status' => 'Pending',
                'updated_at' => Carbon::now(),
            ]
        );

        if($request->status == 'Approved') {

            $details = [
                'website_name' => $request->website_name,
                'url' => $request->website_url,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'country' => $request->country,
                'our_banner_url' => $request->our_banner_url
            ];
    
            Mail::to(['zajjith@gmail.com', 'ccaned@gmail.com'])->send(new NetworkUpdate($details));
    
            Mail::to([$request->email])->send(new UserNetworkUpdate($details));
        }
   
        return redirect()->route('frontend.user.user_networks')->with('success', 'success');
    }

    public function userNetworkDelete($id)
    {
        $network = WorldWideNetwork::where('id', $id)->delete();

        return back();
    }

    
}
