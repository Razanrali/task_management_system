<?php

use App\Http\Controllers\admin\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('auth/login', [\App\Http\Controllers\AuthController::class, 'login']);


Route::middleware(['auth:api'])->group(callback: function (){


    Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout']);

    Route::prefix('admin/department')->group(function (){
    Route::post('/add',[App\Http\Controllers\admin\DepartmentController::class,'store']);
    Route::post('/update/{id}',[App\Http\Controllers\admin\DepartmentController::class,'update']);
    Route::delete('/delete/{id}',[App\Http\Controllers\admin\DepartmentController::class,'destroy']);
    });

    Route::prefix('admin/user')->group(function () {
        Route::post('/add', [\App\Http\Controllers\admin\UserController::class, 'store']);
        Route::put('/update/{user}', [\App\Http\Controllers\admin\UserController::class, 'update']);
        Route::delete('/delete/{user}', [\App\Http\Controllers\admin\UserController::class, 'destroy']);

    });

    Route::prefix('admin/task')->group(function () {
        Route::post('/add', [\App\Http\Controllers\admin\TaskController::class, 'store']);
        Route::put('/update/{task}', [\App\Http\Controllers\admin\TaskController::class, 'update']);
        Route::delete('/delete/{task}', [\App\Http\Controllers\admin\TaskController::class, 'destroy']);

    });

    Route::prefix('admin/meeting')->group(function () {
        Route::post('/add', [\App\Http\Controllers\admin\MeetingController::class, 'store']);
        Route::post('/update/{meet}', [\App\Http\Controllers\admin\MeetingController::class, 'update']);
        Route::delete('/delete/{meet}', [\App\Http\Controllers\admin\MeetingController::class, 'destroy']);

    });

    Route::prefix('leader')->group(function () {
        Route::post('/create', [\App\Http\Controllers\teamleader\LeaderController::class, 'store']);
        //Route::post('/update/{meet}', [\App\Http\Controllers\admin\MeetingController::class, 'update']);


    });



});
