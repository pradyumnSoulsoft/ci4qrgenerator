<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $db;
    protected $DBGroup          = 'default';
    protected $table            = 'activity_master';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tab_id','icon_id','activity_title','url','is_active'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        // OR $this->db = db_connect();
    }
    
        public function delete_data($id)
    {
        return $this->db->table($this->table)->delete(array(
            "id" => $id,
        ));
    }

    public function find_activity($id) {
        $builder = $this->db->table('activity_master');
        $builder->select('*');
        $builder->where('id', $id);
        $result = $builder->get()->getRowArray();
    
        return empty($result);
    }

    public function update_activity($id, $data)
    {
        $builder = $this->db->table('activity_master');
        $builder->where('id', $id);
        $builder->update($data);

        return true;
    }

    
    public function get_all_data($id)
    {
        $builder = $this->db->table('activity_master am');
        $builder->select('am.id, am.tab_id, am.icon_id,tm.tab_name , am.activity_title,am.url,im.icon, am.is_active');
        $builder->join('tab_master tm', 'tm.id=am.tab_id');
        $builder->join('icon_master im', 'im.id=am.icon_id');

        if ($id != 0) {
            $builder->where('am.id', $id);
            return $builder->get()->getRowArray();
        } else {
            return $builder->get()->getResultArray();
        }
    }

}
