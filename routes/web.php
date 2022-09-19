<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('dashboard');
});

Route::get('dashboard',[EmployeeController::class,'home'])->Name('dashboard');

Route::get('employee-create',[EmployeeController::class,'create'])->Name('employee.create');
Route::post('employee-store',[EmployeeController::class,'store'])->Name('employee.store');

Route::get('employee-edit/{id}',[EmployeeController::class,'edit'])->Name('employee.edit');
Route::post('employee-update/{id}',[EmployeeController::class,'update'])->Name('employee.update');

Route::get('employee-index',[EmployeeController::class,'index'])->Name('employee.index');

Route::get('employee-profile/{id}',[EmployeeController::class,'profile'])->Name('employee.profile');

Route::get('employee-delete/{id}',[EmployeeController::class,'destroy'])->Name('employee.delete');
