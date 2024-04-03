<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table            = 'stocks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'id',
                                    'cylinder_id',
                                    'barcode',
                                    'qr_code',
                                    'qty',
                                    'date',
                                    'stock_type',
                                    'stock_location'
                                ];

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
        $builder = $this->db->table('stocks');
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
    public function dltDataByCylinderId($id)
    {
        return $this->db->table($this->table)->delete(array(
            "cylinder_id" => $id,
        ));
    }
    
    public function get_all_data($id)
    {
        $builder = $this->db->table('stocks sm');
        $builder->select(  'sm.id, 
                            sm.cylinder_id, 
                            cm.barcode, 
                            cm.manufacturer_name, 
                            cm.cylinder_gas_filling_size, 
                            cm.cylinder_height, 
                            cm.gasId, 
                            sm.qty, 
                            sm.date, 
                            sm.gas_id, 
                            gm.gas_name, 
                            sm.stock_type, 
                            stm.stock_type_master, 
                            sm.stock_location,
                            dm.dept_name')
                ->join('department_master dm', 'dm.id = sm.stock_location')
                ->join('stock_type_master stm', 'stm.id = sm.stock_type')
                ->join('gas_cylinder_master cm', 'cm.id = sm.cylinder_id')
                ->join('gas_master gm', 'gm.id = sm.gas_id');

        if($id != 0) {
            $builder->where('sm.id', $id);
            return $builder->get()->getResultArray();
        } else {
            $builder->orderBy('sm.id', 'DESC');
            return $builder->get()->getResultArray();
        }
    }
    
    public function getStockData($barcode, $transaction_use)
    {
        $builder = $this->db->table('stocks sm');
        $builder->select(  'sm.id, 
                            sm.cylinder_id, 
                            cm.barcode, 
                            cm.manufacturer_name, 
                            cm.cylinder_gas_filling_size, 
                            cm.cylinder_height, 
                            cm.gasId, 
                            sm.barcode, 
                            sm.qty, 
                            sm.date, 
                            sm.gas_id, 
                            gm.gas_name, 
                            sm.stock_type, 
                            stm.stock_type_master, 
                            sm.stock_location,
                            dm.transaction_use,
                            dm.dept_name')
                ->join('department_master dm', 'dm.id = sm.stock_location')
                ->join('stock_type_master stm', 'stm.id = sm.stock_type')
                ->join('gas_cylinder_master cm', 'cm.id = sm.cylinder_id')
                ->join('gas_master gm', 'gm.id = sm.gas_id');

        $builder->where('sm.barcode', $barcode);
        $builder->where('dm.transaction_use', $transaction_use);
        // $builder->orderBy('sm.id', 'DESC');
        return $builder->get()->getResultArray();
        
    }
    public function getStockByTran($transaction_use)
    {
        $builder = $this->db->table('stocks sm');
        $builder->select(  'sm.id, 
                            sm.cylinder_id, 
                            cm.barcode, 
                            cm.manufacturer_name, 
                            cm.cylinder_gas_filling_size, 
                            cm.cylinder_height, 
                            cm.gasId, 
                            sm.barcode, 
                            sm.qty, 
                            sm.date, 
                            sm.gas_id, 
                            gm.gas_name, 
                            sm.stock_type, 
                            stm.stock_type_master, 
                            sm.stock_location,
                            dm.transaction_use,
                            dm.dept_name')
                ->join('department_master dm', 'dm.id = sm.stock_location')
                ->join('stock_type_master stm', 'stm.id = sm.stock_type')
                ->join('gas_cylinder_master cm', 'cm.id = sm.cylinder_id')
                ->join('gas_master gm', 'gm.id = sm.gas_id');

        // $builder->where('sm.barcode', $transaction_use);
        $builder->where('dm.transaction_use', $transaction_use);
        // $builder->orderBy('sm.id', 'DESC');
        return $builder->get()->getResultArray();
        
    }

    public function getActivedata($id)
    {
        $builder = $this->db->table('stocks sm');
        $builder->select(  'sm.id, 
                            sm.cylinder_id, 
                            cm.barcode, 
                            cm.qr_code, 
                            sm.qty, 
                            sm.stock_type, 
                            sm.stock_location')
                ->join('gas_master gm', 'gm.id = sm.stock_location')
                ->join('gas_cylinder_master cm', 'cm.id = sm.cylinder_id');

        if($id != 0) {
            $builder->where('sm.id', $id);
            return $builder->get()->getResultArray();
        } else {
            $builder->orderBy('sm.id', 'DESC');
            return $builder->get()->getResultArray();
        }
    }
}
