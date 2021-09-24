<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses;
use App\Models\BusinessCategories;

/**
 * Class BusinessController.
 */
class BusinessController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    
    public function businessRegister()
    {
        $categories = BusinessCategories::where('status', 'Approved')->get();

        return view('frontend.business_register', ['categories' => $categories]);
    }

    public function businessRegisterRequest(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/businesses'),$imageName);

        $business = new Businesses;

        $business->user_id = $user_id;
        $business->name = $request->name;
        $business->category = $request->category;
        $business->description = $request->description;
        $business->contact_name = $request->contact_name;
        $business->email = $request->email;
        $business->phone = $request->phone;
        $business->address = $request->address;
        $business->image = $imageName;
        $business->facebook = $request->facebook;
        $business->twitter = $request->twitter;
        $business->you_tube = $request->you_tube;
        $business->linked_in = $request->linked_in;
        $business->package = $request->package;
        $business->status = 'Pending';

        $business->save();

        return back()->with('success', 'success');    

    }


    public function singleBusiness($id)
    {
        $business = Businesses::where('id', $id)->first();

        return view('frontend.single_business', ['business' => $business]);
    }


    public function businessSearch(Request $request)
    {
        if(request('business') != null) {
            $business = request('business');
        }
        else {
            $business = 'business';
        }


        if(request('location') != null) {
            $location = request('location');
        }
        else {
            $location = 'location';
        }

        return redirect()->route('frontend.business_search_function', [
            $business,
            $location,
        ]);

    }

    public function businessSearchFunction($business, $location)
    {

        $businesses = Businesses::where('status', 'Approved');

        if($business != 'business'){
            $businesses->where('business_name', 'like', '%' .  $business . '%');
        }

        if($location != 'location'){
            $businesses->where('address', 'like', '%' .  $location . '%');
        }

        

        $filteredBusinesses = $businesses->get();

        return view('frontend.business_search', ['filteredBusinesses' => $filteredBusinesses]);

    }


    public function businessCategories()
    {
        $categories = BusinessCategories::where('status', 'Approved')->orderBy('updated_at', 'DESC')->get();

        return view('frontend.business_categories', ['categories' => $categories]);
    }


    public function businesses($id)
    {
        $category = businessCategories::where('id', $id)->first()->name;

        $businesses = Businesses::where('status', 'Approved')->where('category', $id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.businesses', ['businesses' => $businesses, 'category' => $category]);
    }


}
