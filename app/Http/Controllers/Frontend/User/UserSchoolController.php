<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses; 
use DB;
use File;
use App\Models\Schools;
use App\Models\Programs;

/**
 * Class UserSchoolController.
 */
class UserSchoolController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolDashboard()
    {
        $user_id = auth()->user()->id;

        $schools = Schools::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.school_dashboard', ['schools' => $schools]);
    }

    public function userSchoolEdit($id)
    {
        $school = Schools::where('id', $id)->first();

        $images = json_decode($school->images);

        $links = json_decode($school->links);

        return view('frontend.user.school_edit', ['school' => $school, 'images' => $images, 'links' => $links]);
    }


    public function userSchoolUpdate(Request $request)
    {
        $featured = $request->file('featured_image');

        if($featured != null) {
            $featured_image = time().'_'.rand(1000,10000).'.'.$featured->getClientOriginalExtension();
            
            $featured->move(public_path('images/schools'), $featured_image);
        } 
        else {
            $featured_image = $request->old_image;
        }

        $images = [];

        if($request->hasFile('new_images'))
         {

            foreach($request->file('new_images') as $image)
            {
                $name= time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

                $image->move(public_path('images/schools'), $name); 

                array_push($images, $name); 
            }
         }
        else {

            
            $images = $request->old_images;
            
        }


        $link_name = $request->link_name;

        $links = $request->links;

        $output_json = [];

        
        if($link_name == null) {
            
            $link_name == null;
        }
        else {
            foreach($link_name as $key=>$link_item) {
                $data = [
                    'link_name' => $link_item,
                    'link' => $links[$key]
                ];
    
                array_push($output_json, $data);
            }
        }

        
        
        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'website' => $request->website,
                'country' => $request->country,
                'featured_image' => $featured_image,
                'images' => json_encode($images),
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'you_tube' => $request->you_tube,
                'linked_in' => $request->linked_in,
                'links' => json_encode($output_json),
                'status' => 'Pending'
            ]
        );
   
        return redirect()->route('frontend.user.school_dashboard')->with('success', 'success');    
    }



    // public function suggestedProgramDelete($id)
    // {
    //     $program = Programs::where('id', $id)->delete();

    //     return back();
    // }




    
    // suggested programs
    public function suggestedPrograms()
    {
        $user_id = auth()->user()->id;

        $programs = Programs::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.suggested_programs', ['programs' => $programs]);
    }

    public function suggestedProgramEdit($id)
    {
        $program = Programs::where('id', $id)->first();

        return view('frontend.user.suggested_programs_edit', ['program' => $program]);
    }


    public function suggestedProgramUpdate(Request $request)
    {
        
        $program = DB::table('programs') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'Pending'
            ]
        );
   
        return redirect()->route('frontend.user.suggested_programs')->with('success', 'success');    
    }



    public function suggestedProgramDelete($id)
    {
        $program = Programs::where('id', $id)->delete();

        return back();
    }
}
