<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;

class ajax_controller extends Controller
{
    function ajx_insert(Request $req){
        $name=$req->name1;
        $password=$req->pass1;
         $email=$req->email1;
         echo $name;
         DB::table('ajx_tbl')->insert([
            'name'=> $name,
            'password'=>$password,
            'email'=>$email
         ]);

    }


    function ajx_retrive(){
        $data1=DB::table('ajx_tbl')->get();
        return Response::json(array('data'=>$data1));
    }


    function ajx_delete(Request $req){
        $passing_id1=$req->passing_id;
        $del_data=DB::table('ajx_tbl')->where('id',$passing_id1)->delete();
    }

    function ajx_
}