<?php
namespace App\Services;

use App\Models\Permission;

class PermissionServices {

    /* display list of resource */
    public static function PermissionList()
    {
        return Permission::all();
    }
    
    /* new store document */
    public static function PermissionStore($request)
    {
        return Permission::create($request->all());
    }

    /* specific resoruce show */
    public static function PermissionFindById($id)
    {
        return Permission::find($id);
    }

    /* document update */
    public static function PermissionUpdate($request, $id)
    {
        $permission = Permission::find($id);
        return $permission->update($request->all());
    }
}

?>