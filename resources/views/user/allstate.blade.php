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
              <h4>State in Malaysia</h4>
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
              <h2>State</h2>
              <a href="">All state</i></a>
            </div>
          </div>
          

          @foreach($dataState as $data)
          @if ($data->state == 'Malaysia') @continue @endif
            <div class="col-md-6">
              <div class="product-item">
                <a href="{{url('state',$data->state)}}"><img style="height:300px; width:100%;" src="/productimage/{{$data->state}}.jpg" alt=""></a>
                <div class="down-content">
                  <a href="{{url('state',$data->state)}}"><h4>{{$data->state}}</h4></a>
                    <p><b>Latest Cases (7 Days Average)             : {{$data->cases}}</b></p>
                    <p><b>Latest Death (Past 14 Days)               : {{$data->deaths}}</b></p>
                    <p><b>Hospital Admission (7 Days Average)       : {{$data->hospitalAdmission}}</b></p>
                    <p><b>Hospital Bed Utilisation (7 Days Average) : {{$data->bedUtilise}}</b></p>
                    <p><b>Positivity Rate (7 Days Average)          : {{$data->positiveRate}}</b></p>
                    <p><b>Trend (7 Days Average)                    : {{$data->positiveTrend}}</b></p>
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