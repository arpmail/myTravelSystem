<!DOCTYPE html>
<html lang="en">

  <head>
  <base href="/public">
  @include('user.css')

  </head>

  <body>

    @include('user.nav')

    <div class="page-heading about-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Best Destination</h4>
              <h2>Make a perfect choice!</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Destinations</h2>
              <a href="">All state</i></a>
            </div>
          </div>
          
          @foreach($data as $destination)

          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('location',$destination->id)}}"><img height="300" width="300" src="{{$destination->descImage}}" alt=""></a>
              <div class="down-content">
                <a href="{{url('location',$destination->id)}}"><h4>{{$destination->destname}}</h4></a>
                <p><b>Price: RM{{$destination->destPrice}} Per Night</b></p>
                
                <details>
                  <summary>Description</summary>
                  <p>{{$destination->destDesc}}</p>
                </details>
              </div>
            </div>
          </div>

          @endforeach



        </div>
      </div>
    </div>


    @include('user.footernjs')
    
  </body>

</html>