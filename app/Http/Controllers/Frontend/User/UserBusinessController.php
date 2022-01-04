<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses; 
use DB;
use App\Models\BusinessCategories;
use App\Models\FavoriteBusinesses;
use App\Mail\Frontend\BusinessUpdate;
use App\Mail\Frontend\UserBusinessUpdate;
use Illuminate\Support\Facades\Mail;
/**
 * Class UserBusinessController.
 */
class UserBusinessController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function businessDashboard()
    {
        $user_id = auth()->user()->id;

        $businesses = Businesses::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.user_business.business_dashboard', ['businesses' => $businesses]);
    }

    public function userBusinessEdit($id)
    {
        $business = Businesses::where('id', $id)->first();

        $categories = BusinessCategories::where('status', 'Approved')->get();

        return view('frontend.user.user_business.business_edit', ['business' => $business, 'categories' => $categories]);
    }


    public function userBusinessUpdate(Request $request)
    {

        $images = $request->file('new_image');

        $data = [];

        if($images != null) {
            foreach($images as $image)
            {
                $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/businesses'),$imageName);
                array_push($data, $imageName);
            }

            $business = DB::table('businesses') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $data,
                ]
            );

        }
        else {

            $business = DB::table('businesses') ->where('id', request('hidden_id'))->update(
                [
                    'image' => $request->old_image,
                ]
            );
        }
        
        $business = DB::table('businesses') ->where('id', request('hidden_id'))->update(
            [
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
                'status' => 'Pending',
            ]
        );

        if($request->status == 'Approved') {

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
    
            Mail::to(['zajjith@gmail.com', 'ccaned@gmail.com'])->send(new BusinessUpdate($details));
    
            Mail::to([$request->email])->send(new UserBusinessUpdate($details));
        }
   
        return redirect()->route('frontend.user.business_dashboard')->with('success', 'success');    
    }



    public function userBusinessDelete($id)
    {
        $business = Businesses::where('id', $id)->delete();

        return back();
    }


    // favorite businesses
    public function favoriteBusinesses()
    {
        $user_id = auth()->user()->id;

        $favorite = FavoriteBusinesses::where('user_id', $user_id)->get();

        $businesses = Businesses::orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.favorite_businesses', ['favorite' => $favorite, 'businesses' => $businesses]);
    }

    public function favoriteBusinessDelete($id)
    {
        $favorite = FavoriteBusinesses::where('business_id', $id)->delete();

        return back();
    }
}
