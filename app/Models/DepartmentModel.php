<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'department_master';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'id',
                                    'dept_name',
                                    'description'];

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
        $builder = $this->db->table('department_master');
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
        $builder = $this->db->table('department_master dm');
        $builder->select(  'dm.id, 
                            dm.dept_name, 
                            dm.description, 
                            dm.transaction_use');
                            //dm.gas_id, 
                            // gm.gas_name
                // ->join('gas_master gm', 'gm.id = dm.gas_id');

        if($id != 0) {
            $builder->where('dm.id', $id);
            return $builder->get()->getResultArray();
        } else {
            return $builder->get()->getResultArray();
        }
    }
    
    public function getDataByTrans($transaction_use)
    {
        $builder = $this->db->table('department_master dm');
        $builder->select(  'dm.id, 
                            dm.dept_name, 
                            dm.description, 
                            dm.transaction_use');
                            //dm.gas_id, 
                            // gm.gas_name
                // ->join('gas_master gm', 'gm.id = dm.gas_id');

            $builder->where('dm.transaction_use', $transaction_use);
            return $builder->get()->getResultArray();
    }

    
}
