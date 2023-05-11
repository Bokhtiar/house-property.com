<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $bills = Bill::all();
            return view('modules.bill.index', compact('bills'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $properties = Property::all();
            $units = Unit::all();
            return view('modules.bill.createUpdate', compact('properties', 'units'));
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
    public function store(BillRequest $request)
    {
        try {
            Bill::create([
                'property_id' => $request->property_id,
                'unit_id' => $request->unit_id,
                'bill_pay_date' => $request->bill_pay_date,
                'create_at' => Auth::id(),
                'notes' => $request->note,
            ]);
            return redirect()->route('bill.index')->with('success', 'bill created');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $show = Bill::find($id);
            $tenant_id = Unit::where('property_id', $show->property_id)->where('unit_id', $show->unit_id)->first(['tenant_id']);
            $tenant = Tenant::find($tenant_id->tenant_id);
            return view('modules.bill.show', compact('show', 'tenant'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $edit = Bill::find($id);
            $properties = Property::all();
            $units = Unit::all();
            return view('modules.bill.createUpdate', compact('properties', 'units', 'edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(BillRequest $request,$id)
    {
        try {
            $bill = Bill::find($id);
            $bill->update([
                'property_id' => $request->property_id,
                'unit_id' => $request->unit_id,
                'bill_pay_date' => $request->bill_pay_date,
                'create_at' => Auth::id(),
                'notes' => $request->note,
            ]);
            return redirect()->route('bill.index')->with('success', 'bill updated');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Bill::find($id)->delete();
            return redirect()->route('bill.index')->with('info', 'bill deleted');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
