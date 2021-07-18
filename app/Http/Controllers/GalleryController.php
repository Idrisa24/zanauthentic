<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        $data = [
            'total' =>Gallery::count(),
            'published' =>Gallery::where('gallery_status','=','published')->count(),
            'unpublished' =>Gallery::where('gallery_status','=','unpublished')->count(),
        ];
        return Inertia::render('Galleries/Index',['galleries' => $galleries, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Galleries/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'gallery_title' => ['required', 'string', 'max:255'],
            'gallery_status' => ['required', 'array'],
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1536000'],
        ])->validateWithBag('createnewgallery');

       $gallery = Gallery::create([
            'gallery_title' => $request->gallery_title,
            'gallery_status' => $request['gallery_status']['value'],
            'gallery_photo_path' => $request->photo->store('galleries', 'public'),
        ]);

        if ($gallery) {
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return Inertia::render('Galleries/Show',['gallery' => $gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        Validator::make($request->all(), [
            'gallery_title' => ['required', 'string', 'max:255'],
            'gallery_status' => ['required', 'array'],
            'photo' => ['rullable', 'mimes:jpg,jpeg,png', 'max:1536000'],
        ])->validateWithBag('createnewgallery');

    //  dd($request->all());
        $gallery->gallery_title = $request->gallery_title;
        $gallery->gallery_status = $request['gallery_status']['value'];

        if($gallery->update()){
            if (isset($request['photo'])) {
                $gallery->gallery_photo_path =  $request->photo->store('galleries', 'public');
                $gallery->update();
            }

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
