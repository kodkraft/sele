<?php

if(!function_exists('generateLink')) {
    function generateLink($key, $link): StdClass
    {
        $generatedLink = new \StdClass;
        $generatedLink->title = trans($key);
        $generatedLink->link = $link;

        return $generatedLink;
    }
}
