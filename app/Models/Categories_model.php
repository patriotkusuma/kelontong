<?php

namespace App\Models;

use CodeIgniter\Model;

class Categories_model extends Model
{
    protected $table = 'categories';

    public function getCategories($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['category_id' => $id])->getRowArray();
        }
    }

    public function insertCategory($data)
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
