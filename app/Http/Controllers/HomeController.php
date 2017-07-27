<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Slide;
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
        $slides = Slide::where('status', true)->get();

        return view('home', compact('representativeCategories', 'posts', 'slides'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts;
        if (count($posts) > 1) {
            $posts = $category->posts()->paginate(2);

            return view('frontend.posts', compact('posts', 'category'));
        } else {
            return view('frontend.post', compact('posts', 'category'));
        }
    }

    public function postDetail($category, $post) {
        $post = Post::where('slug', $post)->first();
        return view('frontend.post_detail', compact('post'));
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
