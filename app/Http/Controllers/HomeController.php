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
        $news = Post::whereHas('category', function($q){
            $q->where('slug', 'tin-tuc');
        })->orderBy('id','DESC')->limit(2)->get();
        return view('home', compact('representativeCategories', 'posts', 'slides', 'news'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts;
        if (count($posts) > 1) {
            $posts = $category->posts()->paginate(10);
            $cost = '';
            if (strpos(url()->current(), 'bao-gia') == false ) {
                $cost = Category::where('slug', 'bao-gia')->first();
            }
            return view('frontend.posts', compact('posts', 'category', 'cost'));
        } else {
            return view('frontend.post', compact('posts', 'category'));
        }
    }
    public function postDetail($category, $post) {
        $post = Post::where('slug', $post)->first();
        $category = Category::where('slug', $category)->first();
        return view('frontend.post_detail', compact('post', 'category'));
    }
    public function getPostHome($representativeCategories) {
        $posts = [];
        foreach ($representativeCategories as $category) {
            foreach ($category->posts->take(6) as $post) {
                $posts[] = [
                    'category' => $category->slug,
                    'post' => $post
                ];
            }
        }
        return $posts;
    }
}