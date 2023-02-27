<?php

use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\DeptLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\complainController;
use App\Http\Controllers\LoginController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

use function GuzzleHttp\Promise\all;

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

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'register']);

// Route::get('/customer', function(){
//     $customer = Customer::all();
//     echo "<pre/>";
//     print_r($customer->toArray());
// });

Route::get('/login', [CustomerLoginController::class, 'index']);
Route::post('/login', [CustomerLoginController::class, 'login']);

Route::get('/login/dash', [CustomerLoginController::class, 'dash'])->middleware('guard');
Route::post('/login/dash', [complainController::class, 'complain']);
Route::get('/login/dash/view', [CustomerLoginController::class, 'viewComp'])->middleware('guard');

Route::get('/adlogin', [AdminLoginController::class, 'index']);
Route::post('/adlogin', [AdminLoginController::class, 'adlogin']);

Route::get('/adlogin/addash', [AdminLoginController::class, 'adhome'])->middleware('guard');
Route::get('/adlogin/addash/view', [AdminLoginController::class, 'addash'])->middleware('guard');
Route::get('/adlogin/addash/view/delete/{id}', [AdminLoginController::class, 'delete'])->name('complain.delete')->middleware('guard');
Route::get('/adlogin/addash/view/edit/{id}', [AdminLoginController::class, 'edit'])->name('complain.edit')->middleware('guard');
Route::post('/adlogin/addash/view/update/{id}', [AdminLoginController::class, 'update'])->name('complain.update')->middleware('guard');

Route::get('/deptlogin', [DeptLoginController::class, 'index']);
Route::post('/deptlogin', [DeptLoginController::class, 'deptlogin'])->middleware('waterdepartment');
Route::get('/deptlogin/deptdash/{de}', [DeptLoginController::class, 'viewdash']);
Route::get('/deptlogin/deptdash/{de}/edit/{id}', [DeptLoginController::class, 'deptedit'])->name('deptcomplain.edit');
Route::post('/deptlogin/deptdash/{de}/update/{id}', [DeptLoginController::class, 'deptupdate'])->name('deptcomplain.update');

// Route::middleware(['auth', 'waterdepartment'])->get('/deptlogin/deptdash', [DeptLoginController::class, 'deptdash']);

// Route::get('/deptlogin/deptdash', [DeptLoginController::class, 'deptdash']);

Route::get('/logout', function () {
    session()->forget('customer_id');
    session()->forget('dept_id');
    session()->forget('admin_id');
    return redirect('/login');
});
