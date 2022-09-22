<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MomDetailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SbuController;
use App\Http\Controllers\SubholdingController;
use App\Http\Controllers\JenisMomController;
use App\Http\Controllers\MomController;
use App\Http\Controllers\MomdescriptionController;

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

//Test
Route::get('/profile', function () {
    return view('/profile', ['title' => 'Profile']);
});

//=== R E G I S T E R ===
Route::post('/register', [RegisterController::class, 'store']);

//=== L O G I N ===
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

//=== L O G O U T ===
Route::get('/logout', [LoginController::class, 'logout']);

//===== A U T H E N T I C A T I O N =====
Route::middleware([auth::class])->group(function () {
    Route::get('/register', [RegisterController::class, 'index']);

    //=== D A S H B O A R D ===
    Route::get('/dashboard', [DataController::class, 'dashboard']);

    //=== S U B   H O L D I N G ===
    Route::resource('/subholding', SubholdingController::class);

    //=== S B U ===
    Route::resource('/sbu', SbuController::class);

    //=== B R A N C H ===
    Route::resource('/branch', BranchController::class);

    //=== J E N I S   M O M ===
    Route::resource('/jenismom', JenisMomController::class);

    //=== M O M ===
    Route::resource('/mom', MomController::class);
    Route::get('/tambahdetail/{mom}', [MomController::class, 'addDetail']);
    Route::post('/storedetail/{mom}', [MomController::class, 'storeDetail']);

    //=== M O M   D E T A I L ===
    Route::resource('/momdetail', MomDetailController::class, [
        'parameters' => [
            'momdetail' => 'detailmom'
        ]
    ]);

    //== M O M   D E S C R I P T I O N ==
    Route::get('/momdescription', [MomdescriptionController::class, 'index']);
});
