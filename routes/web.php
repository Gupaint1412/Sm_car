<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Models\Smcar;
use App\Models\Machine;
use App\Models\Truck;
use App\Models\General;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//--------------------------------- Route Register
Route::get('admin/home',[AdminController::class,'adminHome'])->name('admin.home');

Auth::routes();

//--------------------------------- Route Admin
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home',[AdminController::class,'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/car',[AdminController::class,'adminCar'])->name('admin.car')->middleware('is_admin');
Route::get('admin/machine',[AdminController::class,'adminMachine'])->name('admin.machine')->middleware('is_admin');
Route::get('admin/truck',[AdminController::class,'adminTruck'])->name('admin.truck')->middleware('is_admin');
Route::get('admin/general',[AdminController::class,'adminGeneral'])->name('admin.general')->middleware('is_admin');
//================================== ADMIN CRUD CAR
Route::get('admin/add_car',[AdminController::class,'add_Car'])->name('admin.addCar')->middleware('is_admin');
Route::post('admin/store_car',[AdminController::class,'store_Car'])->name('admin.storeCar')->middleware('is_admin');
Route::get('admin/show_car/{id}',AdminController::class.'@show_Car')->name('admin.showCar')->middleware('is_admin');
Route::get('admin/edit_car/{id}',AdminController::class.'@edit_Car')->name('admin.editCar')->middleware('is_admin');
Route::post('admin/update_car/{id}',AdminController::class.'@update_Car')->name('admin.updateCar')->middleware('is_admin');
Route::post('admin/delete_car/{id}',AdminController::class.'@delete_Car')->name('admin.deleteCar')->middleware('is_admin');
//================================== ADMIN CRUD MACHINE
Route::get('admin/add_machine',[AdminController::class,'add_Machine'])->name('admin.addMachine')->middleware('is_admin');
Route::post('admin/store_machine',[AdminController::class,'store_Machine'])->name('admin.storeMachine')->middleware('is_admin');
Route::get('admin/show_machine/{id}',AdminController::class.'@show_Machine')->name('admin.showMachine')->middleware('is_admin');
Route::get('admin/edit_machine/{id}',AdminController::class.'@edit_Machine')->name('admin.editMachine')->middleware('is_admin');
Route::post('admin/update_machine/{id}',AdminController::class.'@update_Machine')->name('admin.updateMachine')->middleware('is_admin');
Route::post('admin/delete_machine/{id}',AdminController::class.'@delete_Machine')->name('admin.deleteMachine')->middleware('is_admin');
//================================== ADMIN CRUD TRUCK
Route::get('admin/add_truck',[AdminController::class,'add_Truck'])->name('admin.addTruck')->middleware('is_admin');
Route::post('admin/store_truck',[AdminController::class,'store_Truck'])->name('admin.storeTruck')->middleware('is_admin');
Route::get('admin/show_truck/{id}',AdminController::class.'@show_Truck')->name('admin.showTruck')->middleware('is_admin');
Route::get('admin/edit_truck/{id}',AdminController::class.'@edit_Truck')->name('admin.editTruck')->middleware('is_admin');
Route::post('admin/update_truck/{id}',AdminController::class.'@update_Truck')->name('admin.updateTruck')->middleware('is_admin');
Route::post('admin/delete_truck/{id}',AdminController::class.'@delete_Truck')->name('admin.deleteTruck')->middleware('is_admin');
//================================== ADMIN CRUD GENERAL
Route::get('admin/add_general',[AdminController::class,'add_General'])->name('admin.addGeneral')->middleware('is_admin');
Route::post('admin/store_general',[AdminController::class,'store_General'])->name('admin.storeGeneral')->middleware('is_admin');
Route::get('admin/show_general/{id}',AdminController::class.'@show_General')->name('admin.showGeneral')->middleware('is_admin');
Route::get('admin/edit_general/{id}',AdminController::class.'@edit_General')->name('admin.editGeneral')->middleware('is_admin');
Route::post('admin/update_general/{id}',AdminController::class.'@update_General')->name('admin.updateGeneral')->middleware('is_admin');
Route::post('admin/delete_general/{id}',AdminController::class.'@delete_General')->name('admin.deleteGeneral')->middleware('is_admin');


