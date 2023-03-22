<?php

use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\DeptLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\complainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\viewDetailsController;
use App\Http\Controllers\ResetPasswardController;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/login', [CustomerLoginController::class, 'index'])->name('login');
Route::post('/login', [CustomerLoginController::class, 'login'])->middleware('customerLogin');

Route::get('send-verify-email/{email}', [EmailController::class, 'sendVerifyMail']);
Route::get('verify/{tokan}', [EmailController::class, 'VerifyMail']);
Route::get('resend-verify-email/{email}', [EmailController::class, 'resendVerifyMailView']);
Route::post('resend-verify-email/{email}', [EmailController::class, 'resendVerifyMail']);

Route::post('/reset-email', [EmailController::class, 'resetMail']);

Route::get('/reset-pass', [ResetPasswardController::class, 'resetPassView']);
Route::post('/reset-pass', [ResetPasswardController::class, 'resetPassSend']);
Route::get('/reset-pass/{cid}/{tokan}', [ResetPasswardController::class, 'resetPassEnter']);
Route::post('/reset-pass/{cid}/{tokan}', [ResetPasswardController::class, 'resetPass']);

Route::get('/login/dash/', [CustomerLoginController::class, 'dash'])->middleware('guard', 'VerifiedEmail');
Route::post('/login/dash/', [complainController::class, 'complain']);
Route::get('/login/dash/view', [CustomerLoginController::class, 'viewComp'])->middleware('guard');
Route::post('/login/dash/view', [CustomerLoginController::class, 'viewComp'])->middleware('guard');
Route::get('/login/dash/view/details/{comp_id}', [viewDetailsController::class, 'detailView'])->name('detail.view')->middleware('guard');

Route::get('/adlogin', [AdminLoginController::class, 'index']);
Route::post('/adlogin', [AdminLoginController::class, 'adlogin']);

Route::get('/adlogin/addash', [AdminLoginController::class, 'adhome'])->middleware('guard');
Route::get('/adlogin/addash/view', [AdminLoginController::class, 'addash'])->middleware('guard');
Route::get('/adlogin/addash/view/delete/{id}', [AdminLoginController::class, 'delete'])->name('complain.delete')->middleware('guard');
Route::get('/adlogin/addash/view/edit/{id}', [AdminLoginController::class, 'edit'])->name('complain.edit')->middleware('guard');
Route::post('/adlogin/addash/view/update/{id}', [AdminLoginController::class, 'update'])->name('complain.update')->middleware('guard');

Route::get('/deptlogin', [DeptLoginController::class, 'index']);
Route::post('/deptlogin', [DeptLoginController::class, 'deptlogin'])->middleware('waterdepartment');
Route::get('/deptlogin/deptdash/{de}', [DeptLoginController::class, 'viewdash'])->middleware('guard');
Route::post('/deptlogin/deptdash/{de}', [DeptLoginController::class, 'viewdash'])->middleware('guard');
Route::get('/deptlogin/deptdash/{de}/edit/{id}', [DeptLoginController::class, 'deptedit'])->name('deptcomplain.edit')->middleware('guard');
Route::post('/deptlogin/deptdash/{de}/update/{id}', [DeptLoginController::class, 'deptupdate'])->name('deptcomplain.update')->middleware('guard');

// Route::middleware(['auth', 'waterdepartment'])->get('/deptlogin/deptdash', [DeptLoginController::class, 'deptdash']);

// Route::get('/deptlogin/deptdash', [DeptLoginController::class, 'deptdash']);

Route::get('/logout', function () {
    session()->forget('customer_id');
    session()->forget('dept_id');
    session()->forget('admin_id');
    session()->forget('cid');
    session()->flush();
    return redirect('/login');
})->name('logout');
