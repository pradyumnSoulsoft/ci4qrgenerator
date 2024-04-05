<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  $routes->get('/', 'Home::index');
//  $routes->get('/', 'Ui\UIController::index');

$routes->group('super', function ($routes) {
    $routes->get('login', 'Super::index');    
    $routes->get('superDashboard', 'Super::dashboard');    
    $routes->get('superTab', 'Super::tab');    
    $routes->get('superActivity', 'Super::activity');    
    $routes->get('superRole', 'Super::role');    
    $routes->get('superProfile', 'Super::profile');    
    $routes->get('profileDetails/(:num)', 'Super::profileDetails/$1');    
    $routes->get('office_type', 'Super::officeType');    
    $routes->get('officeBranch', 'Super::officeBranch');    
    $routes->get('superCountry', 'Super::country');    
    $routes->get('superCountryDetails/(:num)', 'Super::countryDetails/$1');    
    $routes->get('superEmployee', 'Super::employee');    
    $routes->get('superIcon', 'Super::icon');  

    // $routes->get('gas', 'Ui\UIController::gas');
    // $routes->get('tab', 'Ui\UIController::tab');
    // $routes->get('unit', 'Ui\UIController::unit');
    
    $routes->get('employeeLogin', 'Admin\AdminController::index');    
    $routes->get('dashboard', 'Admin\AdminController::dashboard');    
    
    $routes->post('superUserLogin', 'Api\Super::index');      
    $routes->post('register', 'Api\Super::register'); 

   
    $routes->get('tab', 'Api\TabController::getTab');      
    $routes->get('tab/(:num)', 'Api\TabController::getTab/$1');      
    $routes->post('tab', 'Api\TabController::postTab');      
    // $routes->post('tab/(:num)', 'Api\TabController::postTab/$1');      
    // $routes->get('tab/(:num)', 'Api\TabController::getTab/$1'); 
     // $routes->get('tab/(:num)', 'Api\TabController::getTab/$1'); 
    
    $routes->get('icon', 'Api\IconController::getIcon');      
    $routes->get('icon/(:num)', 'Api\IconController::getIcon/$1');      
    $routes->post('icon', 'Api\IconController::postIcon');  
    
    $routes->get('officeType', 'Api\OfficeTypeController::getOfficeType');      
    $routes->get('officeType/(:num)', 'Api\OfficeTypeController::getOfficeType/$1');      
    $routes->post('officeType', 'Api\OfficeTypeController::postOfficeType');  

    $routes->get('activity', 'Api\ActivityController::getActivity');      
    $routes->get('activity/(:num)', 'Api\ActivityController::getActivity/$1');      
    $routes->post('activity', 'Api\ActivityController::postActivity');  
    
    $routes->get('role', 'Api\RoleController::getRole');      
    $routes->get('role/(:num)', 'Api\RoleController::getRole/$1');      
    $routes->post('role', 'Api\RoleController::postRole');
    
    $routes->get('profile', 'Api\ProfileController::getProfile');      
    $routes->get('profile/(:num)', 'Api\ProfileController::getProfile/$1');      
    $routes->get('profileByRole/(:num)', 'Api\ProfileController::getRoleByProfile/$1');      
    $routes->post('profile', 'Api\ProfileController::postProfile');

    // $routes->get('officeType', 'Api\OfficeTypeController::getOfficeType');      
    // $routes->get('officeType/(:num)', 'Api\OfficeTypeController::getOfficeType/$1');      
    // $routes->post('officeType', 'Api\OfficeTypeController::postOfficeType');


    $routes->get('profileRole', 'Api\ProfileRoleController::getProfile_role');      
    $routes->get('profileRole/(:num)', 'Api\ProfileRoleController::getProfile_role/$1');      
    $routes->post('profileRole', 'Api\ProfileRoleController::postProfile_role');
    $routes->delete('profileRole/(:num)', 'Api\ProfileRoleController::deleteProfile_role/$1');
    
    $routes->get('profileTab', 'Api\ProfileTabController::getProfile_tab');      
    $routes->get('profileTab/(:num)', 'Api\ProfileTabController::getProfile_tab/$1');      
    $routes->post('profileTab', 'Api\ProfileTabController::postProfile_tab');
    $routes->delete('profileTab/(:num)', 'Api\ProfileTabController::deleteProfile_tab/$1');
    
    
    $routes->get('profileActivity', 'Api\ProfileActivityController::getProfileActivity');      
    $routes->get('profileActivity/(:num)', 'Api\ProfileActivityController::getProfileActivity/$1');      
    $routes->post('profileActivity', 'Api\ProfileActivityController::postProfileActivity');
    $routes->delete('profileActivity/(:num)/(:num)', 'Api\ProfileActivityController::deleteProfileActivity/$1/$2');
    
    $routes->get('profileActivityPermissions', 'Api\ProfileAccessControlPermissionController::getprofileActivityPermission');      
    $routes->get('profileActivityPermissions/(:num)', 'Api\ProfileAccessControlPermissionController::getprofileActivityPermission/$1');

    $routes->get('activityControl', 'Api\ActivityControlModelController::getActivityControl');      
    $routes->get('activityControl/(:num)', 'Api\ActivityControlModelController::getActivityControl/$1');      
    $routes->post('activityControl', 'Api\ActivityControlModelController::postActivityControl');

    $routes->post('updateActivityControl', 'Api\ActivityControlModelController::updateActivityControl');


    //Employee Login and logout Api
    $routes->post('employee_login', 'Api\EmployeeLoginController::login_auth');
    $routes->post('employeeLogout', 'Api\EmployeeLoginController::logout');
    
    $routes->get('officeBranchDetails', 'Api\OfficeBranchController::getOfficeBranch');      
    $routes->get('officeBranchDetails/(:num)', 'Api\OfficeBranchController::getOfficeBranch/$1');      
    $routes->post('officeBranchDetails', 'Api\OfficeBranchController::postOfficeBranch');

    $routes->get('country', 'Api\CountryController::getCountry');      
    $routes->get('country/(:num)', 'Api\CountryController::getCountry/$1');      
    $routes->post('country', 'Api\CountryController::postCountry');

    $routes->get('state', 'Api\StateController::getState');      
    $routes->get('state/(:num)', 'Api\StateController::getState/$1');      
    $routes->post('state', 'Api\StateController::postState');

    $routes->get('city', 'Api\CityController::getCity');      
    $routes->get('city/(:num)', 'Api\CityController::getCity/$1');    
    $routes->get('statecity/(:num)', 'Api\CityController::getStateCity/$1');  
    $routes->post('city', 'Api\CityController::postCity');

    //Admin Master 
    //Api 
    $routes->post('employee', 'Api\AdminController::postAdmin');
    $routes->get('employee/(:num)/(:num)', 'Api\AdminController::getAdmin/$1/$2');
    // $routes->post('employeeLogout', 'Api\EmployeeLoginController::logout');

    // $route['employee']='Api/AdminController/Admin';
    // $route['employee/(:num)/(:num)']='Api/AdminController/Admin/$1/$2';

    $routes->get('tabJoin', 'SiteController::getData'); 
         
});

