<?php

namespace App\Http\Controllers;

use Image;
use App\Slide;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
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
        return view('images.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slide = (new Slide)->forceFill([
            'status' => true,
        ]);

        return view('images.create', compact('slide'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'required|image',
        ], [
            'title.required' => 'Hãy chọn tiêu đề ảnh.',
            'image.required' => 'Hãy chọn ảnh.',
        ]);

        $image = $this->saveImage($request->file('image'));

        Slide::forceCreate([
            'title' => request('title'),
            'image' => $image,
            'status' => !! request('status')
        ]);

        return redirect()->route('images.index')->with('success', 'Post successfully created.' );
    }


    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('images.edit', compact('slide'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
        ], [
            'name.required' => 'Hãy chọn tiêu đề ảnh.',
        ]);

        if (count(request()->file('images'))) {
            $image = $this->saveImage(request()->file('images'));
        }

        $slide = Slide::find($id);

        $slide->forceFill([
            'title' => request('title'),
            'image' => isset($image) ? $image : $slide->image,
            'status' => !! request('status')
        ])->save();

        return redirect()->route('images.index')->with('success', 'Category successfully updated.' );
    }

    public function getDatatables()
    {
        return Slide::getDatatables();
    }
}
