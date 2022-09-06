<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MomDetailController;
use App\Http\Controllers\SbuController;
use App\Http\Controllers\SubholdingController;
use Illuminate\Routing\RouteRegistrar;

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
Route::get('/dashboard', [DataController::class, 'dashboard']);
Route::get('/branch', [DataController::class, 'branch']);
Route::get('/detailbranch', [DataController::class, 'detailBranch']);
Route::get('/createbranch', [DataController::class, 'createBranch']);
Route::get('/editbranch', [DataController::class, 'editBranch']);

// SBU
Route::get('/sbu', [SbuController::class, 'sbu']);
// Route::get('/coba', [SbuController::class, 'index']);
Route::post('/csbu', [SbuController::class, 'store']);
//Momdetail
Route::get('/momdetail', [MomDetailController::class, 'index']);
Route::get('/createmomdetail', [MomDetailController::class, 'create']);
Route::get('/editmomdetail', [MomDetailController::class, 'show']);
Route::get('/moremomdetail', [MomDetailController::class, 'moreMomDetail']);

// tes sub holding
// Route::get('/subs', [SubholdingController::class, 'create']);

// login and register
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [DataController::class, 'register']);