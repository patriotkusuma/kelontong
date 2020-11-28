<?php namespace App\Models;
use CodeIgniter\Model;

class Users_model extends Model{
    protected $table = 'users';

    public function getCategories($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['user_id' => $id]);
        }
    }
}
?>