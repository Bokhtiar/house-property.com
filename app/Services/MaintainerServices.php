<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MaintainerServices {

    /* display list of resource */
    public static function MaintainerList()
    {
        return User::where('role_id',5)->get(['id', 'name', 'email', 'phone', 'profile_photo_path']);
    }

    /* create update  */
    public static function CreateUpdate($request, $id = null){
        return array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'property_id' => $request->property_id
        );
    }

    /* create new reosurce */
    public static function MaintainerStore($request){
        return User::create(MaintainerServices::CreateUpdate($request));
    }
 
}
