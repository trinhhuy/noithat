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
//        $representativeCategories = Category::where('isRepresentative', true)->get();
//        $posts = $this->getPostHome($representativeCategories);
//        $slides = Slide::where('status', true)->get();
//        $news = Post::whereHas('category', function($q){
//            $q->where('slug', 'tin-tuc');
//        })->orderBy('id','DESC')->limit(2)->get();

        $categories = Category::where('parent_id', 0)->get();
        foreach ($categories as $category) {
            if(count($category->children) > 0) {
                $firstNavs[] = $category;
            } else {
                $secondNavs[] = $category;
            }
        }

        return view('home', compact('firstNavs', 'secondNavs'));
    }

    public function category($slug)
    {
        $categories = Category::where('parent_id', 0)->get();
        foreach ($categories as $category) {
            if(count($category->children) > 0) {
                $firstNavs[] = $category;
            } else {
                $secondNavs[] = $category;
            }
        }

        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts;

        if (count($posts) > 1) {
            $posts = $category->posts;

            return view('frontend.posts', compact('posts', 'category', 'firstNavs', 'secondNavs'));
        } else {

            return view('frontend.post', compact('posts', 'category', 'firstNavs', 'secondNavs'));
        }
    }

    public function postDetail($category, $post) {

        $categories = Category::where('parent_id', 0)->get();
        foreach ($categories as $category) {
            if(count($category->children) > 0) {
                $firstNavs[] = $category;
            } else {
                $secondNavs[] = $category;
            }
        }


        $post = Post::where('slug', $post)->first();
        return view('frontend.post_detail', compact('post', 'firstNavs', 'secondNavs'));
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
