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

        $events = Events::where('user_id', $user_id)->where('status', 'Approved')->count();

        $quotes = Quotes::where('user_id', $user_id)->where('status', 'Approved')->count();

        $articles = FavoriteArticles::where('user_id', $user_id)->count();

        // $schools = FavoriteSchools::where('user_id', $user_id)->count();

        // $businesses = FavoriteArticles::where('user_id', $user_id)->count();

        return view('frontend.user.account_dashboard', ['events' => $events, 'quotes' => $quotes, 'articles' => $articles]);
    }

    
    public function accountInformation()
    {
        return view('frontend.user.account_information');
    }

    

    //user events
    public function userEvents()
    {
        $user_id = auth()->user()->id;

        $events = Events::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.user_events', ['events' => $events]);
    }

    public function userEventEdit($id)
    {
        $event = Events::where('id', $id)->first();

        return view('frontend.user.user_event_edit', ['event' => $event]);
    }


    public function userEventUpdate(Request $request)
    {
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
                'image' => $imageName
            ]
        );
   
        return back()->withFlashSuccess(__('alerts.frontend.event.update'));   
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

        $favorite = favoriteArticles::where('user_id', $user_id)->get();

        $articles = Articles::orderBy('created_at', 'DESC')->get();

        return view('frontend.user.favorite_articles', ['favorite' => $favorite, 'articles' => $articles]);
    }

    public function favoriteArticleDelete($id)
    {
        $favorite = FavoriteArticles::where('article_id', $id)->delete();

        return back();
    }


    //favorite schools
    public function favoriteSchools()
    {
        return view('frontend.user.favorite_schools');
    }


    //favorite businesses
    public function favoriteBusinesses()
    {
        return view('frontend.user.favorite_businesses');
    }


    //quotes
    public function userQuotes()
    {
        $user_id = auth()->user()->id;

        $quotes = Quotes::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.user_quotes', ['quotes' => $quotes]);
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
                'status' => 'Pending'
            ]
        );
   
        return back()->withFlashSuccess('Updated Successfully');    
    }

    public function userQuoteDelete($id)
    {
        $quotes = Quotes::where('id', $id)->delete();

        return back();
    }

    
}
