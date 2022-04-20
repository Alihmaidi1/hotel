<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users\user as userController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\customers\customer;
use App\Http\Controllers\types\type;
use App\Http\Controllers\status\status;
use App\Http\Controllers\services\service;
use App\Http\Controllers\rooms\room;
use App\Http\Controllers\transactions\transaction;
use App\Http\Controllers\charts\chart;
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
    return view('auth.login');
});


Route::post("/postLogin",[userController::class,"login"]);
Route::get("/dashborad",[dashboard::class,"index"]);

Route::get("/user.index",[userController::class,"index"])->name("user.index");
Route::get("user.create",[userController::class,"create"])->name("user.create");
Route::post("user.store",[userController::class,"store"])->name("user.store");
Route::get("user.edit/{id}",[userController::class,"edit"])->name("user.edit");
Route::post("user.update",[userController::class,"update"])->name("user.update");
Route::get("user.delete/{id}",[userController::class,"delete"])->name("user.delete");




Route::get("/customer.index",[customer::class,"index"])->name("customer.index");
Route::get("customer.create",[customer::class,"create"])->name("customer.create");
Route::post("customer.store",[customer::class,"store"])->name("customer.store");
Route::get("customer.edit/{id}",[customer::class,"edit"])->name("customer.edit");
Route::post("customer.update",[customer::class,"update"])->name("customer.update");
Route::get("customer.delete/{id}",[customer::class,"delete"])->name("customer.delete");
Route::get("customer.show/{id}",[customer::class,"show"])->name("customer.show");



Route::get("type.index",[type::class,"index"])->name("type.index");
Route::get("type.create",[type::class,"create"])->name("type.create");
Route::post("type.store",[type::class,"store"])->name("type.store");
Route::get("type.edit/{id}",[type::class,"edit"])->name("type.edit");
Route::post("type.destroy/{id}",[type::class,"delete"])->name("type.destroy");
Route::post("type.update",[type::class,"update"])->name("type.update");



Route::get("status.index",[status::class,"index"])->name("status.index");
Route::get("roomstatus.create",[status::class,"create"])->name("roomstatus.create");
Route::post("roomstatus.store",[status::class,"store"])->name("roomstatus.store");
Route::get("roomstatus.edit/{id}",[status::class,"edit"])->name("roomstatus.edit");
Route::post("roomstatus.destroy/{id}",[status::class,"destroy"])->name("roomstatus.destroy");
Route::post("roomstatus.update",[status::class,"update"])->name("roomstatus.update");



Route::get("service.index",[service::class,"index"])->name("service.index");
Route::get("service.create",[service::class,"create"])->name("service.create");
Route::post("service.store",[service::class,"store"])->name("service.store");
Route::get("service.edit/{id}",[service::class,"edit"])->name("service.edit");
Route::post("service.destroy/{id}",[service::class,"destroy"])->name("service.destroy");
Route::post("service.update",[service::class,"update"])->name("service.update");



Route::get("room.index",[room::class,"index"])->name("room.index");
Route::get("room.create",[room::class,"create"])->name("room.create");
Route::post("room.store",[room::class,"store"])->name("room.store");
Route::get("room.edit/{id}",[room::class,"edit"])->name("room.edit");
Route::post("room.destroy/{id}",[room::class,"destroy"])->name("room.destroy");
Route::post("room.update",[room::class,"update"])->name("room.update");



Route::get("transaction.index",[transaction::class,"index"])->name("transaction.index");
Route::get("transaction.create",[transaction::class,"create"])->name("transaction.create");
Route::get("transaction.reservation.viewCountPerson/{id}",[transaction::class,"viewCountPerson"])->name("transaction.reservation.viewCountPerson");
Route::post("transaction.reservation.chooseRoom",[transaction::class,"chooseRoom"])->name("transaction.reservation.chooseRoom");
Route::get("transaction.reservation.confirmation/{customer}/{room}/{from}/{to}",[transaction::class,"confirm"])->name("transaction.reservation.confirmation");
Route::post("transaction.store",[transaction::class,"store"])->name("transaction.store");
Route::get("payment.create/{id}",[transaction::class,"storePayment"])->name("payment.create");
Route::post("payment.store",[transaction::class,"storePayment1"])->name("payment.store");



Route::get("/getchartperweek",[chart::class,"getchartperweek"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
