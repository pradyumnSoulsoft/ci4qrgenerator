<?php

namespace App\Models;

use CodeIgniter\Model;

class GasModel extends Model
{
    protected $db;
    protected $DBGroup          = 'default';
    protected $table            = 'gas_master';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'id',
                                    'gas_name',
                                    'gas_formula',
                                    'status'];

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
    public function insert_data($data)
    {
        $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }

    public function update_data($id, $data)
    {
        $builder = $this->db->table('gas_master');
        $builder->where('id', $id);
        $builder->update($data);

        return true;
    }
    public function delete_data($id)
    {
        return $this->db->table($this->table)->delete(array(
            "id" => $id,
        ));
    }

    public function get_all_data($id)
    {
        $builder = $this->db->table('gas_master gm');
        $builder->select(  'gm.id, 
                            gm.gas_name, 
                            gm.gas_formula, 
                            gm.status');
        $builder->where('gm.status', 1);

        if($id != 0) {
            $builder->where('gm.id', $id);
            return $builder->get()->getResultArray();
        } else {
            return $builder->get()->getResultArray();
        }
    }
}
/*
id
gas_name
gas_formula
status
*/