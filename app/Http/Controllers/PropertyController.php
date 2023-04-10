<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

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
            session()->forget('property_id');
            session()->forget('property_first_step_value');
            session()->forget('property_second_step_value');
            session()->forget('property_third_step_value');
            session()->forget('property_fourth_step_value');
            return view('modules.property.first_step_createUpdate');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function first_step_prev()
    {
        try {
            $edit = session()->get('property_first_step_value');
            return view('modules.property.first_step_createUpdate', compact('edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Store a newly created resource in storage first_step_one_store. */
    public function first_step_store(Request $request)
    {
        try {
            if (empty(session()->get('property_first_step_value'))) {
                $properties = new Property();
                $properties->name = $request->name;
                $properties->total_unit = $request->total_unit;
                $properties->description = $request->description;
                $properties->image = $request->image;
                $properties->save();
                $property_id = $properties->property_id;
                session()->put('property_first_step_value', $properties);
                session()->put('property_id', $property_id);
            } else {
                $property_id = session()->get('property_id');
                $properties = Property::find($property_id);
                $properties->name = $request->name;
                $properties->total_unit = $request->total_unit;
                $properties->description = $request->description;
                $properties->image = $request->image;
                $properties->save();
                session()->put('property_first_step_value', $properties);
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
            $edit = session()->get('property_second_step_value');
            return view('modules.property.second_step_createUpdate', compact('edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Display the specified resource. */
    public function second_step_store(Request $request)
    {
        try {
            if (empty(session()->get('property_first_step_value'))) {
                $properties = new Property();
                $properties->country = $request->country;
                $properties->state = $request->state;
                $properties->city = $request->city;
                $properties->zip_code = $request->zip_code;
                $properties->address = $request->address;
                $properties->map_link = $request->map_link;
                $properties->save();
                session()->put('property_second_step_value', $properties);
            } else {
                $property_id = session()->get('property_id');
                $properties = Property::find($property_id);
                $properties->country = $request->country;
                $properties->state = $request->state;
                $properties->city = $request->city;
                $properties->zip_code = $request->zip_code;
                $properties->address = $request->address;
                $properties->map_link = $request->map_link;
                $properties->save();
                session()->put('property_second_step_value', $properties);
            }
            return redirect('property/third/step')->with('message', 'Property location saved.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function third_step()
    {
        try {
            $edit = session()->get('property_third_step_value');
            //dd($edit);
            $property_id = session()->get('property_id');
            $properties = Property::find($property_id);

            return view('modules.property.third_step_createUpdate', compact('edit', 'properties'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function third_step_store(Request $request)
    {
        try {
            if (empty(session()->get('property_second_step_value'))) {
                $properties = session()->get('property_first_step_value');
                $items = [];
                for ($i = 0; $i < $properties->total_unit; $i++) {
                    $unit = new Unit();
                    $unit->property_id = session()->get('property_id');
                    $unit->unit_name = $request->unit_name[$i];
                    $unit->bedroom = $request->bedroom[$i];
                    $unit->baths = $request->baths[$i];
                    $unit->kitchen = $request->kitchen[$i];
                    $unit->save();

                    $items[$i] = ([
                        'unit_id' => $unit->unit_id,
                        'property_id' => session()->get('property_id'),
                        'unit_name' => $request->unit_name[$i],
                        'bedroom' => $request->bedroom[$i],
                        'baths' => $request->baths[$i],
                        'kitchen' => $request->kitchen[$i],
                    ]);
                }
                session()->put('property_third_step_value', $items);
                return redirect('/property/third/step');
            } else {

                /* if third step session is empty then this condision work */
                if (empty(session()->get('property_third_step_value'))) {
                    $properties = session()->get('property_first_step_value');
                    $items = [];
                    for ($i = 0; $i < $properties->total_unit; $i++) {
                        $unit = new Unit();
                        $unit->property_id = session()->get('property_id');
                        $unit->unit_name = $request->unit_name[$i];
                        $unit->bedroom = $request->bedroom[$i];
                        $unit->baths = $request->baths[$i];
                        $unit->kitchen = $request->kitchen[$i];
                        $unit->save();

                        $items[$i] = ([
                            'unit_id' => $unit->unit_id,
                            'property_id' => session()->get('property_id'),
                            'unit_name' => $request->unit_name[$i],
                            'bedroom' => $request->bedroom[$i],
                            'baths' => $request->baths[$i],
                            'kitchen' => $request->kitchen[$i],
                        ]);
                    }
                    session()->put('property_third_step_value', $items);
                    return redirect('property/third/step')->with('message', 'Property unit saved.');
                } else {

                    $properties = session()->get('property_first_step_value');
                    $units = session()->get('property_third_step_value');

                    $items = [];
                    for ($i = 0; $i < $properties->total_unit; $i++) {
                        $unit = Unit::find($units[$i]['unit_id']);
                        $unit->property_id = session()->get('property_id');
                        $unit->unit_name = $request->unit_name[$i];
                        $unit->bedroom = $request->bedroom[$i];
                        $unit->baths = $request->baths[$i];
                        $unit->kitchen = $request->kitchen[$i];
                        $unit->save();

                        $items[$i] = ([
                            'unit_id' => $unit->unit_id,
                            'property_id' => session()->get('property_id'),
                            'unit_name' => $request->unit_name[$i],
                            'bedroom' => $request->bedroom[$i],
                            'baths' => $request->baths[$i],
                            'kitchen' => $request->kitchen[$i],
                        ]);
                    }
                    session()->put('property_third_step_value', $items);
                    return redirect('property/third/step')->with('message', 'Property unit saved.');
                }
            }
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
