<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representativeCategories = Category::where('isRepresentative', true)->get();
        $posts = $this->getPostHome($representativeCategories);

        return view('home', compact('representativeCategories', 'posts'));
    }

    public function getPostHome($representativeCategories) {
        $posts = [];
       foreach ($representativeCategories as $category) {
           foreach ($category->posts as $post) {
               $posts[] = [
                   'category' => $category->slug,
                    'post' => $post
               ];
           }
       }
        return $posts;
    }
}
