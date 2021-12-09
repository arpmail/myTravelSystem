<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="{{url('allstate')}}">view all states <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          
          @foreach($data as $destination)

          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('location',$destination->id)}}"><img height="300" width="200" src="{{$destination->descImage}}" alt=""></a>
              <div class="down-content">
                <a href="{{url('location',$destination->id)}}"><h4>{{$destination->destname}}</h4></a>
                <p>Rate: {{$destination->descRate}}</p>
                <p>Price : RM{{$destination->destPrice}}</p>
              </div>
            </div>
          </div>
          @endforeach

          <div class="d-flex justify-content-center">
            {!! $data->links() !!}
          </div>


        </div>
      </div>
    </div>