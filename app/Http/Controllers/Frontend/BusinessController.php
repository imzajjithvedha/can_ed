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
use Omnipay\Omnipay;
use App\Models\Payments;

/**
 * Class BusinessController.
 */
class BusinessController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    
    public function businessRegister()
    {
        $categories = BusinessCategories::where('status', 'Approved')->get();

        return view('frontend.business.business_register', ['categories' => $categories, 'success' => false]);
    }

    public function businessRegisterRequest(Request $request)
    {
        if($request->name != null) {
            $name = $request->name;
        }
        else {
            $name = 'name';
        }

        if($request->category_1 != null) {
            $category_1 = $request->category_1;
        }
        else {
            $category_1 = 'category_1';
        }

        if($request->category_2 != null) {
            $category_2 = $request->category_2;
        }
        else {
            $category_2 = 'category_2';
        }

        if($request->category_3 != null) {
            $category_3 = $request->category_3;
        }
        else {
            $category_3 = 'category_3';
        }

        if($request->description != null) {
            $description = $request->description;
        }
        else {
            $description = 'description';
        }

        if($request->contact_name != null) {
            $contact_name = $request->contact_name;
        }
        else {
            $contact_name = 'contact_name';
        }

        if($request->email != null) {
            $email = $request->email;
        }
        else {
            $email = 'email';
        }

        if($request->phone != null) {
            $phone = $request->phone;
        }
        else {
            $phone = 'phone';
        }

        if($request->address != null) {
            $address = $request->address;
        }
        else {
            $address = 'address';
        }

        if($request->url != null) {
            $url = str_replace('/',' ',$request->url);
        }
        else {
            $url = 'url';
        }

        if($request->facebook != null) {
            $facebook = str_replace('/',' ',$request->facebook);
        }
        else {
            $facebook = 'facebook';
        }

        if($request->twitter != null) {
            $twitter = str_replace('/',' ',$request->twitter);
        }
        else {
            $twitter = 'twitter';
        }

        if($request->you_tube != null) {
            $you_tube = str_replace('/',' ',$request->you_tube);
        }
        else {
            $you_tube = 'you_tube';
        }

        if($request->linked_in != null) {
            $linked_in = str_replace('/',' ',$request->linked_in);
        }
        else {
            $linked_in = 'linked_in';
        }

        if($request->package != null) {
            $package = $request->package;
        }
        else {
            $package = 'package';
        }



        $data = [];

        if($request->hasFile('single_image')) {
            $image = $request->file('single_image');
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/businesses'), $imageName);

            array_push($data, $imageName);

            $image_name = json_encode($data);
        }

        else if($request->hasFile('image')) {
            foreach($request->file('image') as $image)
            {
                $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/businesses'),$imageName);
                array_push($data, $imageName);

                $image_name = json_encode($data);
            }
        }

        if($request->amount != '0.00')

            try {
                
                $response = $this->gateway->purchase(
                    array(
                        'amount' => $request->amount,
                        'currency' => env('PAYPAL_CURRENCY'),
                        'returnUrl' => url('businesses/single-business/payment/success', [$name, $category_1, $category_2, $category_3, $description, $contact_name, $email, $phone, $address, $url, $facebook, $twitter, $you_tube, $linked_in, $package, $image_name]),
                        'cancelURL' => url('businesses/single-business/payment/error')
                    )
                )->send();

                if($response->isRedirect()) {
                    $response->redirect();
                }
                else {
                    return $response->getMessage();
                }

            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        
        else {

            $user_id = auth()->user()->id;
                
        
            $business = new Businesses;
    
            $business->user_id = $user_id;
            $business->name = $name;
            $business->category_1 = $category_1;

            if($category_2 != 'category_2') {
                $business->category_2 = $category_2;
            }
            else {
                $business->category_2 = null;
                $category_2 = null;
            }
            
            if($category_3 != 'category_3') {
                $business->category_3 = $category_3;
            }
            else {
                $business->category_3 = null;
                $category_3 = null;
            }

            $business->description = $description;
            $business->contact_name = $contact_name;
            $business->email = $email;
            $business->phone = $phone;
            $business->address = $address;
            $business->image = $image_name;

            if($url != 'url') {
                $business->url = preg_replace('/\s+/', '/', $url);
            }
            else {
                $business->url = null;
            }

            if($facebook != 'facebook') {
                $business->facebook = preg_replace('/\s+/', '/', $facebook);
            }
            else {
                $business->facebook = null;
            }

            if($twitter != 'twitter') {
                $business->twitter = preg_replace('/\s+/', '/', $twitter);
            }
            else {
                $business->twitter = null;
            }

            if($you_tube != 'you_tube') {
                $business->you_tube = preg_replace('/\s+/', '/', $you_tube);
            }
            else {
                $business->you_tube = null;
            }

            if($linked_in != 'linked_in') {
                $business->linked_in = preg_replace('/\s+/', '/', $linked_in);
            }
            else {
                $business->linked_in = null;
            }

            $business->package = $package;
            $business->status = 'Pending';
            $business->featured = 'No';
            $business->student_service = 'No';
            $business->advertised = 'No';
    
            $business->save();
    
    
            $details = [
                'name' => $name,
                'category_1' => $category_1,
                'category_2' => $category_2,
                'category_3' => $category_3,
                'description' => $description,
                'contact_name' => $contact_name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'package' => $package
            ];
    
            Mail::to(['ccaned@gmail.com'])->send(new Business($details));
    
            Mail::to([$request->email])->send(new UserBusiness($details));
            

            $categories = BusinessCategories::where('status', 'Approved')->get();

            return view('frontend.business.business_register', ['categories' => $categories, 'success' => true])->with('success', 'success');
        }
    }

    public function businessPaymentSuccess(Request $request, $name, $category_1, $category_2, $category_3, $description, $contact_name, $email, $phone, $address, $url, $facebook, $twitter, $you_tube, $linked_in, $package, $image_name) {

        if($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(
                array(
                    'payer_id' => $request->input('PayerID'),
                    'transactionReference' => $request->input('paymentId')
                )
            );

            $response = $transaction->send();


            if($response->isSuccessful()){

                $arr = $response->getData();

                $payment = new Payments();

                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->user_id = auth()->user()->id;
                $payment->purpose = 'business';
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];


                $payment->save();




                $user_id = auth()->user()->id;
                
        
                $business = new Businesses;
        
                $business->user_id = $user_id;
                $business->name = $name;
                $business->category_1 = $category_1;

                if($category_2 != 'category_2') {
                    $business->category_2 = $category_2;
                }
                else {
                    $business->category_2 = null;
                    $category_2 = null;
                }
                
                if($category_3 != 'category_3') {
                    $business->category_3 = $category_3;
                }
                else {
                    $business->category_3 = null;
                    $category_3 = null;
                }

                $business->description = $description;
                $business->contact_name = $contact_name;
                $business->email = $email;
                $business->phone = $phone;
                $business->address = $address;
                $business->image = $image_name;

                if($url != 'url') {
                    $business->url = preg_replace('/\s+/', '/', $url);
                }
                else {
                    $business->url = null;
                }

                if($facebook != 'facebook') {
                    $business->facebook = preg_replace('/\s+/', '/', $facebook);
                }
                else {
                    $business->facebook = null;
                }

                if($twitter != 'twitter') {
                    $business->twitter = preg_replace('/\s+/', '/', $twitter);
                }
                else {
                    $business->twitter = null;
                }

                if($you_tube != 'you_tube') {
                    $business->you_tube = preg_replace('/\s+/', '/', $you_tube);
                }
                else {
                    $business->you_tube = null;
                }

                if($linked_in != 'linked_in') {
                    $business->linked_in = preg_replace('/\s+/', '/', $linked_in);
                }
                else {
                    $business->linked_in = null;
                }

                $business->package = $package;
                $business->status = 'Pending';
                $business->featured = 'No';
                $business->student_service = 'No';
                $business->advertised = 'No';
        
                $business->save();
        
        
                $details = [
                    'name' => $name,
                    'category_1' => $category_1,
                    'category_2' => $category_2,
                    'category_3' => $category_3,
                    'description' => $description,
                    'contact_name' => $contact_name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'package' => $package
                ];
        
                Mail::to(['zajjith@gmail.com'])->send(new Business($details));
        
                Mail::to([$request->email])->send(new UserBusiness($details));
                

                $categories = BusinessCategories::where('status', 'Approved')->get();

                return view('frontend.business.business_register', ['categories' => $categories, 'success' => true])->with('success', 'success');
        
                // return back()->with('success', 'success');
            }
            else {
                return $response->getMessage();
            }
        }
        else {
            return 'Payment declined!';
        }
    }


    public function businessPaymentError() {
        return 'User declined the payment!';
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

        $more_businesses = Businesses::where('id', '!=', $id)->inRandomOrder()->limit(4)->get();

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



    public function businessSingleContact(Request $request)
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
            'email_copy' => $request->email_copy,
        ];


        Mail::to(['ccaned@gmail.com'])->send(new SingleBusinessAdmin($details));

        Mail::to([$request->email])->send(new SingleBusinessUser($details));

        Mail::to([Businesses::where('id', $request->business_id)->first()->email])->send(new SingleBusinessOwner($details));


        return back()->with('business_contact', 'business_contact'); 

    }


}
