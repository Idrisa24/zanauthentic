<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        
        return Inertia::render('Settings/Index',['slides' => $slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Settings/Create');
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
            'slide_title' => ['required', 'string', 'max:255'],
            'slide_status' => ['required', 'array'],
            'slide_position' => ['required', 'array'],
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1536000'],
        ])->validateWithBag('createnewslide');

       $slide = Slide::create([
            'slide_title' => $request->slide_title,
            'slide_position' => $request['slide_position']['value'],
            'slide_status' => $request['slide_status']['value'],
            'slide_photo_path' => $request->photo->store('slides', 'public'),
        ]);

        if ($slide) {
            return Redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        return Inertia::render('Settings/Show',['slide' => $slide]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        Validator::make($request->all(), [
            'slide_title' => ['required', 'string', 'max:255'],
            'slide_status' => ['required', 'array'],
            'slide_position' => ['required', 'array'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1536000'],
        ])->validateWithBag('updateslide');

        $slide = Slide::findOrFail($slide->id);

        $slide->slide_title = $request->slide_title;
        $slide->slide_status = $request['slide_status']['value'];
        $slide->slide_position = $request['slide_position']['value'];

        if($slide->update()){

            if (isset($request['photo'])) {
                $slide->slide_photo_path =  $request->photo->store('slides', 'public');
                $slide->update();
            }

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        //
    }
}
