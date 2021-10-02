<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses;
use App\Models\BusinessCategories;
use App\Models\FavoriteBusinesses;

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
        $business->featured = 'No';

        $business->save();

        return back()->with('success', 'success');    

    }


    public function singleBusiness($id)
    {
        $business = Businesses::where('id', $id)->first();

        $more_businesses = Businesses::inRandomOrder()->limit(4)->get();

        return view('frontend.single_business', ['business' => $business, 'more_businesses' => $more_businesses]);
    }


    public function businessCategories()
    {
        $categories = BusinessCategories::where('status', 'Approved')->orderBy('name', 'ASC')->get();

        return view('frontend.business_categories', ['categories' => $categories]);
    }


    public function businesses($id)
    {
        $category = businessCategories::where('id', $id)->first()->name;

        $businesses = Businesses::where('status', 'Approved')->where('category', $id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.businesses', ['businesses' => $businesses, 'category' => $category]);
    }


    public function categorySearch(Request $request)
    {
        if(request('keyword') != null) {
            $category = request('keyword');
        }
        else {
            $category = 'category';
        }

        return redirect()->route('frontend.category_search_function', [$category]);

    }

    public function categorySearchFunction($category)
    {
        $categories = BusinessCategories::where('status', 'Approved');

        if($category != 'article'){
            $categories->where('name', 'like', '%' .  $category . '%');
        }

        $filteredCategories = $categories->get();

        return view('frontend.business_categories_search', ['filteredCategories' => $filteredCategories]);

    }

    public function businessSearch(Request $request)
    {
        $category = $request->category;

        if(request('keyword') != null) {
            $business = request('keyword');
        }
        else {
            $business = 'business';
        }

        return redirect()->route('frontend.business_search_function', [$category, $business]);

    }

    public function businessSearchFunction($category, $business)
    {
        $businesses = Businesses::where('status', 'Approved');

        if($business != 'business'){
            $businesses->where('name', 'like', '%' .  $business . '%');
        }

        $filteredBusinesses = $businesses->get();

        return view('frontend.businesses_search', ['category' => $category, 'filteredBusinesses' => $filteredBusinesses]);

    }


    public function favoriteBusiness(Request $request) {

        $business_id = $request->hidden_id;
        $status = $request->favorite;
        $user_id = auth()->user()->id;


        if($status == 'non-favorite') {

            $favorite = new FavoriteBusinesses;

            $favorite->user_id = $user_id; 

            $favorite->business_id = $business_id;

            $favorite -> save();

            return back();
        }

        if($status == 'favorite') {

            $favorite = FavoriteBusinesses::where('user_id', $user_id)->where('business_id', $business_id)->delete();

            return back();
        }
    }


}
