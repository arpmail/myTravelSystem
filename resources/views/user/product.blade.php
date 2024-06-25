@if (!Auth::id())
  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Destination</h2>
            <a href="{{url('allstate')}}">view all destinations <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        
        @foreach($data as $destination)

        <div class="col-md-3">
          <div class="product-item">
            <a href="{{$destination->descLink}}" target="_blank"><img height="300" width="200" src="{{$destination->descImage}}" alt=""></a>
            <div class="down-content">
              <a href="{{$destination->descLink}}" target="_blank"><h4>{{$destination->destname}}</h4></a>
              <p>Rate: {{$destination->descRate}} &nbsp;&#11088;</p>
              <p>Price : RM{{$destination->destPrice}}</p>
              <p>Location : {{$destination->destAddress}}</p>
            </div>
          </div>
        </div>
        @endforeach

        
      </div>       
    </div>
    <div class="d-flex justify-content-center">
      {!! $data->links() !!}
    </div>
  </div>

@else

  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Recommended For You</h2>
            <a href="{{url('allstate')}}">view all destination <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        
        @foreach($data as $destination)

        <div class="col-md-3">
          <div class="product-item">
            <a href="{{$destination->descLink}}" target="_blank"><img height="300" width="200" src="{{$destination->descImage}}" alt=""></a>
            <div class="down-content">
              <a href="{{$destination->descLink}}" target="_blank"><h4>{{$destination->destname}}</h4></a>
              <p>Rate: {{$destination->descRate}} &nbsp;&#11088;</p>
              <p>Price : RM{{$destination->destPrice}}</p>
              <p>Location : {{$destination->destAddress}}</p>
            </div>
          </div>
        </div>
        @endforeach  
        
      </div>       
    </div>
    <div class="d-flex justify-content-center">
      {!! $data->links() !!}
    </div>
  </div>
@endif


