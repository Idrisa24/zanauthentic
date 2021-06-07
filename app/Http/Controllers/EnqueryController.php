<?php

namespace App\Http\Controllers;

use App\Models\Enquery;
use Illuminate\Http\Request;

class EnqueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Enqueries/Index');
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquery  $enquery
     * @return \Illuminate\Http\Response
     */
    public function show(Enquery $enquery)
    {
        //
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
