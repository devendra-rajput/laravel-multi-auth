<?php

use Carbon\Carbon;

if (! function_exists('user_type')) {
    function user_type()
    {
        if(auth('admin')->user()){
            return "admin";
        } else if(auth('user')->user()){
            return "user";
        } else if(auth('associate')->user()){
            return "associate";
        } else {
            return false;
        }
    }
}


if (! function_exists('authenticatedUser')) {
    function authenticatedUser($userType = '')
    {
        if(empty($userType)){
            return auth(user_type())->user();
        }
        return auth($userType)->user();
    }
}

if (! function_exists('get_guard')) {
    function get_guard(){
        if(\Auth::guard('admin')->check())
            {return "admin";}
        else if(\Auth::guard('user')->check())
            {return "user";}
        else if(\Auth::guard('associate')->check())
            {return "associate";}
    }
}

if (! function_exists('currentDateTime')) {
    function currentDateTime() {
        return Carbon::now()->toDateTimeString();
    }
}