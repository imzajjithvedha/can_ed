<?php


use App\Models\Schools; 
use App\Models\Businesses; 
use App\Models\FavoriteArticles; 
use App\Models\FavoriteBusinesses;
use App\Models\FavoriteSchools;
use App\Models\FavoriteEvents;
use App\Models\FavoriteScholarships;


if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can('view backend')) {
                return 'admin.dashboard';
            }

            return 'frontend.user.account_dashboard';
        }

        return 'frontend.index';
    }
}


if (! function_exists('is_school_registered')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_school_registered($user_id)
    {
        $schoolRegistered = Schools::where('user_id',$user_id)->first();
        if($schoolRegistered)
        {
            return $schoolRegistered;
        }
        else{
            return null;
        }
    }
}

if (! function_exists('is_business_registered')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_business_registered($user_id)
    {
        $businessRegistered = Businesses::where('user_id',$user_id)->first();

        if($businessRegistered)
        {
            return $businessRegistered;
        }
        else{
            return null;
        }
    }
}


if (! function_exists('is_favorite')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_favorite($article_id, $user_id)
    {

        $favorite = FavoriteArticles::where('user_id', $user_id )
            ->where('article_id',$article_id)
            ->first();

        if($favorite)
        {
            return $favorite;
        }
        else {
            return null;
        }
    }
}


if (! function_exists('is_favorite_business')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_favorite_business($business_id, $user_id)
    {

        $favorite = FavoriteBusinesses::where('user_id', $user_id )
            ->where('business_id', $business_id)
            ->first();

        if($favorite)
        {
            return $favorite;
        }
        else {
            return null;
        }
    }
}


if (! function_exists('is_favorite_school')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_favorite_school($school_id, $user_id)
    {

        $favorite = FavoriteSchools::where('user_id', $user_id)
            ->where('school_id', $school_id)
            ->first();

        if($favorite)
        {
            return $favorite;
        }
        else {
            return null;
        }
    }
}


if (! function_exists('is_favorite_event')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_favorite_event($event_id, $user_id)
    {

        $favorite = FavoriteEvents::where('user_id', $user_id)
            ->where('event_id', $event_id)
            ->first();

        if($favorite)
        {
            return $favorite;
        }
        else {
            return null;
        }
    }
}


if (! function_exists('is_favorite_scholarship')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_favorite_scholarship($scholarship_id, $user_id)
    {

        $favorite = FavoriteScholarships::where('user_id', $user_id )
            ->where('scholarship_id', $scholarship_id)
            ->first();

        if($favorite)
        {
            return $favorite;
        }
        else {
            return null;
        }
    }
}


if (!function_exists('isHttps')) {

    function isHttps()
    {
        return !empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']);
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = (isHttps() ? "https://" : "http://").$_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        
        return $root;
    }
}

if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if(env('FILESYSTEM_DRIVER') == 's3'){
            return env('AWS_URL').'/';
        }
        else {
            return getBaseURL().'';
        }
    }
}

//return file uploaded via uploader
if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return my_asset($asset->file_name);
        }
        return url('/').'/img/no-image.jpg';
    }
}

if (! function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
         return app('url')->asset(''.$path, $secure);        
    }
}