<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OnlineBusinessDirectory;
use Illuminate\Http\Request;

/**
 * Class OnlineBusinessDirectoryController.
 */
class OnlineBusinessDirectoryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $directories = OnlineBusinessDirectory::where('status', 'Approved')->get();

        return view('frontend.directory.online_business_directory', ['directories' => $directories]);
    }


    public function directorySearch(Request $request)
    {

        if(request('name') != null) {
            $name = request('name');
        }
        else {
            $name = 'name';
        }

        if(request('city') != null) {
            $city = request('city');
        }
        else {
            $city = 'city';
        }

        if(request('province') != null) {
            $province = request('province');
        }
        else {
            $province = 'province';
        }

        if(request('industry') != null) {
            $industry = request('industry');
        }
        else {
            $industry = 'industry';
        }



        return redirect()->route('frontend.directory_search_function', [$name, $city, $province, $industry]);

    }

    public function directorySearchFunction($name, $city, $province, $industry)
    {
        $directory = OnlineBusinessDirectory::where('status', 'Approved')->orderBy('name', 'asc');

        if($name != 'name'){
            $directory->where('name', 'like', '%' .  $name . '%');
        }

        if($city != 'city'){
            $directory->where('city', 'like', '%' .  $city . '%');
        }

        if($province != 'province'){
            $directory->where('province', 'like', '%' .  $province . '%');
        }

        if($industry != 'industry'){
            $directory->where('industry', 'like', '%' .  $industry . '%');
        }

        $filteredDirectory = $directory->paginate(10);

        return view('frontend.directory.online_business_directory_search', ['filteredDirectory' => $filteredDirectory]);

    }
}
