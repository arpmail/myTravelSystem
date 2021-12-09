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
              <h4>about us</h4>
              <h2>our company</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="latest-products">
      <div class="container">
        <div class="">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Destinations</h2>
              
            </div>
          </div>
          


          <center><div class="col-md-4">
            <div class="product-item">
              <a href="{{$data->descLink}}" target="_blank"><img height="300" width="300" src="{{$data->descImage}}" alt=""></a>
              <div class="down-content">
                <a href="{{$data->descLink}}" target="_blank"><h4>{{$data->destname}}</h4></a>
                <p>Price : RM{{$data->destPrice}}<p>
                <p>Rate : {{$data->descRate}} &#11088;</p>
                <p>Original Website : <a href ="{{$data->descLink}}" target="_blank">{{$data->descLink}}</a></p>
                <p>Description : {{$data->destDesc}}</p>
              </div>
            </div>
          </div>





        </div>
      </div>
    </div>


    @include('user.footernjs')
    
  </body>

</html>