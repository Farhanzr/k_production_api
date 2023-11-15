<?php

use App\Http\Controllers\Employee\EmployeeController;
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

Route::get('/welcome', function() {
    return view('welcome');
});

Route::get('/employee-list', [EmployeeController::class, 'index'])->name('employee-list');
Route::get('/add-new-employee', [EmployeeController::class, 'viewRegister'])->name('add-new-employee');
Route::post('/register-employee', [EmployeeController::class, 'store'])->name('register-employee');
Route::get('/edit-employee', [EmployeeController::class, 'edit'])->name('edit-employee');
Route::post('/post-edit', [EmployeeController::class, 'saveEdit'])->name('post-edit');
Route::get('/delete-employee', [EmployeeController::class, 'deleteEmployee'])->name('delete-employee');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
