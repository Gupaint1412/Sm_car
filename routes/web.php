<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes();

//--------------------------------- Route Admin
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home',[AdminController::class,'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/car',[AdminController::class,'adminCar'])->name('admin.car')->middleware('is_admin');
Route::get('admin/machine',[AdminController::class,'adminMachine'])->name('admin.machine')->middleware('is_admin');
Route::get('admin/truck',[AdminController::class,'adminTruck'])->name('admin.truck')->middleware('is_admin');
Route::get('admin/general',[AdminController::class,'adminGeneral'])->name('admin.general')->middleware('is_admin');
Route::get('admin/add_car',[AdminController::class,'add_Car'])->name('admin.addCar')->middleware('is_admin');
Route::post('admin/store_car',[AdminController::class,'store_Car'])->name('admin.storeCar')->middleware('is_admin');
Route::get('admin/show_car/{smcar}',AdminController::class.'@show_Car')->name('admin.showCar')->middleware('is_admin');
Route::get('admin/edit_car/{smcar}',AdminController::class.'@edit_Car')->name('admin.editCar')->middleware('is_admin');
Route::get('admin/update_car',[AdminController::class,'update_Car'])->name('admin.updateCar')->middleware('is_admin');

//--------------------------------- Route Users
Route::get('users/home',[UsersController::class,'index'])->name('users.home');
Route::get('users/car',[UsersController::class,'usersCar'])->name('users.car');
Route::get('users/machine',[UsersController::class,'usersMachine'])->name('users.machine');
Route::get('users/truck',[UsersController::class,'usersTruck'])->name('users.truck');
Route::get('users/general',[UsersController::class,'usersGeneral'])->name('users.general');