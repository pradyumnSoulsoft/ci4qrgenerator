<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class ClientController extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        
        $this->clientModel = model('ClientModel', true);
    }

    public function getClient($id = 0)
    {
        if($id != 0){
            $data = $this->clientModel->find($id);

        }else{
            $data = $this->clientModel->findAll();
        
        }
        
        // $data = $this->clientModel->get_all_data($id);

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
    
    public function postClient()
    {

        $data = [
            'client_name' => $this->request->getVar('client_name'),
            'address' => $this->request->getVar('idealTime'),
            'contact' => $this->request->getVar('contact'),
            'email' => $this->request->getVar('email'),
            'idealtimeforcylinder' => $this->request->getVar('idealTime'),
        ];
        $id = $this->request->getPost('id');

        if(empty($id)){
            
            $result= $this->clientModel->save($data);
            if(!empty($result)){
                
                $response = [
                    'status' => 200,
                    'msg' => 'Client Data Created Successfully!',
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
            $result = $this->clientModel->find($id);
            
            if($result){
                
                $status = $this->clientModel->update_data($id,$data);

                if(!empty($status)){
                
                    $response = [
                        'status' => 200,
                        'msg' => 'Client Data Updated Successfully!',
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

    public function deleteClient($id = 0)
    {
        $data = $this->clientModel->find($id);

        if (!empty($data)) {
            
            $status = $this->clientModel->delete_data($id);
        
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
