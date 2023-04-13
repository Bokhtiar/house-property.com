<?php
namespace App\Services;

use App\Models\Tenant;

class TenantServices {

    /* display list of resource */
    public static function TenantList()
    {
        return Tenant::all();
    }


    /* specific resoruce show */
    public static function TenantFindById($id)
    {
        return Tenant::find($id);
    }

}

?>