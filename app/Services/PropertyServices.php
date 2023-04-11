<?php
namespace App\Services;

use App\Models\Property;

class PropertyServices {

    /* display list of resource */
    public static function propertyList()
    {
        return Property::latest()->get();
    }
    

    /* specific resoruce show */
    public static function propertyFindById($id)
    {
        return Property::find($id);
    }

}

?>