<?php

/*
 * Logic Functions
 * All Site function must be put in here for easy control
 */

namespace App\Components;

use App\ImageSetup;
use DB;
use App\Category;

class Functions
{
    public static function getCategories()
    {
        $categories = Category::where('parent_id', 0)->get();
        return $categories;
    }

    public static function getBanner()
    {
        $image = ImageSetup::where('type', 2)->where('status', true)->orderBy('id', 'DESC')->first();
        return $image;
    }

    public static function getFooter()
    {
        $image = ImageSetup::where('type', 1)->where('status', true)->orderBy('id', 'DESC')->first();
        return $image;
    }

}