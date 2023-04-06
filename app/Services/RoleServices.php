<?php 
namespace App\Services;

use App\Models\Role;

class RoleServices{
    public static function RoleList(){
        return Role::latest()->get();
    }

    /* store documents */
    public static function RoleStoreDocument($request, $id=null){
        return array(
            'name' => $request['name']
        );
    }

     /* store document create */
     public static function RoleCreate($request){
         return Role::create(RoleServices::RoleStoreDocument($request));
     }

    /* findByID */
    public static function RoleFindByID($id){
        return Role::find($id);
    }

    /* resource updated */
    public static function RoleUpdate($request, $id){
        $post = RoleServices::RoleFindByID($id);
        return $post->update(RoleServices::RoleStoreDocument($request));
    }
}
?>