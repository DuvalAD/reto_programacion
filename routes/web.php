<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    if(Auth::check()) return redirect()->route('home');
    return redirect()->route('login');
});

// Auth::routes();
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class,'index'])->name('home');

    //################# EMPLOYEE
        Route::get('/employee', [EmployeeController::class,'view'])->name('employee.view');
        //CREATE
        Route::get('/employee/create', [EmployeeController::class,'viewCreate'])->name('employee.view.create');
        Route::post('/employee/create', [EmployeeController::class,'createPost'])->name('employee.create');
        //EDIT
        Route::get('/employee/edit/{id}', [EmployeeController::class,'viewEdit'])->name('employee.edit');
        Route::post('/employee/edit', [EmployeeController::class,'editPost'])->name('employee.edit.post');
        //DELETE
        Route::get('/employee/delete/{id}', [EmployeeController::class,'delete'])->name('employee.delete');
    //==================================

    //################# PERFIL
        Route::get('/user/profile', [ProfileController::class,'view'])->name('user.perfil.view');
        Route::post('/user/profile/edit', [ProfileController::class,'editProfile'])->name('user.perfil.edit');
    //==================================

    //################# CAMBIO CONTRASENA
        Route::get('/user/password', [ProfileController::class,'viewPassword'])->name('user.password.view');
        Route::post('/user/password/edit', [ProfileController::class,'editPassword'])->name('user.password.edit');
    //==================================
});
