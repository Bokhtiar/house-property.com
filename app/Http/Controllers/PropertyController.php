<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Unit;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\PropertyServices;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;


class PropertyController extends Controller
{
    /* Display a listing of the resource. */
    public function index()
    {
        try {
            $properties = PropertyServices::propertyList();
            return view('modules.property.index', compact('properties'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function sessionClear()
    {
        session()->forget('property_id');
        session()->forget('property_first_step_value');
        session()->forget('property_second_step_value');
        session()->forget('property_third_step_value');
        session()->forget('property_fourth_step_value');
    }

    public function create()
    {
        try {
            $this->sessionClear();
            return view('modules.property.first_step_createUpdate');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Show the form for creating a new resource.*/
    public function first_step()
    {
        try {
            $this->sessionClear();
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

                /* image */
                $image = Image::make($request->file('image'));
                $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                $destinationPath = public_path('images/');
                $image->save($destinationPath . $imageName);
                $properties->image = $imageName;

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


                if ($request->hasFile('image')) {
                    /* image */
                    $image = Image::make($request->file('image'));
                    $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                    $destinationPath = public_path('images/');
                    $image->save($destinationPath . $imageName);
                    $properties->image = $imageName;
                } else {
                    $properties->image = $properties->image;
                }



                $properties->save();
                session()->put('property_first_step_value', $properties);
            }
            return redirect('property/second/step')->with('message', 'Property information saved.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    /* update a resource in storage first_step_one_update. */
    public function first_step_update(Request $request, $id)
    {
        try {
            if (empty(session()->get('property_first_step_value'))) {

                $properties = Property::find($id);
                $properties->name = $request->name;
                $properties->total_unit = $request->total_unit;
                $properties->description = $request->description;

                if ($request->hasFile('image')) {
                    /* image */
                    $image = Image::make($request->file('image'));
                    $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                    $destinationPath = public_path('images/');
                    $image->save($destinationPath . $imageName);
                    $properties->image = $imageName;
                } else {
                    $properties->image = $properties->image;
                }


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


                if ($request->hasFile('image')) {
                    /* image */
                    $image = Image::make($request->file('image'));
                    $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                    $destinationPath = public_path('images/');
                    $image->save($destinationPath . $imageName);
                    $properties->image = $imageName;
                } else {
                    $properties->image = $properties->image;
                }

                $properties->save();
                session()->put('property_first_step_value', $properties);
            }
            return Redirect::to('property/second/step/edit/' . $id);
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




    /* update Display the specified resource. */
    public function second_step_edit($id)
    {
        try {

            $update = Property::find($id);

            $edit = session()->get('property_second_step_value');
            return view('modules.property.second_step_createUpdate', compact('edit', 'update'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Display the specified resource. */
    public function second_step_update(Request $request, $id)
    {
        try {
            if (empty(session()->get('property_first_step_value'))) {
                $properties = Property::find($id);
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
            return redirect('property/third/step/edit/' . $id)->with('message', 'Property location saved.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //  store new document for third step
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
                return redirect('property/fourth/step')->with('message', 'Property unit saved.');
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
                return redirect('property/fourth/step')->with('message', 'Property unit saved.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    //  store new document for third step
    public function third_step_edit($id)
    {
        try {
            $update = Unit::where('property_id', $id)->get();
            
            $edit = session()->get('property_third_step_value');
            
            
            $property_id = session()->get('property_id');
            
            $properties = Property::find($property_id);
            
    
            return view('modules.property.third_step_createUpdate', compact('edit', 'properties', 'update'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function third_step_update(Request $request, $id)
    {
        try {

            /* if third step session is empty then this condision work */
            if (empty(session()->get('property_third_step_value'))) {
                $properties = session()->get('property_first_step_value');
                $units = Unit::where('property_id', $id)->get();
                
                $items = [];
                for ($i = 0; $i < $properties->total_unit; $i++) {
                    $unit = Unit::find($units[$i]['unit_id']);;
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
                return redirect('property/fourth/step/edit/'.$id)->with('message', 'Property unit saved.');
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
                return redirect('property/fourth/step/edit/'.$id)->with('message', 'Property unit saved.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* step 4 creat  */
    public function fourth_step()
    {
        try {
            $units = session()->get('property_third_step_value');
            $edit = session()->get('property_fourth_step_value');
            return view('modules.property.fourth_step_createUpdate', compact('units', 'edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function fourth_step_store(Request $request)
    {
        //dd($request->all());
        try {
            /* if third step session is empty then this condision work */
            if (empty(session()->get('property_fourth_step_value'))) {

                $properties = session()->get('property_first_step_value');

                $unit_id = $request->unit_id;

                $items = [];
                for ($i = 0; $i < $properties->total_unit; $i++) {
                    $unit = Unit::find($unit_id[$i]);

                    $unit->general_rent = $request->general_rent[$i];
                    $unit->security_deposit = $request->security_deposit[$i];
                    $unit->late_fee = $request->late_fee[$i];
                    $unit->incident_receipt = $request->incident_receipt[$i];
                    $unit->rent_type = $request->rent_type[$i];
                    $unit->save();



                    $items[$i] = ([
                        'unit_id' => $unit->unit_id,
                        'general_rent' => $request->general_rent[$i],
                        'security_deposit' => $request->security_deposit[$i],
                        'late_fee' => $request->late_fee[$i],
                        'incident_receipt' => $request->incident_receipt[$i],
                        'rent_type' => $request->rent_type[$i],
                    ]);
                }

                session()->put('property_fourth_step_value', $items);
                return redirect()->route('property.index')->with('message', 'Property rent && charge saved.');
            } else {

                $properties = session()->get('property_first_step_value');
                $unit_id = $request->unit_id;

                $items = [];
                for ($i = 0; $i < $properties->total_unit; $i++) {
                    $unit = Unit::find($unit_id[$i]);
                    $unit->general_rent = $request->general_rent[$i];
                    $unit->security_deposit = $request->security_deposit[$i];
                    $unit->late_fee = $request->late_fee[$i];
                    $unit->incident_receipt = $request->incident_receipt[$i];
                    $unit->rent_type = $request->rent_type[$i];
                    $unit->save();

                    $items[$i] = ([
                        'unit_id' => $unit->unit_id,
                        'general_rent' => $request->general_rent[$i],
                        'security_deposit' => $request->security_deposit[$i],
                        'late_fee' => $request->late_fee[$i],
                        'incident_receipt' => $request->incident_receipt[$i],
                        'rent_type' => $request->rent_type[$i],
                    ]);
                }
                session()->put('property_fourth_step_value', $items);
                return redirect()->route('property.index')->with('message', 'Property rent && charge saved.');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    /* step 4 update */
    public function fourth_step_edit($id)
        
    {
        try {
            $property_id = $id;
            $update = Unit::where('property_id',$id)->get();
            $units = session()->get('property_third_step_value');
            $edit = session()->get('property_fourth_step_value');
            return view('modules.property.fourth_step_createUpdate', compact('units', 'edit', 'update', 'property_id'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function fourth_step_update(Request $request)
    {
        
        try {
            /* if third step session is empty then this condision work */
            if (empty(session()->get('property_fourth_step_value'))) {

                $properties = session()->get('property_first_step_value');

                $unit_id = $request->unit_id;

                $items = [];
                for ($i = 0; $i < $properties->total_unit; $i++) {
                    $unit = Unit::find($unit_id[$i]);

                    $unit->general_rent = $request->general_rent[$i];
                    $unit->security_deposit = $request->security_deposit[$i];
                    $unit->late_fee = $request->late_fee[$i];
                    $unit->incident_receipt = $request->incident_receipt[$i];
                    $unit->rent_type = $request->rent_type[$i];
                    $unit->save();



                    $items[$i] = ([
                        'unit_id' => $unit->unit_id,
                        'general_rent' => $request->general_rent[$i],
                        'security_deposit' => $request->security_deposit[$i],
                        'late_fee' => $request->late_fee[$i],
                        'incident_receipt' => $request->incident_receipt[$i],
                        'rent_type' => $request->rent_type[$i],
                    ]);
                }

                session()->put('property_fourth_step_value', $items);
                return redirect()->route('property.index')->with('message', 'Property rent && charge saved.');
            } else {

                $properties = session()->get('property_first_step_value');
                $unit_id = $request->unit_id;

                $items = [];
                for ($i = 0; $i < $properties->total_unit; $i++) {
                    $unit = Unit::find($unit_id[$i]);
                    $unit->general_rent = $request->general_rent[$i];
                    $unit->security_deposit = $request->security_deposit[$i];
                    $unit->late_fee = $request->late_fee[$i];
                    $unit->incident_receipt = $request->incident_receipt[$i];
                    $unit->rent_type = $request->rent_type[$i];
                    $unit->save();

                    $items[$i] = ([
                        'unit_id' => $unit->unit_id,
                        'general_rent' => $request->general_rent[$i],
                        'security_deposit' => $request->security_deposit[$i],
                        'late_fee' => $request->late_fee[$i],
                        'incident_receipt' => $request->incident_receipt[$i],
                        'rent_type' => $request->rent_type[$i],
                    ]);
                }
                session()->put('property_fourth_step_value', $items);
                return redirect()->route('property.index')->with('message', 'Property rent && charge saved.');
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
    public function show($id)
    {
        try {
            $show  = PropertyServices::propertyFindById($id);
            $units = Unit::where('property_id', $id)->get();
            return view('modules.property.show', compact('show', 'units'));
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
    public function edit($id)
    {
        try {
            $this->sessionClear();
            $update = PropertyServices::propertyFindById($id);
            return view('modules.property.first_step_createUpdate', compact('update'));
        } catch (\Throwable $th) {
            throw $th;
        }
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
    public function destroy($id)
    {
        try {
            PropertyServices::propertyFindById($id)->delete();
            return redirect()->route('property.index')->with('info', 'Property deleted.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
