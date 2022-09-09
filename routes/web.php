<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HoldingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MomDetailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SbuController;
use App\Http\Controllers\SubholdingController;
use App\Http\Controllers\JenisMomController;
use App\Http\Controllers\MomController;
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

Route::get('/dashboard', [DataController::class, 'dashboard']);

//Sub Holding
Route::resource('/subholding', SubholdingController::class);

// SBU
Route::resource('/sbu', SbuController::class);

//Branch
Route::get('/branch', [BranchController::class, 'index']);
Route::get('/detailbranch/{Branch}', [BranchController::class, 'detailBranch']);
Route::get('/editbranch/{Branch}', [BranchController::class, 'edit']);
Route::get('/createbranch', [BranchController::class, 'createBranch']);
Route::post('/store', [BranchController::class, 'store']);
Route::put('/update/{Branch}', [BranchController::class, 'update']);
Route::put('/deletebranch/{Branch}', [BranchController::class, 'destroy']);


//Sub Holding
Route::resource('/subholding', SubholdingController::class);

//Jenis MOM
Route::get('/jenismom', [JenisMomController::class, 'index']);

//MOM
Route::resource('/mom', MomController::class);

//Momdetail
Route::get('/momdetail', [MomDetailController::class, 'index']);
Route::get('/createmomdetail', [MomDetailController::class, 'create']);
// Route::get('/editmomdetail', [MomDetailController::class, 'show']);
Route::get('/moremomdetail', [MomDetailController::class, 'moreMomDetail']);

// login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
// register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// testing modal for holding
Route::resource('holding', HoldingController::class);
