<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Enquery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnqueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enqueries = Enquery::all();
        return Inertia::render('Enqueries/Index',['enqueries' => $enqueries]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string'],
        ])->validateWithBag('userEnqueryInformation');

        // dd($request->all());

        Enquery::create([
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'message' => $request['message'],
        ]);

        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquery  $enquery
     * @return \Illuminate\Http\Response
     */
    public function show(Enquery $enquery)
    {
        dd('Imefika hiyo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquery  $enquery
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquery $enquery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquery  $enquery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquery $enquery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquery  $enquery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquery $enquery)
    {
        //
    }
}
