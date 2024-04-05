<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\GasModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class GasController extends BaseController
{
    private $gasModel;
    use ResponseTrait;
    public function __construct()
    {
        
        $this->gasModel = model('GasModel', true);
        $this->cylinderModel = model('GasCylinderModel', true);
    }

    public function getGas($id = 0)
    {
        if($id != 0){
            $data = $this->gasModel->find($id);

        }else{
            $data = $this->gasModel->findAll();
        
        }
        
        // $data = $this->gasModel->get_all_data($id);

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
    
    public function getActiveGas($id = 0)
    {
            $data = $this->gasModel->get_all_data($id);
        
        // $data = $this->gasModel->get_all_data($id);

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

    public function postGas()
    {

        $data = [
            'gas_name' => $this->request->getVar('gas_name'),
            'gas_formula' => $this->request->getVar('gas_formula'),
            'status' => ($this->request->getVar('status') == 'on' || $this->request->getVar('status') == 1) ? 1 : 0,
            
        ];
        $id = $this->request->getPost('id');

        if(empty($id)){
            
            $result= $this->gasModel->save($data);
            if(!empty($result)){
                
                $response = [
                    'status' => 200,
                    'msg' => 'Gas Data Created Successfully!',
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
            $result = $this->gasModel->find($id);
            
            if($result){
                
                $status = $this->gasModel->update_data($id,$data);

                if(!empty($status)){
                
                    $response = [
                        'status' => 200,
                        'msg' => 'Gas Data Updated Successfully!',
                        'data' => $status
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

    public function deleteGas($id = 0)
    {
        $data = $this->gasModel->find($id);

        if (!empty($data)) {
            
            $isDelete = $this->gasModel->delete_data($id);
            if($isDelete){
                $status = $this->cylinderModel->deleteGasId($id);

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
        
        }else{
            $response = [
                'status' => 404,
                'msg' => 'Data not Found!'
            ];
            return $this->response->setJSON($response);
        }

    }
}
