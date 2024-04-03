<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ProfileActivityControlPermissionModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class ProfileAccessControlPermissionController extends BaseController
{
    use ResponseTrait;
    
    public function getprofileActivityPermission($id=0)
    {
        $profileActivityControlModel = new ProfileActivityControlPermissionModel();

        // Fetch all products from the database
        // $data = $profileActivityControlModel->findAll();
        $data = $profileActivityControlModel->get_all_data($id);

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

    public function postprofileActivityPermission()
    {
        $profileActivityControlModel = new ProfileActivityControlPermissionModel();

        // $data = $this->request->getVar('uname');
        // $data = $this->request->getVar('password');
        $data = [
            'profile_id' => $this->request->getVar('profile_id'),
            'aac_id' => $this->request->getVar('aac_id'),
            'activity_id' => $this->request->getVar('activity_id'),
            'permission' => $this->request->getVar('permission'),
        ];
        $result= $profileActivityControlModel->save($data);

        if(!empty($result)){
            
            $response = [
                'status' => 200,
                'message' => 'Profile Activity Permission Created Successfully!',
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

    public function deleteprofileActivityPermission($id){

        $profileActivityControlModel = new ProfileActivityControlPermissionModel();

        $result = $profileActivityModel->delete_data($id);

        if (!empty($result)) {
            $response = [
                'status' => 200,
                'message' => 'All Data Deleted successfully!',
                'data' => $result
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
