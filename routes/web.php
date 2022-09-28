<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller1;
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

Route::get('/', function () {
    return view('welcome');
});
//simple laravel without model crud operation....
route::view('reg','registration_form');//if blade is inside a folder then---> route::view('reg','foldername/registration_form')
route::post('reg',[controller1::class,"insertion1"]);
route::view('table_details','table_show');
route::get('table_details',[controller1::class,'display1']);
route::get('delete/{id}',[controller1::class,"delete1"]);
route::get('update/{id}',[controller1::class,"update1"]);
route::post('updated/{id}',[controller1::class,"update2"]);

// login with laravel without model
route::view('login','login_larav');
route::get('login',[controller1::class,"login1"]);
route::get('logout',[controller1::class,"logout1"]);

//file upload(image)
route::view('fileupload','file_upload');
route::post('fileupload',[controller1::class,"file_upload"]);


//laravel with model
route::view('regis_model_pr1','lar_withmodel/regis_form_model');
//insert
route::post('regis_model_pr1',[App\Http\Controllers\controller_with_model::class,"insertion_model"]);

//rertive all data
route::get('regis_model_pr1',[App\Http\Controllers\controller_with_model::class,"getdata_model"]);

//delete
route::get('delete/{id}',[App\Http\Controllers\controller_with_model::class,"deletion_model"]);

//update(rertive dta which is going to update)
route::get('update/{id}',[App\Http\Controllers\controller_with_model::class,"updation_model"]);
route::post('update_new/{id}',[App\Http\Controllers\controller_with_model::class,"updation1_model"]);

//login model
route::view('login','lar_withmodel/login_model');
route::post('login',[App\Http\Controllers\controller_with_model::class,"login_model"]);
route::post('logout',[App\Http\Controllers\controller_with_model::class,"logout_model"]);

//ajax
route::view('ajax_reg','ajax/ajax_reg');
//ajax insertion
route::post('ajax_reg_insert',[App\Http\Controllers\ajax_controller::class,"ajx_insert"]);
//ajax retrive all data
route::get('ajax_reg_retrive',[App\Http\Controllers\ajax_controller::class,"ajx_retrive"]);
//ajax delete
route::post('ajax_reg_delete',[App\Http\Controllers\ajax_controller::class,"ajx_delete"]);




