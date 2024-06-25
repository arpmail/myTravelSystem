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
              <h4>Here</h4>
              <h2>Your Destination</h2>
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
          
          <div class="row">
            <div class="col-md-6">
              <div class="product-item">
                <a href="{{url('high',$data)}}"><img class ="img-thumbnail" height="200" width="200" src="/productimage/high.png" alt=""></a>
              </div>
            </div>  

            <div class="col-md-6">
              <div class="product-item">
                <a href=""><img class ="img-thumbnail" height="200" width="200" src="/productimage/low.png" alt=""></a>
              </div>
            </div> 
            
        </div>
      </div>
    </div>


    @include('user.footernjs')
    
  </body>

</html>