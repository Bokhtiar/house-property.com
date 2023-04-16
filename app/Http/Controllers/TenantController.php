<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use App\Services\TenantServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tenants = TenantServices::TenantList();
            return view('modules.tenant.index', compact('tenants'));
        } catch (\Throwable $th) {
            //throw $th;
        }
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

    /* Show the form for creating a new resource. */
    public function first_step()
    {
        try {
            session()->forget('tenant_id');
            session()->forget('tenant_first_step_value');
            session()->forget('tenant_second_step_value');
            session()->forget('tenant_third_step_value');

            return view('modules.tenant.first_step_createUpdate');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function first_step_prev()
    {
        try {
            $edit = session()->get('tenant_first_step_value');
            return view('modules.tenant.first_step_createUpdate', compact('edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /* Show the form for creating a new resource first step store. */
    public function first_step_store(Request $request)
    {
        try {
            if (empty(session()->get('tenant_first_step_value'))) {
                $tenant = new Tenant;
                $tenant->first_name = $request->first_name;
                $tenant->last_name = $request->last_name;
                $tenant->contact_number = $request->contact_number;
                $tenant->job = $request->job;
                $tenant->age = $request->age;
                $tenant->familly_member = $request->familly_member;
                $tenant->email = $request->email;
                $tenant->password = $request->password;

                $tenant->p_address = $request->p_address;
                $tenant->p_country = $request->p_country;
                $tenant->p_state = $request->p_state;
                $tenant->p_city = $request->p_city;
                $tenant->p_zip_code = $request->p_zip_code;

                $tenant->present_address = $request->present_address;
                $tenant->present_country = $request->present_country;
                $tenant->present_state = $request->present_state;
                $tenant->present_city = $request->present_city;
                $tenant->present_zip_code = $request->present_zip_code;
                $tenant->save();
                session()->put('tenant_first_step_value', $tenant);
                session()->put('tenant_id', $tenant->tenant_id);
                return redirect('tenant/second/step')->with('success', 'Tenant information saved');
            } else {
                $tenant_id = session()->get('tenant_id');
                $tenant = Tenant::find($tenant_id);
                $tenant->first_name = $request->first_name;
                $tenant->last_name = $request->last_name;
                $tenant->contact_number = $request->contact_number;
                $tenant->job = $request->job;
                $tenant->age = $request->age;
                $tenant->familly_member = $request->familly_member;
                $tenant->email = $request->email;
                $tenant->password = $request->password;

                $tenant->p_address = $request->p_address;
                $tenant->p_country = $request->p_country;
                $tenant->p_state = $request->p_state;
                $tenant->p_city = $request->p_city;
                $tenant->p_zip_code = $request->p_zip_code;

                $tenant->present_address = $request->present_address;
                $tenant->present_country = $request->present_country;
                $tenant->present_state = $request->present_state;
                $tenant->present_city = $request->present_city;
                $tenant->present_zip_code = $request->present_zip_code;
                $tenant->save();
                session()->put('tenant_first_step_value', $tenant);
                session()->put('tenant_id', $tenant->tenant_id);
                return redirect('tenant/second/step')->with('success', 'Tenant information saved');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function second_step()
    {
        try {
            $edit = session()->get('tenant_second_step_value');
            $properties = Property::all();
            $units = Unit::all();
            return view('modules.tenant.second_step_createUpdate', compact('properties', 'units', 'edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function second_step_store(Request $request)
    {
        try {
            if (empty(session()->get('tenant_second_step_value'))) {
                $tenant_id = session()->get('tenant_id');
                $tenant = Tenant::find($tenant_id);
                $tenant->property_id = $request->property_id;
                $tenant->unit_id = $request->unit_id;
                $tenant->lease_start_date = $request->lease_start_date;
                $tenant->lease_end_date = $request->lease_end_date;
                $tenant->general_rent = $request->general_rent;
                $tenant->security_deposit = $request->security_deposit;
                $tenant->late_fee = $request->late_fee;
                $tenant->incident_recipt = $request->incident_recipt;
                $tenant->payment_due_on_date = $request->payment_due_on_date;
                $tenant->save();
                session()->put('tenant_second_step_value', $tenant);
                session()->put('tenant_id', $tenant_id);
                return redirect('tenant/third/step')->with('success', 'Tenant information saved');
            } else {
                $tenant_id = session()->get('tenant_id');
                $tenant = Tenant::find($tenant_id);
                $tenant->property_id = $request->property_id;
                $tenant->unit_id = $request->unit_id;
                $tenant->lease_start_date = $request->lease_start_date;
                $tenant->lease_end_date = $request->lease_end_date;
                $tenant->general_rent = $request->general_rent;
                $tenant->security_deposit = $request->security_deposit;
                $tenant->late_fee = $request->late_fee;
                $tenant->incident_recipt = $request->incident_recipt;
                $tenant->payment_due_on_date = $request->payment_due_on_date;
                $tenant->save();
                session()->put('tenant_second_step_value', $tenant);
                session()->put('tenant_id', $tenant_id);
                return redirect('tenant/third/step')->with('success', 'Tenant information saved');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function third_step()
    {
        try {
            return view('modules.tenant.third_step_createUpdate');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function third_step_store(Request $request)
    {
        try {
            if (empty(session()->get('tenant_third_step_value'))) {
                $tenant_id = session()->get('tenant_id');
                $tenant = Tenant::find($tenant_id);

                // /*tenant image */
                $image = Image::make($request->file('image'));
                $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                $destinationPath = public_path('images/');
                $image->save($destinationPath . $imageName);
                $tenant->image = $imageName;

                // document pdf
                $image = $request->file('document');
                if ($image) {
                    $image_name = Str::random(20);
                    $ext = strtolower($image->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $upload_path = 'document/';
                    $document_url = $upload_path . $image_full_name;
                    $success = $image->move($upload_path, $image_full_name);
                    if ($success) {
                        $tenant['document'] = $document_url;
                    }
                }

                $tenant->save();
                session()->put('tenant_third_step_value', $tenant);
                session()->put('tenant_id', $tenant_id);
                return redirect()->route('tenant.index')->with('success', 'Tenant information saved');
            } else {
                $tenant_id = session()->get('tenant_id');
                $tenant = Tenant::find($tenant_id);

                // /*tenant image */
                $image = Image::make($request->file('image'));
                $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                $destinationPath = public_path('images/');
                $image->save($destinationPath . $imageName);
                $tenant->image = $imageName;

                // document pdf

                $image = $request->file('document');
                if ($image) {
                    $image_name = Str::random(20);
                    $ext = strtolower($image->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $upload_path = 'document/';
                    $document_url = $upload_path . $image_full_name;
                    $success = $image->move($upload_path, $image_full_name);
                    if ($success) {
                        $tenant['document'] = $document_url;
                    }
                }

                $tenant->save();
                session()->put('tenant_second_step_value', $tenant);
                session()->put('tenant_id', $tenant_id);
                return redirect()->route('tenant.index')->with('success', 'Tenant information saved');
            }
        } catch (\Throwable $th) {
            throw $th;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    public function first_step_edit($id)
    {
        try {
            session()->forget('tenant_id');
            session()->forget('tenant_first_step_value');
            session()->forget('tenant_second_step_value');
            session()->forget('tenant_third_step_value');

            $update = Tenant::find($id);
            return view('modules.tenant.first_step_createUpdate', compact('update'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function first_step_update(Request $request, $id)
    {
        try {
            
                $tenant = Tenant::find($id);
                $tenant->first_name = $request->first_name;
                $tenant->last_name = $request->last_name;
                $tenant->contact_number = $request->contact_number;
                $tenant->job = $request->job;
                $tenant->age = $request->age;
                $tenant->familly_member = $request->familly_member;
                $tenant->email = $request->email;
                $tenant->password = $request->password;

                $tenant->p_address = $request->p_address;
                $tenant->p_country = $request->p_country;
                $tenant->p_state = $request->p_state;
                $tenant->p_city = $request->p_city;
                $tenant->p_zip_code = $request->p_zip_code;

                $tenant->present_address = $request->present_address;
                $tenant->present_country = $request->present_country;
                $tenant->present_state = $request->present_state;
                $tenant->present_city = $request->present_city;
                $tenant->present_zip_code = $request->present_zip_code;
                $tenant->save();
                session()->put('tenant_first_step_value', $tenant);
                session()->put('tenant_id', $tenant->tenant_id);
                return redirect('tenant/second/step/edit/' . $id)->with('success', 'Tenant information saved');
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function second_step_edit(Request $request, $id)
    {
        try {
            $update = Tenant::find($id); //after changing select fild
            $properties = Property::get(['property_id', 'name']);
            $units = Unit::get(['unit_id', 'unit_name']);
            return view('modules.tenant.second_step_createUpdate', compact('properties', 'units', 'update'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function second_step_update(Request $request, $id)
    {
        try {
            $tenant = Tenant::find($id);
            $tenant->property_id = $request->property_id;
            $tenant->unit_id = $request->unit_id;
            $tenant->lease_start_date = $request->lease_start_date;
            $tenant->lease_end_date = $request->lease_end_date;
            $tenant->general_rent = $request->general_rent;
            $tenant->security_deposit = $request->security_deposit;
            $tenant->late_fee = $request->late_fee;
            $tenant->incident_recipt = $request->incident_recipt;
            $tenant->payment_due_on_date = $request->payment_due_on_date;
            $tenant->save();
            session()->put('tenant_second_step_value', $tenant);
            session()->put('tenant_id', $id);
            return redirect('tenant/third/step/edit/'.$id)->with('success', 'Tenant information saved');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function third_step_edit(Request $request, $id)
    {
        try {
            $update = Tenant::find($id); //after changing select fild
            return view('modules.tenant.third_step_createUpdate', compact('update'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function third_step_update(Request $request, $id)
    {
        try {
            $tenant = Tenant::find($id);
           

            // /*tenant image */
            if($request->image){
                $image = Image::make($request->file('image'));
                $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                $destinationPath = public_path('images/');
                $image->save($destinationPath . $imageName);
                $tenant->image = $imageName;
            }else{
                $tenant->image = $tenant->image;
            }
            

            // document pdf
            if($request->document){
                $image = $request->file('document');
                if ($image) {
                    $image_name = Str::random(20);
                    $ext = strtolower($image->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $upload_path = 'document/';
                    $document_url = $upload_path . $image_full_name;
                    $success = $image->move($upload_path, $image_full_name);
                    if ($success) {
                        $tenant['document'] = $document_url;
                    }
                }
            }else{
                $tenant->document = $tenant->document;
            }
            

            $tenant->save();
            session()->put('tenant_third_step_value', $tenant);
            session()->put('tenant_id', $id);
            return redirect()->route('tenant.index')->with('success', 'Tenant information saved');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
