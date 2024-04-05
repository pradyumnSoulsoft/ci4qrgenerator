<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\GasCylinderModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class GasCylinderController extends BaseController
{
    private $cylinderModel;
    private $stkModel;
    use ResponseTrait;
    public function __construct()
    {
         $this->stkModel = model('StockModel', true);
        $this->cylinderModel = model('GasCylinderModel', true);
    }

    public function getCylinder($id = 0)
    {
        // if($id != 0){
        //     $data = $this->cylinderModel->find($id);

        // }else{
        //     $data = $this->cylinderModel->findAll();
        
        // }
        
        $data = $this->cylinderModel->get_all_data($id);

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
    
    public function getActiveCylinder($id = 0)
    {
        $data = $this->cylinderModel->getActivedata($id);

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

    public function postCylinder()
    {
        // $gasid1 = $this->request->getVar('gas_name');
        // print_r($gasid1);
        // exit;
        $rules = [
            'cylinder_no' => ['rules' => 'required|is_unique[gas_cylinder_master.cylinder_no]'],
            // 'manufacturer_no' => ['rules' => 'required|is_unique[gas_cylinder_master.manufacturer_no]'],
        ];
        

            $data = [
                'cylinder_no' => $this->request->getVar('cylinder_no'),
                'barcode' => $this->request->getVar('barcode_text'),
                'manufacturer_name' => $this->request->getVar('manufacturer_name'),
                'manufacturer_no' => $this->request->getVar('manufacturer_no'),
                'cylinder_gas_filling_size' => $this->request->getVar('filling_size'),
                'cylinder_height' => $this->request->getVar('cylinder_height'),
                'gasId' => $this->request->getVar('gas_name'),
                'cylinder_status' => $this->request->getVar('cyl_status'),
                // 'cylinder_status' => ($this->request->getVar('filled') == 'on' || $this->request->getVar('filled') == 1) ? 1 : 0,
                'status' => ($this->request->getVar('status') == 'on' || $this->request->getVar('status') == 1) ? 1 : 0,
                
            ];
            
            $id = $this->request->getPost('id');

            if(empty($id)){
                if ($this->validate($rules)) {
                    // $gasid2 = $this->request->getVar('gas_name');
                    // print_r($gasid2);
                    // exit;
                    $insertedId= $this->cylinderModel->insert_data($data);
                    if($insertedId){
                        $stocksData = [
                            'cylinder_id' => $insertedId,
                            'barcode' => $this->request->getVar('barcode_text'),
                            'gas_id' => $this->request->getVar('gas_name'),
                            'stock_location' => $this->request->getVar('cyl_status'),
                            'date' => date('Y-m-d H:i:s'),
                            // 'qty' => $this->request->getVar('qty'),
                            // 'stock_type' => $this->request->getVar('stock_type'),
                            // 'stock_location' => $this->request->getVar('stock_location'),
                            // 'stock_location' => ($this->request->getVar('filled') == 'on' || $this->request->getVar('filled') == 1) ? 1 : 0,
                        ];
                        $result= $this->stkModel->insert_data($stocksData);
                        // print_r($result);
                        // exit;

                        if(!empty($result)){
                            
                            $response = [
                                'status' => 200,
                                'msg' => 'Cylinder Data Created Successfully!',
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
                        $response = [
                            'status' => 404,
                            'msg' => 'Data not Found!'
                        ];
                        return $this->response->setJSON($response); 
                    }
                } else {
                    // $response = [
                    //     'errors' => $this->validator->getErrors(),
                    //     'msg' => 'Duplicate value found'
                    // ];
                    // return $this->fail($response, 409);
                    $response = [
                        'status' => 409,
                        'msg' => 'Duplicate Cylinder No.!'
                    ];
                    return $this->response->setJSON($response); 
        
                }
            }else{
                // print_r("result: " . $id);
                $result = $this->cylinderModel->get_all_data($id);
                if($result){
                    
                    $status = $this->cylinderModel->update_data($id,$data);
                    if($status){
                        $stocksData = [
                            'cylinder_id' => $id,
                            'barcode' => $this->request->getVar('barcode_text'),
                            'gas_id' => $this->request->getVar('gas_name'),
                            'stock_location' => $this->request->getVar('cyl_status'),
                            'date' => date('Y-m-d H:i:s'),
                            // 'qty' => $this->request->getVar('qty'),
                            // 'stock_type' => $this->request->getVar('stock_type'),
                            // 'stock_location' => $this->request->getVar('stock_location'),
                            // 'stock_location' => ($this->request->getVar('filled') == 'on' || $this->request->getVar('filled') == 1) ? 1 : 0,
                        ];
                        $isDlt = $this->stkModel->dltDataByCylinderId($id);
                        if($isDlt){
                            $isUpdate = $this->stkModel->insert_data($stocksData);
                            // $updatedData = $this->stkModel->get_all_data($stkId);
                            if(!empty($isUpdate)){
                            
                                $response = [
                                    'status' => 200,
                                    'msg' => 'Cylinder Data Updated Successfully!',
                                    'data' => $status
                                ];
                                return $this->response->setJSON($response);
                            }
                            else
                            {
                                $response = [
                                    'status' => 404,
                                    'msg' => '1Data not Found!'
                                ];
                                return $this->response->setJSON($response); 
                            }
                        }else{
                            $response = [
                                'status' => 404,
                                'msg' => '2Data not Found!'
                            ];
                            return $this->response->setJSON($response); 
                        }
                    }else{
                        $response = [
                            'status' => 404,
                            'msg' => '3Data not Found!'
                        ];
                        return $this->response->setJSON($response); 
                    }

                }else{
                    $response = [
                        'status' => 404,
                        'msg' => '4Data not Found!'
                    ];
                    return $this->response->setJSON($response); 
                }
            }
        

    }

    public function deleteCylinder($id = 0)
    {
        $data = $this->cylinderModel->get_all_data($id);

        if (!empty($data)) {
            
            $status = $this->cylinderModel->delete_data($id);
        
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
/*
cylinder_no
barcode
manufacturer_name
manufacturer_no
cylinder_gas_filling_size
cylinder_height
gasId
cylinder_status
status
*/