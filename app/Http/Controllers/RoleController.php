<?php

namespace App\Http\Controllers;

use App\Models\Role;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
