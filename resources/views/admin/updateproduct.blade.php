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
            <h1 class="title">Add Product</h1>

            @if(session()->has('message'))
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}
            </div>
            @endif    
            <form action="{{url('updateproduct2',$data->id)}}" method="post" enctype="multipart/form-data">

            @csrf
                <div style="padding: 15px;">
                    <label>Product State</label>
                    <input style="color:black;" type="text" name="state" value="{{$data->state}}" required="">
                </div>

                <div style="padding: 15px;">
                    <label>Product Location</label>
                    <input style="color:black;" type="text" name="location" value="{{$data->location}}" required="">
                </div>

                <div style="padding: 15px;">
                    <label>Product Description</label>
                    <input style="color:black;" type="text" name="description" value="{{$data->description}}" required="">
                </div>

                <div style="padding: 15px;">
                    <label>Total Covid-19 Cases</label>
                    <input style="color:black;" type="text" name="totalCases" value="{{$data->totalCases}}" required="">
                </div>

                <div style="padding: 15px;">
                    <label>Old Image</label>
                    <img height="200" width="200" src="/productimage/{{$data->image}}">
                </div>

                <div style="padding: 15px;">
                    <label>Change The Image</label>
                    <input type="file" name="file">
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