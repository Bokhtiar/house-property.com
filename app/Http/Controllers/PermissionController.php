<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Services\PermissionServices;
use App\Services\RoleServices;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /* Display a listing of the resource. */
    public function index()
    {
        try {
            $permissions =  PermissionServices::PermissionList();
            return view('modules.permission.index', compact('permissions'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        try {
            $roles = RoleServices::RoleList();
            return view('modules.permission.create', compact('roles'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Store a newly created resource in storage. */
    public function store(Request $request)
    {
        try {
            PermissionServices::PermissionStore($request);
            return redirect()->route('permission.index')->with('message','Data added Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* specific reosurce show */
    public function show($id)
    {
        try {
            $permission = PermissionServices::PermissionFindById($id);
            $roles = RoleServices::RoleList();
            return view('modules.permission.edit', compact('permission', 'roles'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Show the form for editing the specified resource. */
    public function edit($id)
    {
        try {
            $permission = PermissionServices::PermissionFindById($id);
            $roles = RoleServices::RoleList();
            return view('modules.permission.edit', compact('permission', 'roles'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, $id)
    {
        try {
            PermissionServices::PermissionUpdate($request, $id);
            return redirect()->route('permission.index')->with('info', "Permission updated." );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        try {
            PermissionServices::PermissionFindById($id)->delete();
            return redirect()->back()->with('error', 'Permission deleted.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
