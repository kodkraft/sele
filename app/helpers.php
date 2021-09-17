<?php

use Illuminate\Routing\Route;

if(!function_exists('generateLink')) {
    function generateLink($key, $link): StdClass
    {
        $generatedLink = new \StdClass;
        $generatedLink->title = trans($key);
        $generatedLink->link = $link;

        return $generatedLink;
    }
}

if (!function_exists('getCurrentRouteName')) {
    function getCurrentRouteName(): ?string
    {
        return \Illuminate\Support\Facades\Route::currentRouteName();
    }
}

if (!function_exists('getCurrentRoute')) {
    function getCurrentRoute(): ?Route
    {
        return \Illuminate\Support\Facades\Route::getCurrentRoute();
    }
}

if (!function_exists('isActiveRouteByName')) {
    function isActiveRouteByName($startsWith): bool
    {
        return explode('.', \Illuminate\Support\Facades\Route::currentRouteName())[0] == $startsWith;
    }
}
