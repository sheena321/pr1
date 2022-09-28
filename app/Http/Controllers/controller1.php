<?php
// SIMPLE LARAVEL CONTROLLER WITHOUT USING MODEL
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class controller1 extends Controller
{
    function insertion1(Request $req){
        $name1=$req->name;
        $pass1=$req->psw;
        $email1=$req->email;
        var_dump($name1) ;
        DB::table("regis")->insert([
            'name'=>$name1,
            'password'=>$pass1,
            'email'=>$email1
        ]);

return redirect('reg');//return redirect contain url
    }


function display1(){
    $whole_data=DB::table("regis")->get();
    // print_r($whole_data);
    return view('table_show',['key_value'=>$whole_data]);  //return view contain a blade name
}



function delete1($id){
    DB::table("regis")->where("id",$id)->delete();
    $whole_data=DB::table("regis")->get();
    return view('table_show',['key_value'=>$whole_data]);
}


function update1($id){
  $dataTo_update=DB::table("regis")->where("id",$id)->first();
//   print_r($dataTo_update);
  return view("update_reg_larav",['key_value1'=>$dataTo_update]);  
}


function update2(Request $req,$id){
    $name=$req->name1;
    $pass=$req->psw1;
    $email=$req->email1;
    DB::table("regis")->where("id",$id)->update([
        'name'=>$name,
        'password'=>$pass,
        'email'=>$email
    ]);
    return redirect("table_details");
}


function login1(Request $req){
    $email=$req->email1;
    $pass=$req->password1;
    $login_recored=DB::table("regis")->where("email",$email)->first();
    // print_r($login_recored);
    if(is_null($login_recored)){
        $msg="no elments";
        return view('login_larav',['key_chk_login'=>$msg]);
    }
    elseif($login_recored->email==$email && $login_recored->password==$pass){
        $req->session()->put("session_name1",$login_recored->id);
        echo "login";
        return redirect("table_details");

    }else{
        $msg="password is wrong";
    
        return view('login_larav',['key_chk_login'=>$msg]);
    }

}


function logout1(Request $req){

session()->forget("session_name1"); 
echo "logout"; 
return redirect("login");
}

//file(image)upload
function file_upload(Request $req){
$name=$req->name1;
$email=$req->email1;
$img1="img".time().".".$req->file1->getClientOriginalExtension();
// echo $img1;
DB::table("file_upload1")->insert([
    'name'=>$name,
    'email'=>$email,
    'file1'=>$img1
]);
$req->file1->storeAs("public/img_file",$img1);
$mg="insert successfully";
return view('file_upload',['key_value_file_msg'=>$mg]);
}//php artisan storage:link is the command to lik storage->image folder to public->imge folder

}
