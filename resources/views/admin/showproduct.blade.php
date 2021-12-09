<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>

    @include('admin.sidebar')
      

    @include('admin.navbar')

    <div style="padding-bottom:30px;" class="container-fluid page-body-wrapper">
        <div class="container" align="center">

        @if(session()->has('message'))
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}
            </div>
        @endif 

        <table>
            <tr align=center style="background-color: grey">
                <td style="padding:20px;">State</td>
                <td style="padding:20px;">Destination</td>
                <td style="padding:20px;">Description</td>
                <td style="padding:20px;">Cov-19 Cases</td>
                <td style="padding:20px;">Image</td>
                <td style="padding:20px;">Update</td>
                <td style="padding:20px;">Delete</td>
            </tr>

            @foreach($data as $product)
            <tr align=center style="background-color:black; ">
                <td>{{$product->state}}</td>
                <td>{{$product->location}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->totalCases}}</td>
                <td>
                    <img height="200" width="200" src="/productimage/{{$product->image}}">
                </td>
                <td><a class="btn btn-primary" href="{{url('updateproduct', $product->id)}}">Update</td>
                <td><a class="btn btn-danger" href="{{url('deleteproduct', $product->id)}}">Delete</td>
            </tr>
            @endforeach
        </table>

        </div>
    </div>
    
    @include('admin.script')
  </body>
</html>