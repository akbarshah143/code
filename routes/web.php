<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\BankNameController;
use App\Http\Controllers\Admin\BankBranchesController;
use App\Http\Controllers\Admin\DdoController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\FundController;
use App\Http\Controllers\Admin\GroupInsuranceRateController;
use App\Http\Controllers\Admin\SdepObjectController;
use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\Admin\RelationController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\BeneficiaryController;
use App\Http\Controllers\Admin\DocumentController;


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


Auth::routes();


Route::resource('index/ddos',DdoController::class);
Route::resource('index/users',UserController::class);
Route::resource('index/roles',RoleController::class);
Route::resource('index/banks',BankNameController::class);
Route::resource('index/branches',BankBranchesController::class);
Route::resource('index/district',DistrictController::class);
Route::resource('index/funds',FundController::class);
Route::resource('index/grouprate',GroupInsuranceRateController::class);
Route::resource('index/title',SdepObjectController::class);
Route::resource('index/relation',RelationController::class);
Route::resource('index/employees',EmployeesController::class);


Route::get('/index/employees/beneficiary/documents/{id}',[App\Http\Controllers\Admin\BeneficiaryController::class,'Document']);
Route::POST('/index/employees/beneficiary/documents/{id}',[App\Http\Controllers\Admin\BeneficiaryController::class,'SaveDocument'])->name('beneficiary');
Route::patch('/index/employees/beneficiary/documents/{id}',[App\Http\Controllers\Admin\BeneficiaryController::class,'Upload']);

Route::post('/index/employees/beneficiary/create/{id}',[App\Http\Controllers\Admin\BeneficiaryController::class,'store']);

Route::get('/index/employees/beneficiary/create/{id}',[App\Http\Controllers\Admin\BeneficiaryController::class,'create']);

Route::resource('index/documents',DocumentController::class);
Route::post('/index/employees/beneficiary/bank',[App\Http\Controllers\Admin\BeneficiaryController::class,'bank']);

//Route::POST('/index/employees/beneficiary/create/{id}','App\Http\Controllers\Admin\BenificiaryStaticController@store');
Route::get('index/employee/numbers',[App\Http\Controllers\HomeController::class, 'numbers']);
Route::get('index/employee/cnicnumbers',[App\Http\Controllers\HomeController::class, 'cnicnumbers']);
Route::POST('index/funds/funds',[App\Http\Controllers\HomeController::class, 'fetch']);


Route::POST('index/funds/fund',[App\Http\Controllers\HomeController::class, 'bank']);



Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);
//Language Translation

Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');
