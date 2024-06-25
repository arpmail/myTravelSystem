<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;


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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

route::get('/redirect',[HomeController::class,'redirect']);

route::get('/',[HomeController::class,'index']);

route::get('/allstate',[HomeController::class,'allstate']);

route::get('/state/{state}',[HomeController::class,'state']);

route::get('/risk/{state}',[HomeController::class,'risk']);

route::get('/high/{state}',[HomeController::class,'high']);

route::get('/low/{state}',[HomeController::class,'low']);

route::get('/preference',[HomeController::class,'preference']);

route::get('/pref',[HomeController::class,'pref']);

route::get('/updateUser/{email}',[HomeController::class,'updateUser']);




route::get('/product',[AdminController::class,'product']);

route::post('/uploadproduct',[AdminController::class,'uploadproduct']);

route::get('/showproduct',[AdminController::class,'showproduct']);

route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);

route::get('/updateproduct/{id}',[AdminController::class,'updateproduct']);

route::post('/updateproduct2/{id}',[AdminController::class,'updateproduct2']);

route::get('/showuser',[AdminController::class,'showuser']);

route::get('/deleteuser/{id}',[AdminController::class,'deleteuser']);

route::get('/updateuser/{id}',[AdminController::class,'updateuser']);

route::post('/updateuser2/{id}',[AdminController::class,'updateuser2']);

route::get('/cron',[AdminController::class,'cron']);

route::post('/covid',[AdminController::class,'covid']);

route::post('/travel',[AdminController::class,'travel']);



