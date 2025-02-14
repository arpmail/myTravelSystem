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
            </div>
          </div>

          

          <div class="col-md-12">
            <table class="datatable table" style="text-align:center">             
              <thead>
                <tr>
                  <th>Ranking</th>
                  <th>District</th>
                  <th>Cluster</th>
                  <th>Category</th>
                  <th>Total Cases</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                @foreach($table as $cov)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$cov->district}}</td>
                  <td>{{$cov->clusterName}}</td>
                  <td>{{$cov->category}}</td>
                  <td>{{$cov->totalCases}}</td>
                </tr>
                @endforeach  
              </tbody>
            </table>
            <br><br><hr>
          </div>

          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
              <div class="product-item">
                <a href="{{url('high',$state)}}"><img class ="img-thumbnail" height="200" width="200" src="/productimage/high.png" alt=""></a>
              </div>
            </div>  

            <div class="col-md-4">
              <div class="product-item">
                <a href="{{url('low',$state)}}"><img class ="img-thumbnail" height="200" width="200" src="/productimage/low.png" alt=""></a>
              </div>
            </div> 
            <div class="col-md-2">
            </div>
          </div>

          <div class="row">
           

          @foreach($dest as $destination)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{$destination->descLink}}" target="_blank"><img height="300" width="300" src="{{$destination->descImage}}" alt=""></a>
              <div class="down-content">
                <a href="{{$destination->descLink}}" target="_blank"><h4>{{$destination->destname}}</h4></a>
                <p><b>Price: RM{{$destination->destPrice}} Per Night</b></p>
                <p><b>District: {{$destination->destAddress}}</b></p>
                <p><b>Rating: {{$destination->descRate}} &nbsp;&#11088;</b></p>
              </div>
            </div>
          </div>
          @endforeach



        </div>
        <div class="d-flex justify-content-center">
          {!! $dest->links() !!}
        </div>
      </div>
    </div>
    


    @include('user.footernjs')
    <script>

      function rank () {
        let row = $(".datatable").find("tr")

        row.each(function (index){
          if (index==0)return
          $(this).children().eq(0).text(index)
        })

      }

      $(document).ready(function() {
        var table = $('.datatable').DataTable({"orderFixed": [ 4, 'desc' ],"paging": false});  
        rank()    
        table.destroy() 
        var table = $('.datatable').DataTable({"orderFixed": [ 4, 'desc' ]});  
      } );
    </script>
    
  </body>

</html>
