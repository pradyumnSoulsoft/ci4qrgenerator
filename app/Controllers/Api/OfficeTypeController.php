<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\OfficeTypeModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class OfficeTypeController extends BaseController
{
    use ResponseTrait;

    
    public function getOfficeType($id=0)
    {
        $officeModel = new OfficeTypeModel();

        // Fetch all products from the database
        $data = $officeModel-> get_all_data($id);

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

    public function postOfficeType()
    {
        $officeModel = new OfficeTypeModel();
        
        $data = [
            'type' => $this->request->getVar('type'),
                     
        ];
        $id = $this->request->getPost('id');
        //print_r( $id);
        

        if(empty($id)){
                       
            $result= $officeModel->save($data);
            if(!empty($result)){
                
                $response = [
                    'status' => 200,
                    'message' => 'Office Type Data Created Successfully!',
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
            $result = $officeModel->get_all_data($id);
                            
            // $result= $admin->save($data);
            if($result){


                $status = $officeModel->update_officeType($id,$data);

                if(!empty($status)){
                    
                    $response = [
                        'status' => 200,
                        'message' => 'Office Type Data Updated Successfully!',
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
