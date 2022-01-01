<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses;
use App\Models\BusinessCategories;
use App\Models\FavoriteBusinesses;
use App\Mail\Frontend\Business;
use App\Mail\Frontend\UserBusiness;
use App\Mail\Frontend\SingleBusinessAdmin;
use App\Mail\Frontend\SingleBusinessUser;
use App\Mail\Frontend\SingleBusinessOwner;
use Illuminate\Support\Facades\Mail;
use App\Models\SingleBusinessContact;

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

        return view('frontend.business.business_register', ['categories' => $categories]);
    }

    public function businessRegisterRequest(Request $request)
    {
        // dd($request->file('image'));

        $user_id = auth()->user()->id;

        $data = [];

        if($request->hasFile('image')) {
            foreach($request->file('image') as $image)
            {
                $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/businesses'),$imageName);
                array_push($data, $imageName);
            }
        }


        // $image = $request->file('image');
        // $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        // $image->move(public_path('images/businesses'),$imageName);

        $business = new Businesses;

        $business->user_id = $user_id;
        $business->name = $request->name;
        $business->category_1 = $request->category_1;
        $business->category_2 = $request->category_2;
        $business->category_3 = $request->category_3;
        $business->description = $request->description;
        $business->contact_name = $request->contact_name;
        $business->email = $request->email;
        $business->phone = $request->phone;
        $business->address = $request->address;
        $business->image = json_encode($data);
        $business->facebook = $request->facebook;
        $business->twitter = $request->twitter;
        $business->you_tube = $request->you_tube;
        $business->linked_in = $request->linked_in;
        $business->package = $request->package;
        $business->status = 'Pending';
        $business->featured = 'No';
        $business->student_service = 'No';

        $business->save();


        $details = [
            'name' => $request->name,
            'category_1' => $request->category_1,
            'category_2' => $request->category_2,
            'category_3' => $request->category_3,
            'description' => $request->description,
            'contact_name' => $request->contact_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'you_tube' => $request->you_tube,
            'linked_in' => $request->linked_in,
            'package' => $request->package
        ];

        Mail::to(['zajjith@gmail.com', 'ccaned@gmail.com'])->send(new Business($details));

        Mail::to([$request->email])->send(new UserBusiness($details));

        return back()->with('success', 'success');    

    }


    public function businessCategories()
    {
        $categories = BusinessCategories::where('status', 'Approved')->orderBy('name', 'ASC')->get();

        return view('frontend.business.business_categories', ['categories' => $categories]);
    }


    public function businesses($id)
    {
        $category = businessCategories::where('id', $id)->first();

        $businesses = Businesses::where('status', 'Approved')->where(function($query) use ($id) {
            $query->where('category_1', $id)->orWhere('category_2', $id)->orWhere('category_3', $id);
        })->orderBy('updated_at', 'DESC')->get();

        return view('frontend.business.businesses', ['businesses' => $businesses, 'category' => $category]);
    }

    public function singleBusiness($id)
    {
        $business = Businesses::where('id', $id)->first();

        $more_businesses = Businesses::inRandomOrder()->limit(4)->get();

        return view('frontend.business.single_business', ['business' => $business, 'more_businesses' => $more_businesses]);
    }


    

    public function businessSearch(Request $request)
    {
        if(request('keyword') != null) {
            $business = request('keyword');
        }
        else {
            $business = 'business';
        }

        return redirect()->route('frontend.business_search_function', [$business]);

    }

    public function businessSearchFunction($business)
    {
        $businesses = Businesses::where('status', 'Approved');

        // $category = businessCategories::where('id', $category_id)->first();

        if($business != 'business'){
            $businesses->where('name', 'like', '%' .  $business . '%');
        }

        $filteredBusinesses = $businesses->get();

        return view('frontend.business.businesses_search', ['filteredBusinesses' => $filteredBusinesses]);

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



    public function BusinessSingleContact(Request $request)
    {
        $user_id = auth()->user()->id;

        $single_business_contact = new SingleBusinessContact;


        $single_business_contact->user_id = $user_id;
        $single_business_contact->business_id = $request->business_id;
        $single_business_contact->name = $request->name;
        $single_business_contact->email = $request->email;
        $single_business_contact->message = $request->message;

        $single_business_contact->save();


        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'business_id' => $request->business_id,
        ];

        Mail::to(['zajjith@gmail.com', 'ccaned@gmail.com'])->send(new SingleBusinessAdmin($details));

        Mail::to([$request->email])->send(new SingleBusinessUser($details));

        Mail::to([Businesses::where('id', $request->business_id)->first()->email])->send(new SingleBusinessOwner($details));


        return back()->with('business_contact', 'business_contact'); 

    }


}
