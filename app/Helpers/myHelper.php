<?php

namespace App\Helpers;

class MyFuncs {

    public static function full_name($first_name,$last_name) {
        return $first_name . ', '. $last_name;   
    }

    public static function test_helper(){
    	echo "This is my Test Helper Function.";
    }
}