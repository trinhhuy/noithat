<?php

namespace App\Http\Controllers;

use Image;
use App\ImageSetup;
use Illuminate\Http\Request;

class ImageSetupsController extends Controller
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
        return view('images_setup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = (new ImageSetup)->forceFill([
            'status' => true,
        ]);

        return view('images_setup.create', compact('image'));
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
            'type' => 'required',
        ], [
            'title.required' => 'Hãy chọn tiêu đề ảnh.',
            'image.required' => 'Hãy chọn ảnh.',
            'type.required' => 'Hãy chọn loại ảnh.',
        ]);

        $image = $this->saveImage($request->file('image'));

        ImageSetup::forceCreate([
            'title' => request('title'),
            'image' => $image,
            'status' => !! request('status'),
            'type' => request('type')
        ]);

        return redirect()->route('images-setup.index')->with('success', 'Post successfully created.' );
    }


    public function edit($id)
    {
        $image = ImageSetup::find($id);
        return view('images_setup.edit', compact('image'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'type' => 'required',
        ], [
            'name.required' => 'Hãy chọn tiêu đề ảnh.',
            'type.required' => 'Hãy chọn loại ảnh.',
        ]);

        if (count(request()->file('image'))) {
            $ima = $this->saveImage(request()->file('image'));
        }

        $image = ImageSetup::find($id);

        $image->forceFill([
            'title' => request('title'),
            'image' => isset($ima) ? $ima : $image->image,
            'status' => !! request('status')
        ])->save();

        return redirect()->route('images-setup.index')->with('success', 'Category successfully updated.' );
    }

    public function getDatatables()
    {
        return ImageSetup::getDatatables();
    }
}
