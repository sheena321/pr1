<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>with model insert,showing ,deleting andupdate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</head>
<body>
    <form action="" method="post">
    @csrf
        <label for="">username</label>
        <input type="text" name="name" id="">
        <label for="">password</label>
        <input type="text" name="psw" id="">
        <label for="">email</label>
        <input type="text" name="email" id="">
        <button type="submit">submit</button>
    </form>
    <!-- @if(isset($key1_value))
    {{"success"}}
    @endif -->


    <table class="table">

  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">uname</th>
      <th scope="col">password</th>
      <th scope="col">email</th>
      <th scope="col">action</th>
    </tr>
</thead>
    @foreach($key1_value as $i) 
    <tr>
        <td>{{$i->id}}</td>
<td>{{$i->uname}}</td>
<td>{{$i->password}}</td>
<td>{{$i->email}}</td>
<td><a href="{{url('delete')}}/{{$i->id}}">delete</a></td>
<td><a href="{{url('update')}}/{{$i->id}}">update</a></td>
    </tr>
    @endforeach

  
</table>

<a href="{{url('logout')}}">logout</a>
    
</body>
</html>