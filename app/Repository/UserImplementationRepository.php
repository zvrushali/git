<?php

namespace App\Repository;

 use App\Repository;
 use App\User;

class UserImplementationRepository implements UserInterfaceRepository
{
   public function insert(array $post_data)
   {
     
     $user = new User();
     $user->fname = request('first_name');
     $user->lname = request('last_name');
     $user->email = request('email');
     $user->password = request('password');
     $user->save();

   }

   public function get($post_id){
   return User::find($post_id);
   }
    public function update($post_id, $post_data)
   {
   	 $device = User::find($post_id);
     $device->update([
    'first_name' => $post_data->input('first_name'),'last_name' => $post_data->input('last_name'),'email' => $post_data->input('email'),'gender'=>$post_data->input('gender'),'password'=>$post_data->input('password')
     ]);
   }

    public function delete($post_id)
   {
        $model = User::find($post_id);
        $model->delete();
   }

}

?>