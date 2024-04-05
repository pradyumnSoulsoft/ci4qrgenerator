<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\StockModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class StockController extends BaseController
{
    private $stkModel;
    private $cylinderModel;
    use ResponseTrait;
    public function __construct()
    {
        
        $this->stkModel = model('StockModel', true);
        $this->cylinderModel = model('GasCylinderModel', true);
    }

    public function getStock($id = 0)
    {
        // if($id != 0){
        //     $data = $this->stkModel->find($id);

        // }else{
        //     $data = $this->stkModel->findAll();
        
        // }
        
        $data = $this->stkModel->get_all_data($id);

        if (!empty($data)) {
            $response = [
                'status' => 200,
                'msg' => 'All Data Fetch successfully!',
                'data' => $data
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 404,
                'msg' => 'Data not Found!'
            ];
            return $this->response->setJSON($response);
        }

    }
    public function getStockByBarcode()
    {
        $barcode = $this->request->getPost('barcode');
        $transaction_use = $this->request->getPost('transaction_use');
        
        $data = $this->stkModel->getStockData($barcode, $transaction_use);

        // if($transaction_use == 'emp'){
        //     $data = $this->stkModel->getStockEmp($barcode, $transaction_use);
            
        // }elseif($transaction_use == 'str'){
        //     $data = $this->stkModel->getStockByStr($barcode);
        
        // }

        if (!empty($data)) {
            $response = [
                'status' => 200,
                'msg' => 'All Data Fetch successfully!',
                'data' => $data
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 404,
                'msg' => 'Data not Found!'
            ];
            return $this->response->setJSON($response);
        }

    }
    public function getStockByTran()
    {
        // $barcode = $this->request->getPost('barcode');
        $transaction_use = $this->request->getPost('transaction_use');
        
        $data = $this->stkModel->getStockByTran($transaction_use);

        // if($transaction_use == 'emp'){
        //     $data = $this->stkModel->getStockEmp($barcode, $transaction_use);
            
        // }elseif($transaction_use == 'str'){
        //     $data = $this->stkModel->getStockByStr($barcode);
        
        // }

        if (!empty($data)) {
            $response = [
                'status' => 200,
                'msg' => 'All Data Fetch successfully!',
                'data' => $data
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 404,
                'msg' => 'Data not Found!'
            ];
            return $this->response->setJSON($response);
        }

    }

    public function postStock()
    {
        $data = [
            // 'cylinder_id' => $this->request->getVar('cylinder_id'),
            'barcode' => $this->request->getVar('barcode'),
            // 'qty' => $this->request->getVar('qty'),
            // 'stock_type' => $this->request->getVar('stock_type'),
            // 'stock_location' => $this->request->getVar('stk_loc'),
            'date' => $this->request->getVar('date'),
        ];
        $id = $this->request->getPost('id');

        if(empty($id)){
            
            $result= $this->stkModel->save($data);
            if(!empty($result)){
                
                $response = [
                    'status' => 200,
                    'msg' => 'Stock Created Successfully!',
                    'data' => $result
                ];
                return $this->response->setJSON($response);
            }
            else
            {
                $response = [
                    'status' => 404,
                    'msg' => 'Data not Found!'
                ];
                return $this->response->setJSON($response); 
            }
        }else{
            // print_r("result: " . $id);
            $result = $this->stkModel->find($id);
            
            if($result){
                
                $status = $this->stkModel->update_data($id,$data);
                $updatedData = $this->stkModel->get_all_data($id);

                if(!empty($status)){
                
                    $response = [
                        'status' => 200,
                        'msg' => 'Stock Updated Successfully!',
                        'data' => $updatedData
                    ];
                    return $this->response->setJSON($response);
                }
                else
                {
                    $response = [
                        'status' => 404,
                        'msg' => 'Data not Found!'
                    ];
                    return $this->response->setJSON($response); 
                }
            }
        }

    }

    public function deleteStock($id = 0)
    {
        $data = $this->stkModel->get_all_data($id);

        if (!empty($data)) {
            
            $status = $this->stkModel->delete_data($id);
        
            if (!empty($status)) {
                $response = [
                    'status' => 200,
                    'msg' => 'Data Deleted successfully!',
                    'data' => $status
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 404,
                    'msg' => 'Data not Found!'
                ];
                return $this->response->setJSON($response);
            }
        }else{
            $response = [
                'status' => 404,
                'msg' => 'Data not Found!'
            ];
            return $this->response->setJSON($response);
        }

    }




    public function postOtherStock()
    {
        $data = [
            // 'cylinder_id' => $this->request->getVar('cylinder_id'),
            'barcode' => $this->request->getVar('barcode'),
            // 'qty' => $this->request->getVar('qty'),
            // 'stock_type' => $this->request->getVar('stock_type'),
            'stock_location' => $this->request->getVar('stk_loc'),
            'date' => $this->request->getVar('date'),
        ];
        $cylData = [
            'cylinder_status' => $this->request->getVar('stk_loc'),
        ];
        $id = $this->request->getPost('id');

        if(empty($id)){
            
            $result= $this->stkModel->save($data);
            if(!empty($result)){
                
                $response = [
                    'status' => 200,
                    'msg' => 'Stock Created Successfully!',
                    'data' => $result
                ];
                return $this->response->setJSON($response);
            }
            else
            {
                $response = [
                    'status' => 404,
                    'msg' => 'Data not Found!'
                ];
                return $this->response->setJSON($response); 
            }
        }else{
            // print_r("result: " . $id);
            $result = $this->stkModel->find($id);
            $cylId = $result['cylinder_id'];
            // print_r($cylId);
            // exit;
            
            if($result){
                
                $status = $this->stkModel->update_data($id,$data);
                $updateCyl = $this->cylinderModel->update_data($cylId,$cylData);
                $updatedData = $this->stkModel->get_all_data($id);

                if(!empty($status)){
                
                    $response = [
                        'status' => 200,
                        'msg' => 'Stock Updated Successfully!',
                        'data' => $updatedData
                    ];
                    return $this->response->setJSON($response);
                }
                else
                {
                    $response = [
                        'status' => 404,
                        'msg' => 'Data not Found!'
                    ];
                    return $this->response->setJSON($response); 
                }
            }
        }

    }
        
    
}
