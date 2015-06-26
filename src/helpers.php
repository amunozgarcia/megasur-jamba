<?php

if (!function_exists('getdomain'))
{

    /**
     * @param $url
     * @return string
     */
    function getdomain($url)
    {
        $components = parse_url($url);
        preg_match('/\.([^\/]+)/', $components['host'], $domain);
        return strtolower($domain[1]);
    }
}