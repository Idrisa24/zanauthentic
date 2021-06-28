<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();
        return Inertia::render('Tours/Index', ['tours' => $tours]);
    }
    
    public function home_tours()
    {
        return Inertia::render('Tours/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Tours/Create');
        
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
            'tour_name' => ['required', 'string', 'max:255'],
            'tour_price' => ['required', 'string'],
            'tour_discription' => ['required'],
            'tour_photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:15360'],
        ])->validateWithBag('createnewtour');

        $tour = Tour::create([
            'tour_name' => $request->tour_name,
            'tour_description' => $request->tour_discription,
            'tour_price' => $request->tour_price,
        ]);

        if (isset($request['tour_photo'])) {
            $tour->tour_photo_path =  $request->tour_photo->store('tours', 'public');
            $tour->save();
        }




        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        return Inertia::render('Tours/Show',['tour' => $tour]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        //
    }

    public function details(Tour $tour)
    {
        return Inertia::render('TourDetailPage', ['tour' => $tour]);
    }
}
