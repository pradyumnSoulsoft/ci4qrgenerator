<?php

namespace App\Models;

use CodeIgniter\Model;

class GasCylinderModel extends Model
{

    protected $db;
    protected $DBGroup          = 'default';
    protected $table            = 'gas_cylinder_master';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'id',
                                    'cylinder_no',
                                    'barcode',
                                    'manufacturer_name',
                                    'manufacturer_no',
                                    'cylinder_gas_filling_size',
                                    'cylinder_height',
                                    'gasId',
                                    'cylinder_status',
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
        $builder = $this->db->table('gas_cylinder_master');
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
    
    public function deleteGasId($id)
    {
        return $this->db->table($this->table)->delete(array(
            "gasId" => $id,
        ));
    }


    public function get_all_data($id)
    {
        $builder = $this->db->table('gas_cylinder_master cm');
        $builder->select(  'cm.id, 
                            cm.cylinder_no, 
                            cm.barcode, 
                            cm.manufacturer_name, 
                            cm.manufacturer_no, 
                            cm.cylinder_gas_filling_size, 
                            cm.cylinder_height, 
                            cm.gasId, 
                            gm.gas_name, 
                            cm.cylinder_status, 
                            dm.dept_name, 
                            cm.status')
                ->join('gas_master gm', 'gm.id = cm.gasId')
                ->join('department_master dm', 'dm.id = cm.cylinder_status');

        if($id != 0) {
            $builder->where('cm.id', $id);
            return $builder->get()->getResultArray();
        } else {
            $builder->orderBy('cm.id', 'DESC');
            return $builder->get()->getResultArray();
        }
    }

    public function getActivedata($id)
    {
        $builder = $this->db->table('gas_cylinder_master cm');
        $builder->select(  'cm.id, 
                            cm.cylinder_no, 
                            cm.barcode, 
                            cm.manufacturer_name, 
                            cm.manufacturer_no, 
                            cm.cylinder_gas_filling_size, 
                            cm.cylinder_height, 
                            cm.gasId, 
                            gm.gas_name, 
                            cm.cylinder_status, 
                            cm.status')
                ->join('gas_master gm', 'gm.id = cm.gasId')
                ->where('cm.status', 1);

        if($id != 0) {
            $builder->where('cm.id', $id);
            return $builder->get()->getResultArray();
        } else {
            $builder->orderBy('cm.id', 'DESC');
            return $builder->get()->getResultArray();
        }
    }
}
