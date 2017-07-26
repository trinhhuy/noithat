<?php

/*
 * Logic Functions
 * All Site function must be put in here for easy control
 */

namespace App\Components;

use DB;
use App\Category;

class Functions
{
    public static function getCategories()
    {
        $categories = Category::where('parent_id', 0)->get();
        return $categories;
    }

}