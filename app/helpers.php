<?php

use Carbon\Carbon;

if (! function_exists('currentDateTime')) {
    function currentDateTime() {
        return Carbon::now()->toDateTimeString();
    }
}