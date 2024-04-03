<?php

namespace App\Controllers\Ui;

use App\Controllers\BaseController;

class UIController extends BaseController
{

    public function index()
    {
         return  view('ui/header')
                .view('ui/home')
                .view('ui/home_js')
                .view('ui/footer');
    }

    // public function gas()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('gas/gas')
    //     . view('gas/modal/add_gas')
    //     . view('footer')
    //     . view('gas/gas_js')
    //     . view('htmlend');
        
    // }
    
    // public function department()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('department/department')
    //     . view('department/modal/add_department')
    //     . view('footer')
    //     . view('department/department_js')
    //     . view('htmlend');
        
    // }
    
    // public function client()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('client/client')
    //     . view('client/modal/add_client')
    //     . view('footer')
    //     . view('client/client_js')
    //     . view('htmlend');
        
    // }
    
    // public function gasCylinder()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('gas_cylinder/gas_cylinder')
    //     . view('gas_cylinder/modal/add_gasCylinder')
    //     . view('footer')
    //     . view('gas_cylinder/gas_cylinder_js')
    //     . view('htmlend');
        
    // }
    // public function qrcode()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('gas_cylinder/qrcode')
    //     . view('gas_cylinder/modal/add_qr')
    //     . view('footer')
    //     . view('gas_cylinder/qrcode_js')
    //     . view('htmlend');
        
    // }
    
    // public function createCylinder()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('employee/create_cylinder/create_cylinder')
    //     . view('employee/create_cylinder/modal/add_create_cylinder')
    //     . view('footer')
    //     . view('employee/create_cylinder/create_cylinder_js')
    //     . view('htmlend');
        
    // }
    
    // public function refillCylinder()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('employee/refill_cylinder/refill_cylinder')
    //     . view('employee/refill_cylinder/modal/add_refill_cylinder')
    //     . view('footer')
    //     . view('employee/refill_cylinder/refill_cylinder_js')
    //     . view('htmlend');
        
    // }
    
    // public function storageCylinder()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('employee/storage_cylinder/storage_cylinder')
    //     . view('employee/storage_cylinder/modal/add_storage_cylinder')
    //     . view('footer')
    //     . view('employee/storage_cylinder/storage_cylinder_js')
    //     . view('htmlend');
        
    // }
    
    // public function vehicleLoading()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('employee/vehicle_loading/vehicle_loading')
    //     . view('employee/vehicle_loading/modal/add_vehicle_loading')
    //     . view('footer')
    //     . view('employee/vehicle_loading/vehicle_loading_js')
    //     . view('htmlend');
        
    // }
    
    // public function vehicleUnload()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('employee/vehicle_unload/vehicle_unload')
    //     . view('employee/vehicle_unload/modal/add_vehicle_unload')
    //     . view('footer')
    //     . view('employee/vehicle_unload/vehicle_unload_js')
    //     . view('htmlend');
        
    // }
    
    // public function saleToCustomer()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('employee/sale_to_customer/sale_to_customer')
    //     . view('employee/sale_to_customer/modal/add_sale_to_customer')
    //     . view('footer')
    //     . view('employee/sale_to_customer/sale_to_customer_js')
    //     . view('htmlend');
        
    // }
    
    // public function dashboard()
    // {
    //     return view('header')
    //     . view('sidebar/side_bar')
    //     . view('employee/dashboard/dashboard')
    //     . view('employee/dashboard/modal/add_dashboard')
    //     . view('footer')
    //     . view('employee/dashboard/dashboard_js')
    //     . view('htmlend');
        
    // }
    
    

}
