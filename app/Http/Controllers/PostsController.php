<?php

namespace App\Http\Controllers;

use Image;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        view()->share('categoryList', Category::getList());
    }

    public function saveImage($file, $old=null) {
        $filename = md5(time()) . str_slug($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        \Image::make($file->getRealPath())->save(public_path('files/'. $filename));
        if ($old) {
            @unlink(public_path('files/' .$old));
        }
        return $filename;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = (new Post)->forceFill([
            'status' => true,
        ]);

        return view('posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'category_id' => 'required',
        ], [
            'name.required' => 'Hãy chọn tiêu đề bài viết.',
            'category_id.required' => 'Hãy chọn danh mục bài viết.',
        ]);
        $imageArr = [];
        if (count($request->file('images'))) {
            $images = $request->file('images');

            foreach ($images as $image) {
                $imageItem = $this->saveImage($image);
                $imageArr[] = $imageItem;
            }
        }
        Post::forceCreate([
            'name' => request('name'),
            'slug' => str_slug(request('name')),
            'images' => json_encode($imageArr),
            'category_id' => request('category_id'),
            'content' => request('content'),
            'desc' => request('desc'),
            'status' => !! request('status')
        ]);

        return redirect()->route('posts.index')->with('success', 'Post successfully created.' );
    }

    public function show(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'category_id' => 'required',
        ], [
            'name.required' => 'Hãy chọn tiêu đề bài viết.',
            'category_id.required' => 'Hãy chọn danh mục bài viết.',
        ]);
        $imageArr = [];
        if (count($request->file('images'))) {
            $images = $request->file('images');

            foreach ($images as $image) {
                $imageItem = $this->saveImage($image);
                $imageArr[] = $imageItem;
            }
        }

        $post->forceFill([
            'name' => request('name'),
            'slug' => str_slug(request('name')),
            'images' => count($imageArr) > 0 ? json_encode($imageArr) : $post->images,
            'category_id' => request('category_id'),
            'content' => request('content'),
            'desc' => request('desc'),
            'status' => !! request('status')
        ])->save();

        return redirect()->route('posts.index')->with('success', 'Category successfully updated.' );
    }

    public function getDatatables()
    {
        return Post::getDatatables();
    }
}
