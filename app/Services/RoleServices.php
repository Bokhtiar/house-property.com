<?php 
namespace App\Services;

use App\Models\User;

class RoleServices{
    public static function RoleList(){
        return User::all();
    }

    // /* store documents */
    // public static function PostStoreDocument($request, $id=null){
    //     return array(
    //         'title' => $request->title,
    //         'short_des' => $request->short_des,
    //         'des' => $request->des,
    //     );
    // }

    // /* store document create */
    // public static function PostCreate($request){
    //     return Post::create(PostService::PostStoreDocument($request));
    // }

    // /* findByID */
    // public static function PostFindByID($id){
    //     return Post::find($id);
    // }

    // /* resource updated */
    // public static function PostUpdate($request, $id){
    //     $post = PostService::PostFindByID($id);
    //     return $post->update(PostService::PostStoreDocument($request));
    // }
}
?>