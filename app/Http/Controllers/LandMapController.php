<?php

namespace App\Http\Controllers;

use App\LandMap;
use Illuminate\Http\Request;

class LandMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lands = LandMap::all();

//        dd($lands);

        return view('maps')->with(compact('lands'));

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
     * @param  \App\LandMap  $landMap
     * @return \Illuminate\Http\Response
     */
    public function show(LandMap $landMap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LandMap  $landMap
     * @return \Illuminate\Http\Response
     */
    public function edit(LandMap $landMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LandMap  $landMap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LandMap $landMap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LandMap  $landMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(LandMap $landMap)
    {
        //
    }
}
