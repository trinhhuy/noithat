<?php

namespace App\Http\Controllers;

use App\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        view()->share('parentList', Category::getParentList());
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
        if(!request()->has('margin')){
            request()->merge(['margin' => 0]);
        }

        $this->validate(request(), [
            'name' => 'required|max:255|unique:categories',
        ], [
            'name.unique' => 'Tên danh mục đã tồn tại.',
        ]);

        Category::forceCreate([
            'name' => request('name'),
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

        $category->forceFill([
            'name' => request('name'),
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
