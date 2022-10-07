<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HoldingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MomDetailController;
use App\Http\Controllers\MomdescriptionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SbuController;
use App\Http\Controllers\SubholdingController;
use App\Http\Controllers\JenisMomController;
use App\Http\Controllers\MomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

//=== L O G I N ===
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
//=== L O G O U T ===
Route::post('/logout', [LoginController::class, 'logout']);

// report+admin+sysdev
Route::group(['middleware' => ['auth', 'level:report,admin,sysdev']], function () {
    //dashboard
    Route::get('/dashboard', [DataController::class, 'dashboard'])->name('dashboard');

    // Report
    Route::get('/momreport', [ReportController::class, 'index']);

    // profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/editprofile/{user}', [ProfileController::class, 'editprofile']);
    Route::put('/changepassword', [ProfileController::class, 'changepassword']);
    Route::put('/changeprofile', [ProfileController::class, 'changeprofile']);
});

// admin+sysdev
Route::group(['middleware' => ['auth', 'level:admin,sysdev']], function () {
    //=== M O M ===
    Route::resource('/mom', MomController::class);
    Route::get('/tambahdetail/{mom}', [MomController::class, 'addDetail']);
    Route::post('/storedetail/{mom}', [MomController::class, 'storeDetail']);
    Route::get('/adddoc/{mom}', [MomController::class, 'addDoc']);
    Route::post('/storedoc/{mom}', [MomController::class, 'storeDoc']);

    //=== M O M   D E T A I L ===
    Route::resource('/momdetail', MomDetailController::class, [
        'parameters' => [
            'momdetail' => 'detailmom'
        ]
    ]);

    //== M O M   D E S C R I P T I O N ==
    Route::get('/momdescription', [MomdescriptionController::class, 'index']);
});

// sysdev
Route::group(['middleware' => ['auth', 'level:sysdev']], function () {

    //Sub Holding
    Route::resource('/subholding', SubholdingController::class);

    // SBU
    Route::resource('/sbu', SbuController::class);
    //=== B R A N C H ===
    Route::resource('/branch', BranchController::class);

    //=== J E N I S   M O M ===
    Route::resource('/jenismom', JenisMomController::class);

    // User
    Route::resource('/user', UsersController::class);
    Route::get('/detailuser/{user}', [UsersController::class, 'detailuser']);

    // group
    Route::resource('/group', GroupController::class);
});
