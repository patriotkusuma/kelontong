<?php

namespace App\Models;

use CodeIgniter\Model;

class Products_model extends Model
{
    protected $table = 'products';

    public function getProducts($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['product_id' => $id])->getRowArray();
        }
    }

    public function getSpecified($id = false){
        if($id === false){
            return $this->db->table($this->table)
            ->join('categories','categories.category_id = products.category_id')
            ->get()->getResultArray();
        }
    }

    public function insertProducts($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function deleteCategory($id)
    {
        return $this->db->table($this->table)->delete(['category_id' => $id]);
    }

    public function updateCategory($data, $id)
    {
        $where = $this->db->table($this->table)->where('category_id', $id);

        if ($where) {
            return $where->update($data);
        }
    }
}
