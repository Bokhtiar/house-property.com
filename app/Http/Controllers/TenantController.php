<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Illuminate\Http\Request;

class TenantController extends Controller
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
        //
    }

    /* Show the form for creating a new resource. */
    public function first_step()
    {
        try {
            return view('modules.tenant.first_step_createUpdate');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // $tenant->property_id = $request->property_id;
    // $tenant->unit_id = $request->unit_id;
    // $tenant->lease_start_date = $request->lease_start_date;
    // $tenant->lease_end_date = $request->lease_end_date;
    // $tenant->general_rent = $request->general_rent;
    // $tenant->security_deposit = $request->security_deposit;
    // $tenant->late_fee = $request->late_fee;
    // $tenant->incident_recipt = $request->incident_recipt;
    // $tenant->payment_due_on_date = $request->payment_due_on_date;
    // $tenant->document = $request->document;

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
            $properties = Property::all();
            $units = Unit::all();
            return view('modules.tenant.second_step_createUpdate', compact('properties','units'));
            
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
