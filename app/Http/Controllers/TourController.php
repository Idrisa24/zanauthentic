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
        $data = [
            'total' =>Tour::count(),
            'active' =>Tour::where('tour_status','=','active')->count(),
            'inactive' =>Tour::where('tour_status','=','inactive')->count(),
            'ended' =>Tour::where('tour_status','=','ended')->count(),
        ];
        return Inertia::render('Tours/Index', ['tours' => $tours, 'data' => $data]);
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
            'tour_price' => ['required', 'integer'],
            'tour_discription' => ['required'],
            'tour_photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1536000'],
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
        return Inertia::render('Tours/Show',['tour' => $tour]);
        
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
        Validator::make($request->all(), [
            'tour_name' => ['required', 'string', 'max:255'],
            'tour_price' => ['required', 'integer'],
            'tour_discription' => ['required'],
            'tour_status' => ['required','array'],
            'tour_photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1536000'],
        ])->validateWithBag('updateTourInformation');

        $tour = Tour::findOrFail($tour->id);

        $tour->tour_name = $request->tour_name;
        $tour->tour_description = $request->tour_discription;
        $tour->tour_price = $request->tour_price;
        $tour->tour_status = $request['tour_status']['value'];

        if($tour->update()){

            if (isset($request['tour_photo'])) {
                $tour->tour_photo_path =  $request->tour_photo->store('tours', 'public');
                $tour->update();
            }

            return redirect()->back();
        }

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        $destroy = Tour::findOrFail($tour->id)->delete();
       if ($destroy) {
        return redirect()->back();
       }

       
    }

    public function details(Tour $tour)
    {
        $tou = Tour::where('id','=',$tour->id)->with('packages')->get();
        foreach ($tou as $key => $date) 
        {
            $data['id'] = $date->id;
            $data['tour_name'] = $date->tour_name;
            $data['tour_description'] = $date->tour_description;
            $data['tour_price'] = $date->tour_price;
            $data['tour_photo_path'] = $date->tour_photo_path;

            if ($date->packages) {
                foreach ($date->packages as $key => $value) {
                    if ($value->package_status = 'published') {
                        $data['packages'][$key]['id'] = $value->id;
                        $data['packages'][$key]['package_photo_path'] = $value->package_photo_path;
                        $data['packages'][$key]['package_name'] = $value->package_name;
                        $data['packages'][$key]['package_price'] = $value->package_price;
                        $data['packages'][$key]['package_description'] = $value->package_description;
                    }

                }
            }
        }
        return Inertia::render('TourDetailPage', ['tour' => $data]);

        // dd($tour);
    }

    public function deleteTourPhote(Tour $tour)
    {
        $tour = Tour::find($tour->id);

        $tour->tour_photo_path = null;

        if($tour->update())
        return redirect()->back();
    }
}
