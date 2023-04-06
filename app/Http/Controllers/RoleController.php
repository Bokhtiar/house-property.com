<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleServices;

class RoleController extends Controller
{
    /* Display a listing of the resource. */
    public function index()
    {
        try {
            $roles = RoleServices::RoleList();
            return view('modules.role.index', compact('roles'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        try {
            RoleServices::RoleCreate($request->all());
            return back()->with('message','Data added Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* specific reosurce show */
    public function show($id)
    {
        try {
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Show the form for editing the specified resource. */
    public function edit($id)
    {
        try {
            $edit = RoleServices::RoleFindByID($id);
            $roles = RoleServices::RoleList();
            return view('modules.role.index', compact('edit', 'roles'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, $id)
    {
        try {
            RoleServices::RoleUpdate($request, $id);
            return redirect()->route('role.index')->with('info', 'Data updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        try {
            RoleServices::RoleFindByID($id)->delete();
            return redirect()->route('role.index')->with('error','Are you sure you want to delete? ');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
