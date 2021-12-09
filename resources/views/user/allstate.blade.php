<!DOCTYPE html>
<html lang="en">

  <head>
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
          
          @foreach($Selangor as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/Selangor.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Selangor</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Kl as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/KualaLumpur.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Kuala Lumpur</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Johor as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/Johor.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Johor</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Sabah as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/Sabah.jfif" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Sabah</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Sarawak as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/Sarawak.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Sarawak</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Negeris as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/negerisembilan.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Negeri Sembilan</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($PPinang as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/pulaupinang.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Pulau Pinang</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Kelantan as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/kelantan.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Kelantan</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Perak as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/perak.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Perak</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Kedah as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/kedah.png" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Kedah</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Melaka as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/melaka.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Melaka</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Pahang as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/pahang.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Pahang</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Terengganu as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/terengganu.png" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Terengganu</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Labuan as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/labuan.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Labuan</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Putrajaya as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/putrajaya.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Putrajaya</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($Perlis as $data)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('state',$data->state)}}"><img height="200" width="200" src="/productimage/perlis.jpg" alt=""></a>
              <div class="down-content">
                <a href="{{url('state',$data->state)}}"><h4>Perlis</h4></a>
                <p>Latest cases : {{$data->cases}}</p>
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