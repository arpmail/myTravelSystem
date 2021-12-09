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
                <td style="padding:20px;">Name</td>
                <td style="padding:20px;">Email</td>
                <td style="padding:20px;">Number Phone</td>
                <td style="padding:20px;">Update</td>
                <td style="padding:20px;">Delete</td>
            </tr>

            @foreach($data as $user)
            <tr align=center style="background-color:black; ">
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td><a class="btn btn-primary" href="{{url('updateuser', $user->id)}}">Update</td>
                <td><a class="btn btn-danger" href="{{url('deleteuser', $user->id)}}">Delete</td>
            </tr>
            @endforeach
        </table>

        </div>
    </div>
    
    @include('admin.script')
  </body>
</html>