<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;




Route::middleware('auth')->group(function (){
    Route::redirect("/", "company");

    Route::resource('company', CompanyController::class);

    
    Route::view('/add_company', 'companies.add_company')->name('add_company');
    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    

    Route::resource('employee', EmployeeController::class);
    Route::view('/add_employee', 'employees.add_employee')->name('add_employee');
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');

    Route::post('/logout', [AuthController::class,'logout'])->name('logout');

});

Route::middleware('guest')->group(function (){

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class,'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class,'login']);

});