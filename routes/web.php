<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Auth Route
Route::post('login',[AuthContoller::class,'login']);
Route::get('logout',[AuthContoller::class,'logout']);
Route::get('register',[AuthContoller::class,'register']);

// View Route
Route::middleware('validasi')->group(function(){
    Route::get('pesanan',[ViewController::class,'index']);
    Route::get('pesan-layanan',[ViewController::class,'pesanLayanan']);
    Route::get('review',[ViewController::class,'review']);
    Route::get('history',[ViewController::class,'history']);
    Route::get('detail/{id}',[ViewController::class,'edit']);
    Route::get('profile',[ViewController::class,'profile']);
});

// CRUD Route
Route::middleware('validasi')->group(function(){
    Route::post('create-user',[CrudController::class,'createUser']);
    Route::post('pesan-layanan',[CrudController::class,'createPesanan']);
    Route::post('edit-pesanan',[CrudController::class,'updatePesanan']);
    Route::get('confirm/{id}',[CrudController::class,'updatePembayaran']);
    Route::post('edit-user',[CrudController::class,'updateUser']);
    Route::post('create-review',[CrudController::class,'createReview']);
});
