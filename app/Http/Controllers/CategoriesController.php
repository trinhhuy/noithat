<?php

namespace App\Http\Controllers;

use Image;
use App\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        view()->share('parentList', Category::getParentList());
    }

    public function saveImage($file, $old=null) {
        $filename = md5(time()) . str_slug($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        Image::make($file->getRealPath())->save(public_path('files/'. $filename));
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
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = (new Category)->forceFill([
            'status' => true,
            'isRepresentative' => true,
        ]);

        return view('categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|max:255|unique:categories',
            'banner' => 'required|image',
        ], [
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'banner.required' => 'Hãy chọn ảnh.',
        ]);

        $image = $this->saveImage(request()->file('banner'));

        Category::forceCreate([
            'name' => request('name'),
            'banner' => $image,
            'slug' => str_slug(request('name')),
            'status' => !! request('status'),
            'isRepresentative' => !! request('isRepresentative'),
            'parent_id' => request('parent_id', 0),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category successfully created.' );
    }

    public function show(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $this->validate(request(), [
            'name' => 'required|max:255|unique:categories,name,'.$category->id,
        ], [
            'name.unique' => 'Tên danh mục đã tồn tại.',
        ]);

        if (count(request()->file('banner'))) {
            $ima = $this->saveImage(request()->file('banner'));
        }

        $category->forceFill([
            'name' => request('name'),
            'banner' => isset($ima) ? $ima : $category->banner,
            'slug' => str_slug(request('name')),
            'status' => !! request('status'),
            'isRepresentative' => !! request('isRepresentative'),
            'parent_id' => request('parent_id', 0),
        ])->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully updated.' );
    }

    public function getDatatables()
    {
        return Category::getDatatables();
    }
}