// $routes->group('user', function ($routes) {

//     $routes->get('gas_cylinder', 'Api\GasCylinderController::getCylinder');
//     $routes->get('gas_cylinder/(:num)', 'Api\GasCylinderController::getCylinder/$1');
//     $routes->get('cylinder_active', 'Api\GasCylinderController::getActiveCylinder');
//     $routes->get('cylinder_active/(:num)', 'Api\GasCylinderController::getActiveCylinder/$1');
//     $routes->post('gas_cylinder', 'Api\GasCylinderController::postCylinder');
//     // $routes->post('gas_cylinder/(:num)', 'Api\GasCylinderController::postCylinder/$1');
//     $routes->delete('gas_cylinder/(:num)', 'Api\GasCylinderController::deleteCylinder/$1');
    
    
//     $routes->get('gas_api', 'Api\GasController::getGas');
//     $routes->get('gas_api/(:num)', 'Api\GasController::getGas/$1');
//     $routes->get('gas_active', 'Api\GasController::getActiveGas');
//     $routes->get('gas_active/(:num)', 'Api\GasController::getActiveGas/$1');
//     $routes->post('gas_api', 'Api\GasController::postGas');
//     // $routes->post('gas_api/(:num)', 'Api\GasController::postGas/$1');
//     $routes->delete('gas_api/(:num)', 'Api\GasController::deleteGas/$1');
    
