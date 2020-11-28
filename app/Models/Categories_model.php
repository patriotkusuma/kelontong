<?php namespace App\Models;
use CodeIgniter\Model;

class Categories_model extends Model{
    protected $table = 'categories';

    public function getCategories($id == false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['category_id' => $id]);
        }
    }
}
?>