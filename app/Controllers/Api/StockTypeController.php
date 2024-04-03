<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\StockTypeModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class StockTypeController extends BaseController
{
    private $stkTypeModel;
    use ResponseTrait;
    public function __construct()
    {
        
        $this->stkTypeModel = model('StockTypeModel', true);
    }

    public function getStockType($id = 0)
    {
        if($id != 0){
            $data = $this->stkTypeModel->find($id);

        }else{
            $data = $this->stkTypeModel->findAll();
        
        }
        
        // $data = $this->cylinderModel->get_all_data($id);

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

    public function postStockType()
    {

        $data = [
            'stock_type_master' => $this->request->getVar('stock_type_master'),
            'description' => $this->request->getVar('description'),
        ];
        $id = $this->request->getPost('id');

        if(empty($id)){
            
            $result= $this->stkTypeModel->save($data);
            if(!empty($result)){
                
                $response = [
                    'status' => 200,
                    'msg' => 'Stock Type Created Successfully!',
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
            $result = $this->stkTypeModel->find($id);
            
            if($result){
                
                $status = $this->stkTypeModel->update_data($id,$data);
                $updatedData = $this->stkTypeModel->find($id);

                if(!empty($status)){
                
                    $response = [
                        'status' => 200,
                        'msg' => 'Stock Type Updated Successfully!',
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
