<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HoldingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MomDetailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SbuController;
use App\Http\Controllers\SubholdingController;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\BranchController;


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
Route::get('/register', [DataController::class, 'register']);
Route::get('/branch', [BranchController::class, 'index']);
Route::get('/detailbranch/{Branch}', [BranchController::class, 'detailBranch']);

//Branches
Route::get('/createbranch', [BranchController::class, 'createBranch']);
Route::post('/storedata',[BranchController::class,'storedata']);
Route::get('/editbranch', [BranchController::class, 'editBranch']);
Route::get('/branch', [DataController::class, 'branch']);

// SBU
// Route::get('/sbu', [SbuController::class, 'sbu']);
// Route::post('/sbu/create', [SbuController::class, 'store']);
// Route::put('/sbu/update/{sbu}', [SbuController::class, 'update']);

Route::resource('/sbu', SbuController::class);

//Sub Holding
Route::get('/subholding', [SubholdingController::class, 'subholding']);
Route::post('/tambahsubholding', [SubholdingController::class, 'store']);
Route::get('/deletesubholding/{id}', [SubholdingController::class, 'destroy']);

//Momdetail
Route::get('/momdetail', [MomDetailController::class, 'index']);
Route::get('/createmomdetail', [MomDetailController::class, 'create']);
Route::get('/editmomdetail', [MomDetailController::class, 'show']);
Route::get('/moremomdetail', [MomDetailController::class, 'moreMomDetail']);

// tes sub holding
// Route::get('/subs', [SubholdingController::class, 'create']);

// login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
// register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// testing modal for holding
Route::resource('holding', HoldingController::class);
