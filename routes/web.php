<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('employee.index');
});

Route::get('/employee',[EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create',[EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/store',[EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/{id}/edit',[EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employee/{id}/update',[EmployeeController::class, 'update'])->name('employee.update');
Route::post('/employee/{id}/destroy',[EmployeeController::class, 'destroy'])->name('employee.destroy');


