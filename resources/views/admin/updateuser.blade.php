<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">
    @include('admin.css')

    <style type="text/css">

        .title
        {
            color:white; 
            padding-top: 25px; 
            font-size: 25px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }
    </style>
  </head>
  <body>

    @include('admin.sidebar')
      

    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title">Update User</h1>

            @if(session()->has('message'))
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}
            </div>
            @endif    
            <form action="{{url('updateuser2',$data->id)}}" method="post" enctype="multipart/form-data">

            @csrf
                <div style="padding: 15px;">
                    <label>Name</label>
                    <input style="color:black;" type="text" name="name" value="{{$data->name}}" required="">
                </div>

                <div style="padding: 15px;">
                    <label>Email</label>
                    <input style="color:black;" type="text" name="email" value="{{$data->email}}" required="">
                </div>

                <div style="padding: 15px;">
                    <label>Phone Number</label>
                    <input style="color:black;" type="text" name="phone" value="{{$data->phone}}" required="">
                </div>

                <div style="padding: 15px;">
                    <input class="btn btn-success" type="submit">
                </div>
            </form>

        </div>
    </div>
    
    @include('admin.script')
  </body>
</html>