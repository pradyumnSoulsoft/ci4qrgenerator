<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class DepartmentController extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        
        $this->deptModel = model('DepartmentModel', true);
    }

    public function getDept($id = 0)
    {
        // if($id != 0){
        //     $data = $this->deptModel->find($id);

        // }else{
        //     $data = $this->deptModel->findAll();
        
        // }
        
        $data = $this->deptModel->get_all_data($id);

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

    public function postOtherDept()
    {
        $transaction_use = $this->request->getPost('transaction_use');
        
        $data = $this->deptModel->getDataByTrans($transaction_use);

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
    
    public function postDept()
    {
        $rules = [
            'dept_name' => ['rules' => 'required|is_unique[department_master.dept_name]'],
        ];
        // if ($this->validate($rules)) {

            
            $data = [
            'dept_name' => $this->request->getVar('dept_name'),
            'description' => $this->request->getVar('description'),
            'transaction_use' => $this->request->getVar('transaction_use'),
            // 'gas_id' => $this->request->getVar('gas_id'),
            ];
            $id = $this->request->getPost('id');

            if(empty($id)){
                if ($this->validate($rules)) {
                
                    $result= $this->deptModel->insert_data($data);
                    if(!empty($result)){
                        
                        $response = [
                            'status' => 200,
                            'msg' => 'Department Data Created Successfully!',
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
                } else {
                    $response = [
                        'status' => 409,
                        'msg' => 'Duplicate Department found!'
                    ];
                    return $this->response->setJSON($response); 
        
                }
            }else{
                // print_r("result: " . $id);
                $result = $this->deptModel->find($id);
                
                if($result){
                    
                    $status = $this->deptModel->update_data($id,$data);
                    
                    if(!empty($status)){
                    
                        $response = [
                            'status' => 200,
                            'msg' => 'Department Data Updated Successfully!',
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
            
        // } else {
        //     $response = [
        //         'status' => 409,
        //         'msg' => 'Duplicate Department found!'
        //     ];
        //     return $this->response->setJSON($response); 

        // }
    }

    public function deleteDept($id = 0)
    {
        $data = $this->deptModel->find($id);

        if (!empty($data)) {
            
            $status = $this->deptModel->delete_data($id);
        
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
}