//     $routes->get('dept_api', 'Api\DepartmentController::getDept');
//     $routes->get('dept_api/(:num)', 'Api\DepartmentController::getDept/$1');
//     $routes->post('dept_api', 'Api\DepartmentController::postDept');
//     $routes->post('other_dept_api', 'Api\DepartmentController::postOtherDept');
//     // $routes->post('dept_api/(:num)', 'Api\DepartmentController::postDept/$1');
//     $routes->delete('dept_api/(:num)', 'Api\DepartmentController::deleteDept/$1');
    
//     $routes->get('client_api', 'Api\ClientController::getClient');
//     $routes->get('client_api/(:num)', 'Api\ClientController::getClient/$1');
//     $routes->post('client_api', 'Api\ClientController::postClient');
//     // $routes->post('client_api/(:num)', 'Api\ClientController::postClient/$1');
//     $routes->delete('client_api/(:num)', 'Api\ClientController::deleteClient/$1');
    
//     $routes->get('stock_type_api', 'Api\StockTypeController::getStockType');
//     $routes->get('stock_type_api/(:num)', 'Api\StockTypeController::getStockType/$1');
//     $routes->post('stock_type_api', 'Api\StockTypeController::postStockType');
//     // $routes->post('stock_type_api/(:num)', 'Api\StockTypeController::postStockType/$1');
//     // $routes->delete('stock_type_api/(:num)', 'Api\StockTypeController::deleteStockType/$1');
    
//     $routes->get('stock_api', 'Api\StockController::getStock');
//     $routes->get('stock_api/(:num)', 'Api\StockController::getStock/$1');
//     $routes->post('stock_barcode', 'Api\StockController::getStockByBarcode');
//     $routes->post('stock_api', 'Api\StockController::postStock');
//     $routes->post('other_stock_api', 'Api\StockController::postOtherStock');
//     $routes->post('stock_api_trans', 'Api\StockController::getStockByTran');
//     // $routes->post('storage_stock_api', 'Api\StockController::postStorageStock');
//     // $routes->post('stock_api/(:num)', 'Api\StockController::postStock/$1');
//     $routes->delete('stock_api/(:num)', 'Api\StockController::deleteStock/$1');
// });


$routes->group('master', function ($routes) {
//     $routes->get('gasCylinder', 'Ui\UIController::gasCylinder');
//     $routes->get('gas', 'Ui\UIController::gas');
//     $routes->get('department', 'Ui\UIController::department');
//     $routes->get('client', 'Ui\UIController::client');
//     $routes->get('qrcode', 'Ui\UIController::qrcode');
    $routes->get('qrgenerator', 'Ui\UIController::qrgenerator');
    $routes->get('expage', 'Ui\UIController::expage');
    
});


// $routes->group('transaction', function ($routes) {
//     $routes->get('create_cylinder', 'Ui\UIController::createCylinder');
//     $routes->get('refill_cylinder', 'Ui\UIController::refillCylinder');
//     $routes->get('storage_cylinder', 'Ui\UIController::storageCylinder');
//     $routes->get('vehicle_loading', 'Ui\UIController::vehicleLoading');
//     $routes->get('vehicle_unload', 'Ui\UIController::vehicleUnload');
//     $routes->get('sale_to_customer', 'Ui\UIController::saleToCustomer');
//     $routes->get('dashboard', 'Ui\UIController::dashboard');

// });

$routes->group('ui', function ($routes) {
    $routes->get('home', 'Ui\UIController::index');
});

$routes->group("api", function ($routes) {
    $routes->post("register", "Register::index");
    $routes->post("login", "Login::index");
    $routes->get("users", "User::index", ['filter' => 'authFilter']);
});