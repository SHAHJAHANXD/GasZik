<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Mobie;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OnGoingOrdersController;
use App\Http\Controllers\DriverOrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\DriverLatlongController;
use App\Http\Controllers\OrderReviewController;
use Facade\FlareClient\Api;

// Customer Login
Route::post('/Customer/Login', [UserController::class, 'login']);
// Admin Login
Route::post('/Admin/Login', [AdminController::class, 'login']);
// Driver Login
Route::post('/DriverLogin', [DriverController::class, 'login']);
// Update Driver Profile
Route::post('/UpdateDriverProfile', [DriverController::class, 'updateProfile']);
// Update Driver Password
Route::post('/Driver/ChangePassword', [DriverController::class, 'update']);
// Update Customer Password
Route::post('/UpdateCustomerPassword', [UserController::class, 'update']);
// Get All Customer
Route::get('/User/GetAllCustomers', [CustomerController::class, 'Customers']);
// Get Specific Customer By ID
Route::get('/User/GetSpecificCustomerById/{id}', [CustomerController::class, 'CustomersID']);

// Get Driver By OrderId
Route::get('/User/GetDriverByOrderId/{id}', [DriverOrderController::class, 'OrderId']);
// Update Customer Profile
Route::post('/Customer/UpdateProfile', [UserController::class, 'updateProfile']);
// Add Customer
Route::post('/AddCustomer',[Mobie::class, 'store']);
// Save Customer Address
Route::post('/Customer/SaveCustomerAddress',[UserAddressController::class, 'store']);
// Delete Customer Address
Route::post('/Customer/Delete/{AddresId}',[UserAddressController::class, 'destroy']);
// Update Admin Password
Route::post('/Admin/ChangePassword', [AdminController::class, 'update']);
// Get All Items
Route::get('/Item/GetAll',[Mobie::class, 'items']);
// Get All Items By Id 

Route::get('/Item/GetById/{id}',[Mobie::class, 'items_id']);
// Get All Items By Type
Route::get('/Item/GetItemByType/{itemtype}',[Mobie::class, 'items_type']);
// Delete Items
Route::post('/Item/Delete/{id}',[ItemsController::class, 'destroy']);
// Update items Status to Availabe 
Route::post('/OrderStatusOne/{id}',[Mobie::class, 'order_one']);
// Update items Status to Unavailable
Route::post('/OrderStatusZero/{id}',[Mobie::class, 'order_zero']);
// Update items Status to Availabe 
Route::post('/StatusOne/{id}',[Mobie::class, 'one']);
// Update items Status to Unavailable
Route::post('/StatusZero/{id}',[Mobie::class, 'zero']);
// Add Items
Route::post('/Item/Save',[Mobie::class, 'itemstore']);
// Save Configurations
Route::post('/Configuration/Save', [ConfigurationController::class, 'store']);
// Get All Configurations
Route::get('/Configuration/GetAll',[ConfigurationController::class, 'configurations']);
// Get All Drivers
Route::get('/User/GetAllDrivers',[DriverController::class, 'getAll']);
// Get All Drivers By Id
Route::get('/Driver/GetbyId/{Id}/{Lan}',[DriverController::class, 'Driver_id']);
// Save new Driver 
Route::get('/Driver/SaveDriverInformation',[DriverController::class, 'info']);
// Update Availability of item
Route::post('/Item/UpdateAvalibalityOfItem',[Mobie::class, 'Availability']);


// Add Attachments
Route::post('/Attachment/SaveAttachment',[Mobie::class, 'attachments']);
// Add On Going Orders
Route::post('/Order/OnGoingOrders',[Mobie::class, 'ongoingOrders']);
// Get All On Going Orders
Route::get('/Order/GetOnGoingOrders',[OnGoingOrdersController::class, 'ongoing']);
// Update Order Status
Route::post('/Order/UpdateOrderStatus',[Mobie::class, 'UpdateOrderStatus']);
// Get All Orders
Route::get('/Order/GetAll',[OnGoingOrdersController::class, 'allongoing']);
// Get All Orders By Order Id
Route::get('/Order/GetById/{id}/{Lan}',[OnGoingOrdersController::class, 'allongoingid']);
// Get All New Orders
Route::get('/Order/GetAllNewOrder',[OnGoingOrdersController::class, 'allongoing']);
// Get All Driver Orders
Route::get('/DriverOrders/GetAllDirverOrder/{DriverId}',[DriverOrderController::class, 'orders']);
// Save Customer Order
Route::post('/PlaceOrder',[OrderItemController::class, 'store']);
// Save Driver Order
Route::post('/DriverOrders',[DriverOrderController::class, 'store']);
// Save Driver Latlong
Route::post('/DriverLatlong',[DriverLatlongController::class, 'store']);
// Get All Driver Orders By DriverId 
Route::get('/Order/GetOrdersOfSpecificDriver/{DriverId}',[DriverOrderController::class, 'driver_id']);
// Get Near By Drivers
Route::get('/DriverOrders/GetNearByDrivers/{lat}/{Lng}',[DriverLatlongController::class, 'latlong']);
// Change Status of a Driver Active 
Route::post('/UpdateDriverActiveStatus/{id}',[DriverController::class, 'active']);
// Change Status of a Driver Unactive 
Route::post('/UpdateDriverUnactiveStatus/{id}',[DriverController::class, 'active']);
// Get All Active Drivers
Route::get('/GetOnlineDrivers',[DriverController::class, 'online']);

// Change Status of a Driver Order 
Route::post('/Driver/UpdarteOrderStatusByDriver/{id}',[DriverOrderController::class, 'status']);

// Get Latitude And Longitude Of All Drivers
Route::get('/Driver/LatitudeAndLongitudeAllDrivers',[DriverLatlongController::class, 'latlongall']);
// Get All Dirver Order By DriverId
Route::get('/GetAllDirverOrder/{DriverId}',[DriverOrderController::class, 'driverId']);

// Get Review By DriverId
Route::get('/Review/GetrewiewByDriverId/{DriverId}',[OrderReviewController::class, 'review']);
// Get Review By OrderId
Route::get('/Review/GetRatingOfOrder/{OrderId}',[OrderReviewController::class, 'reviewOrder']);
// Get Review By CustomerId
Route::get('/Review/GetrewiewByCustomerId/{CustomerId}',[OrderReviewController::class, 'reviewCustomer']);
// Add Order Review
Route::post('/Review/OrderReview',[Mobie::class, 'review']);