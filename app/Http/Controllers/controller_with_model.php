<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\regis1;

class controller_with_model extends Controller
{
 function insertion_model(Request $req){
    $name1=$req->name;
    $pass1=$req->psw;
    $email1=$req->email;
    $ob1=new regis1(['uname'=>$name1,
'password'=>$pass1,
'email'=>$email1]);
$ob1->save();
return redirect('regis_model_pr1');
}


function getdata_model(Request $req){
    $ret_data=regis1::get();
    return view('lar_withmodel/regis_form_model',['key1_value'=>$ret_data]);
}

function deletion_model($id){
regis1::find($id)->delete();

$ret_data=regis1::get();
    return view('lar_withmodel/regis_form_model',['key1_value'=>$ret_data]);

}



function updation_model($id){
$upt_data=regis1::find($id);
return view('lar_withmodel/update_model_form',['key2_value'=>$upt_data]);
}

function updation1_model(Request $req,$id){
    $name1=$req->name;
    $psw1=$req->psw;
    $email1=$req->email;
regis1::find($id)->update([
'uname'=>$name1,
'password'=>$psw1,
'email'=>$email1
]);
return redirect('regis_model_pr1');
}


function login_model(Request $req){
$email=$req->email1;
$psw=$req->psw1;
$record=regis1::where('email',$email)->first();
// echo $record;
if(is_null($record)){
    echo "no elements";
}
elseif($record->email==$email && $record->password==$psw)
{
    return redirect('regis_model_pr1');
}elseif(!$record->password==$psw){
    echo "wrong password";
}  
}


function logout_model(){
    return redirect('login');
}
}