//--------------------------------- Route Users
Route::get('users/home',[UsersController::class,'index'])->name('users.home');
Route::get('users/car',[UsersController::class,'usersCar'])->name('users.car');
Route::get('users/machine',[UsersController::class,'usersMachine'])->name('users.machine');
Route::get('users/truck',[UsersController::class,'usersTruck'])->name('users.truck');
Route::get('users/general',[UsersController::class,'usersGeneral'])->name('users.general');
//================================== USER CRUD CAR
Route::get('users/add_car',UsersController::class.'@add_Car')->name('users.addCar');
Route::post('users/store_car',UsersController::class.'@store_Car')->name('users.storeCar');
Route::get('users/show_car/{id}',UsersController::class.'@show_Car')->name('users.showCar');
Route::get('users/edit_car/{id}',UsersController::class.'@edit_Car')->name('users.editCar');
Route::post('users/update_car/{id}',UsersController::class.'@update_Car')->name('users.updateCar');
Route::post('users/delete_car/{id}',UsersController::class.'@delete_Car')->name('users.deleteCar');
//================================== USER CRUD Machine
Route::get('users/add_machine',UsersController::class.'@add_Machine')->name('users.addMachine');
Route::post('users/store_machine',UsersController::class.'@store_Machine')->name('users.storeMachine');
Route::get('users/show_machine/{id}',UsersController::class.'@show_Machine')->name('users.showMachine');
Route::get('users/edit_machine/{id}',UsersController::class.'@edit_Machine')->name('users.editMachine');
Route::post('users/update_machine/{id}',UsersController::class.'@update_Machine')->name('users.updateMachine');
Route::post('users/delete_machine/{id}',UsersController::class.'@delete_Machine')->name('users.deleteMachine');
//================================== USER CRUD Truck
Route::get('users/add_truck',UsersController::class.'@add_Truck')->name('users.addTruck');
Route::post('users/store_truck',UsersController::class.'@store_Truck')->name('users.storeTruck');
Route::get('users/show_truck/{id}',UsersController::class.'@show_Truck')->name('users.showTruck');
Route::get('users/edit_truck/{id}',UsersController::class.'@edit_Truck')->name('users.editTruck');
Route::post('users/update_truck/{id}',UsersController::class.'@update_Truck')->name('users.updateTruck');
Route::post('users/delete_truck/{id}',UsersController::class.'@delete_Truck')->name('users.deleteTruck');
//================================== USER CRUD General
Route::get('users/add_general',UsersController::class.'@add_General')->name('users.addGeneral');
Route::post('users/store_general',UsersController::class.'@store_General')->name('users.storeGeneral');
Route::get('users/show_general/{id}',UsersController::class.'@show_General')->name('users.showGeneral');
Route::get('users/edit_general/{id}',UsersController::class.'@edit_General')->name('users.editGeneral');
Route::post('users/update_general/{id}',UsersController::class.'@update_General')->name('users.updateGeneral');
Route::post('users/delete_general/{id}',UsersController::class.'@delete_General')->name('users.deleteGeneral');
//================================== USER Expire
Route::get('users/expire',UsersController::class.'@expire')->name('users.expire');
Route::get('users/data_expire_car/{id}',UsersController::class.'@show_car_expire')->name('users.expireCar');
Route::get('users/data_expire_machine/{id}',UsersController::class.'@show_machine_expire')->name('users.expireMachine');
Route::get('users/data_expire_truck/{id}',UsersController::class.'@show_truck_expire')->name('users.expireTruck');
Route::get('users/data_expire_general/{id}',UsersController::class.'@show_general_expire')->name('users.expireGeneral');

//================================== USER Expire EDITER
Route::post('users/clear_car/{id}',UsersController::class.'@Clear_Car')->name('users.clearCar');
Route::post('users/clear_machine/{id}',UsersController::class.'@Clear_Machine')->name('users.clearMachine');
Route::post('users/clear_truck/{id}',UsersController::class.'@Clear_Truck')->name('users.clearTruck');
Route::post('users/clear_general/{id}',UsersController::class.'@Clear_General')->name('users.clearGeneral');


