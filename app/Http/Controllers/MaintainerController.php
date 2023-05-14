<?php

namespace App\Http\Controllers;

use App\Models\maintainer;
use App\Services\MaintainerServices;
use App\Services\PropertyServices;
use Illuminate\Http\Request;

class MaintainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $properties =  PropertyServices::propertyList();
            return view('modules.maintainers.createUpdate', compact('properties'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            MaintainerServices::MaintainerStore($request);
            dd('ok');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\maintainer  $maintainer
     * @return \Illuminate\Http\Response
     */
    public function show(maintainer $maintainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\maintainer  $maintainer
     * @return \Illuminate\Http\Response
     */
    public function edit(maintainer $maintainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\maintainer  $maintainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, maintainer $maintainer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maintainer  $maintainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(maintainer $maintainer)
    {
        //
    }
}
