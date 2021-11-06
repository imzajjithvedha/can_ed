<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorldWideNetwork;
use App\Mail\Frontend\Network;
use Illuminate\Support\Facades\Mail;

/**
 * Class WorldWideNetworkController.
 */
class WorldWideNetworkController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $networks = WorldWideNetwork::where('status', 'Approved')->orderBy('updated_at', 'DESC')->get();

        return view('frontend.world_wide_network.world_wide_network', ['networks' => $networks]);
    }

    public function networkRequest(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/world-wide-network'), $imageName);

        $network = new WorldWideNetwork;

        $network->user_id = $user_id;
        $network->website_name = $request->website_name;
        $network->url = $request->website_url;
        $network->name = $request->name;
        $network->phone = $request->phone;
        $network->email = $request->email;
        $network->country = $request->country;
        $network->our_banner_url = $request->our_banner_url;
        $network->image = $imageName;
        $network->status = 'Pending';

        $network->save();


        $details = [
            'website_name' => $request->website_name,
            'url' => $request->website_url,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'our_banner_url' => $request->our_banner_url
        ];

        Mail::to(['zajjith@yopmail.com', 'zajjith@gmail.com', 'ccaned@gmail.com'])->send(new Network($details));

        return back()->with('success', 'success');

    }
}
