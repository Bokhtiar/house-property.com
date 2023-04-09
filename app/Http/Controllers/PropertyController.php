<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
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

    /* Show the form for creating a new resource.*/
    public function first_step()
    {
        try {
            $edit = session()->get('properties');
            return view('modules.property.first_step_createUpdate', compact('edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Store a newly created resource in storage first_step_one_store. */
    public function first_step_store(Request $request)
    {
        try {
            if (empty(session()->get('properties'))) {
                $properties = new Property();
                $properties->name = $request->name;
                $properties->total_unit = $request->total_unit;
                $properties->description = $request->description;
                $properties->image = $request->image;
                $properties->save();
                session()->put('properties', $properties);
            } else {
                $properties = session()->get('properties');
                session()->put('properties', $properties);
            }
            return redirect('property/second/step')->with('message', 'Property information saved.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Display the specified resource. */
    public function second_step()
    {
        try {
            $properties = session()->get('properties');
            return view('modules.property.second_step_createUpdate', compact('properties'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
