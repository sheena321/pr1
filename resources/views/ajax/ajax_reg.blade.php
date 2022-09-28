<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!--CDN JQUERY-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body onload="retrive_all()">
        <label for="">username</label>
        <input type="text" name="name" id="name">
        <label for="">password</label>
        <input type="text" name="psw" id="psw">
        <label for="">email</label>
        <input type="text" name="email" id="email">
        <button type="submit" id="submit" >submit</button>
<br><br>
<table border=1 id="t1">
    <tr>
        <th>id</th>
        <th>username</th>
        <th>Password</th>
        <th>email</th>
    </tr>
</table>
        <script>

        //to handle csrf  problems
        $.ajaxSetup({
                     headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
         });
    $("#submit").click(function(){
        $.ajax({
            url:'ajax_reg_insert',
            type:'POST',
            data:{
                name1:$("#name").val(),
                pass1:$("#psw").val(),
                 email1:$("#email").val()
            },
            success:function(){
              alert("inserted");
            }
        })
    })
    function retrive_all(){
    
        $.ajax({
            url:'ajax_reg_retrive',
            type:'GET',
            success:function(Response){
                rec_all=Response.data;
                for(i=0;i<Response.data.length;i++){
                    alert("hai");
                    $("#t1").append("<tr><td>"+rec_all[i].id+"</td><td>"+rec_all[i].name+"</td><td>"+rec_all[i].password+"</td><td>"+rec_all[i].email+"</td><td><button onclick='delete1("+rec_all[i].id+")'>delete</button><button onclick='update1("+rec_all[i].id+")'>update</button></tr>");
                }
            }
        })
    }
    function delete1(id){
        alert(id);
        $.ajax({
            url:'ajax_reg_delete',
            type:'POST',
            data:{
                passing_id:id
        
            },
            success:function(Response){
                data_retrive();
            }
        })    
    }

    function update1(id){
        $.ajax({
            url:'ajax_reg_update',
            type:'GET',
            data:{
                passing_id:id
        
            },
            success:function(Response){
                data_retrive();
            }
        })    
    }
    



        </script>
</body>
</html>