<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class RoleController extends BaseController
{
    use ResponseTrait;

    
    public function getRole($id=0)
    {
        $roleModel = new RoleModel();

        // Fetch all products from the database
        $data = $roleModel->get_all_data($id);

        if (!empty($data)) {
            $response = [
                'status' => 200,
                'message' => 'All Data Fetch successfully!',
                'data' => $data
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 404,
                'message' => 'Data not Found!'
            ];
            return $this->response->setJSON($response);
        }
       
    }

    public function postRole()
    {
        $roleModel = new RoleModel();

        // $data = $this->request->getVar('uname');
        // $data = $this->request->getVar('password');
        $data = [
            'role' => $this->request->getVar('role'),
                     
        ];
        $id = $this->request->getPost('id');
        // print_r("id:" . $id);
        // print_r($data);
       


        if(empty($id)){

            $result= $roleModel->save($data);

            if(!empty($result)){
                
                $response = [
                    'status' => 200,
                    'message' => 'Role Data Created Successfully!',
                    'data' => $result
                ];
                return $this->response->setJSON($response);
            }
            else
            {
                $response = [
                    'status' => 404,
                    'message' => 'Data not Found!'
                ];
                return $this->response->setJSON($response); 
            }
        }else{
            $result = $roleModel->get_all_data($id);
            // print_r("result: " . $id);
            if($result){

                $status = $roleModel->update_role($id,$data);

                if(!empty($status)){
                
                    $response = [
                        'status' => 200,
                        'message' => 'Role Data Updated Successfully!',
                        'data' => $status
                    ];
                    return $this->response->setJSON($response);
                }
                else
                {
                    $response = [
                        'status' => 404,
                        'message' => 'Data not Found!'
                    ];
                    return $this->response->setJSON($response); 
                }
            }
        }

    }
}
