<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;


class ProfileController extends BaseController
{
    use ResponseTrait;
    
    public function getProfile($id=0)
    {
        $profileModel = new ProfileModel();

        // Fetch all products from the database
        // $data = $profileModel->findAll();
        $data = $profileModel->get_all_data($id);

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
    
    public function postProfile()
    {
        $profileModel = new ProfileModel();
        
        // $data = $this->request->getVar('uname');
        // $data = $this->request->getVar('password');
        $data = [
            'role_id' => $this->request->getVar('role_id'),
            'profile' => $this->request->getVar('profile'),
            'is_active' => $this->request->getVar('is_active'),
        ];

        $id = $this->request->getPost('id');

        if(empty($id)){

            $result= $profileModel->save($data);
    
            if(!empty($result)){
                
                $response = [
                    'status' => 200,
                    'message' => 'Profile Created Successfully!',
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
            $result = $profileModel->get_all_data($id);
            
            if($result){

                $status = $profileModel->update_data($id,$data);
                if(!empty($status)){
                    
                    $response = [
                        'status' => 200,
                        'message' => 'Profile Updated Successfully!',
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
            }
        }
        
    }
    public function getRoleByProfile($roleId=0)
    {
        $profileModel = new ProfileModel();
    
        // Fetch all products from the database
        // $data = $profileModel->findAll();
        $data = $profileModel->get_roleByProfile($roleId);
    
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
}
