<?php


use App\Models\Schools; 
use App\Models\Businesses; 
use App\Models\FavoriteArticles; 
use App\Models\FavoriteBusinesses;

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
        $schoolRegistered = Schools::where('status','Approved')
            ->where('user_id',$user_id)
            ->first();
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
