<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Inertia\Inertia;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $packages = Package::all();
        $packages = Package::with('tour')->get();

        $data = [
            'total' => Package::with('tour')->get()->count(),
            'unpublished' => Package::where('package_status','=','unpublished')->with('tour')->get()->count(),
            'published' => Package::where('package_status','=','published')->with('tour')->get()->count(),
            'expired' => Package::where('package_status','=','expired')->with('tour')->get()->count(),
        ];
        return Inertia::render('Packages/Index',['packages' => $packages, 'data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = Tour::all();
        return Inertia::render('Packages/Create',['tours' => $tours]);
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
            'package_name' => ['required', 'string', 'max:255'],
            'package_price' => ['required', 'integer'],
            'package_discription' => ['required'],
            'tour_id' => ['required', 'array'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1536000'],
        ])->validateWithBag('createnewpackage');

        // dd($request->all());

        $package =  Package::create([
            'package_name' => $request['package_name'],
            'package_price' => $request['package_price'],
            'package_description' => $request['package_discription'],
            'tour_id' => $request['tour_id']['id'],
        ]);

        
        if (isset($request['photo'])) 
        {
            $package->package_photo_path = $request->photo->store('packages', 'public');
            $package->save();
        }

        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        $tours = Tour::all();
        return Inertia::render('Packages/Show', ['package' => $package, 'tours' => $tours]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        Validator::make($request->all(), [
            'package_name' => ['required', 'string', 'max:255'],
            'package_price' => ['required', 'integer'],
            'package_description' => ['required'],
            'tour_id' => ['required', 'array'],
            'package_status' => ['required', 'array'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1536000'],
        ])->validateWithBag('updatepackage');

        $package = Package::findOrFail($package->id);

        $package->package_name = $request->package_name;
        $package->package_description = $request->package_description;
        $package->tour_id = $request["tour_id"]["id"];
        $package->package_price = $request->package_price;
        $package->package_status = $request["package_status"]["value"];

        if($package->update()){

            if (isset($request['photo'])) {
                $package->package_photo_path =  $request->photo->store('packages', 'public');
                $package->update();
            }

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $destroy = Package::findOrFail($package->id)->delete();
       if ($destroy) {
        return redirect()->back();
       }
    }

    public function details(Package $package)
    {
        return Inertia::render('PackageDetails.vue', ['packa' => $package]);
    }

    public function deletePackahePhoto(Package $package)
    {
        $package = Package::findOrFail($package->id);

        $package->package_photo_path = null;

        if($package->update())
        return redirect()->back();
    }
}
