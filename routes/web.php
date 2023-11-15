<?php

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/employee-list', [EmployeeController::class, 'index']);
Route::get('/edit-employee', [EmployeeController::class, 'edit']);
Route::post('/post-edit-employee', [EmployeeController::class, 'saveEdit']);

Route::get('/', function () {
    return view('welcome');
});
