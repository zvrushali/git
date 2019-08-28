<?php 

namespace App\Repository;
interface  UserInterfaceRepository{
	    public function insert(array $post_data);
	    public function get($post_id);
	  // public function all();
	  //  public function delete($post_id);
	   // public function update($post_id, array $post_data);
}
?>
