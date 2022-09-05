<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MomDetailController;
use App\Http\Controllers\SbuController;
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
Route::get('/createbranch', [DataController::class, 'createBranch']);
Route::get('/editbranch', [DataController::class, 'editBranch']);

// SBU
Route::get('/sbu', [SbuController::class, 'sbu']);
//Momdetail
Route::get('/momdetail', [MomDetailController::class, 'index']);
Route::get('/createmomdetail', [MomDetailController::class, 'create']);
Route::get('/editmomdetail', [MomDetailController::class, 'show']);
Route::get('/moremomdetail', [MomDetailController::class, 'moreMomDetail']);
