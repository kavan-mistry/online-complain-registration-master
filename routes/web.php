<?php

use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\DeptLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\complainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\viewDetailsController;
use App\Http\Controllers\ResetpasswordController;
use App\Http\Controllers\editProfileController;
use App\Http\Controllers\AdminProblemController;
use App\Http\Controllers\AdminDepartmentController;

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

Route::get('/login', [CustomerLoginController::class, 'index'])->name('login')->middleware('NotReturn');;
Route::post('/login', [CustomerLoginController::class, 'login'])->middleware('customerLogin', 'NotReturn');

Route::get('send-verify-email/{email}', [EmailController::class, 'sendVerifyMail']);
Route::get('verify/{tokan}', [EmailController::class, 'VerifyMail']);
Route::get('resend-verify-email/{email}', [EmailController::class, 'resendVerifyMailView']);
Route::post('resend-verify-email/{email}', [EmailController::class, 'resendVerifyMail']);

Route::post('/reset-email', [EmailController::class, 'resetMail']);

Route::get('/reset-pass', [ResetpasswordController::class, 'resetPassView']);
Route::post('/reset-pass', [ResetpasswordController::class, 'resetPassSend']);
Route::get('/reset-pass/{cid}/{tokan}', [ResetpasswordController::class, 'resetPassEnter']);
Route::post('/reset-pass/{cid}/{tokan}', [ResetpasswordController::class, 'resetPass']);

Route::get('/login/edit_profile', [editProfileController::class, 'edit_profile_view'])->middleware('guard', 'VerifiedEmail');
Route::post('/login/edit_profile', [editProfileController::class, 'edit_profile'])->middleware('guard');

Route::get('/login/dash/', [CustomerLoginController::class, 'dash'])->middleware('guard', 'VerifiedEmail');
Route::post('/login/dash/', [complainController::class, 'complain']);
Route::get('/login/dash/view', [CustomerLoginController::class, 'viewComp'])->middleware('guard', 'VerifiedEmail');
Route::get('/login/dash/view/delete/{id}', [CustomerLoginController::class, 'close'])->name('complain.close')->middleware('guard');
Route::post('/login/dash/view', [CustomerLoginController::class, 'viewComp'])->middleware('guard');
Route::get('/login/dash/view/details/{comp_id}', [viewDetailsController::class, 'detailView'])->name('detail.view')->middleware('guard');

Route::get('/adlogin', [AdminLoginController::class, 'index'])->middleware('NotReturn');;
Route::post('/adlogin', [AdminLoginController::class, 'adlogin']);

Route::get('/adlogin/addash', [AdminLoginController::class, 'adhome'])->middleware('guard');
Route::get('/adlogin/addash/view', [AdminLoginController::class, 'addash'])->middleware('guard');

Route::get('/adlogin/addash/problem_list', [AdminProblemController::class, 'problem_list_view'])->middleware('guard');
Route::post('/adlogin/addash/problem_list', [AdminProblemController::class, 'problem_list_add'])->middleware('guard');
Route::get('/adlogin/addash/problem_list/delete/{id}', [AdminProblemController::class, 'admin_department_delete'])->name('problem_list.delete')->middleware('guard');

Route::get('/adlogin/addash/customer_list', [AdminLoginController::class, 'ad_cust_list'])->middleware('guard');
Route::get('/adlogin/addash/customer_list/block/{id}', [AdminLoginController::class, 'ad_cust_block'])->name('customer.block')->middleware('guard');
Route::get('/adlogin/addash/customer_list/unblock/{id}', [AdminLoginController::class, 'ad_cust_unblock'])->name('customer.unblock')->middleware('guard');
Route::get('/adlogin/addash/customer_list/delete/{id}', [AdminLoginController::class, 'ad_cust_delete'])->name('customer.delete')->middleware('guard');

Route::get('/adlogin/addash/customer_list_blocked', [AdminLoginController::class, 'ad_cust_list_blocked'])->middleware('guard');

Route::get('/adlogin/addash/department', [AdminDepartmentController::class, 'admin_department_view'])->middleware('guard');
Route::post('/adlogin/addash/department', [AdminDepartmentController::class, 'admin_department_add'])->middleware('guard');
Route::get('/adlogin/addash/department/delete/{id}', [AdminDepartmentController::class, 'admin_department_delete'])->name('department.delete')->middleware('guard');

Route::get('/adlogin/addash/view/delete/{id}', [AdminLoginController::class, 'delete'])->name('complain.delete')->middleware('guard');
Route::get('/adlogin/addash/view/edit/{id}', [AdminLoginController::class, 'edit'])->name('complain.edit')->middleware('guard');
Route::post('/adlogin/addash/view/update/{id}', [AdminLoginController::class, 'update'])->name('complain.update')->middleware('guard');

Route::get('/deptlogin', [DeptLoginController::class, 'index'])->middleware('NotReturn');;
Route::post('/deptlogin', [DeptLoginController::class, 'deptlogin'])->middleware('waterdepartment');
Route::get('/deptlogin/deptdash/', [DeptLoginController::class, 'viewdash'])->middleware('guard');
Route::post('/deptlogin/deptdash/', [DeptLoginController::class, 'viewdash'])->middleware('guard');
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
