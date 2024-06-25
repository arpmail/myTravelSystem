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
              <h4>Your Wishes</h4>
              <h2>Happy Travel!</h2>
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
              <h2>Latest Products</h2>
              <a href="{{url('allstate')}}">view all states <i class="fa fa-angle-right"></i></a>
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
                @foreach($stateData as $cov)
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
          
          @foreach($destFilter as $destination)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{$destination->descLink}}" target="_blank"><img height="300" width="200" src="{{$destination->descImage}}" alt=""></a>
              <div class="down-content">
                <a href="{{$destination->descLink}}" target="_blank"><h4>{{$destination->destname}}</h4></a>
                <p><b>Price: RM{{$destination->destPrice}} </b></p>
                <p><b>Rating : {{$destination->descRate}} &nbsp;&#11088;</b></p>
                <p><b>Location : {{$destination->destAddress}} </b></p>
              </div>
            </div>
          </div>
          @endforeach

          
        </div>
        <div class="d-flex justify-content-center">
          {!! $destFilter->links() !!}
        </div>
      </div>
</div>

    @include('user.footernjs')

    <script>
      $(document).ready(function(){
        $(".page-item").not(".active, .disabled").each(function(index){
          let page = $(this).children().eq(0).attr("href")
          $(this).children().eq(0).attr("href",`/pref?high=${findGetParameter("high")}&low=${findGetParameter("low")}&rate=${findGetParameter("rate")}&numCases=${findGetParameter("numCases")}&${arr('{!!json_encode($location)!!}')}&page=${page.split("=")[1]}`)
        })
      })

      function findGetParameter(parameterName) {
        var result = null,
          tmp = [];
        location.search
            .substr(1)
            .split("&")
            .forEach(function (item) {
              tmp = item.split("=");
              if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
            });
        return result;
      }

      function arr(location){
        console.log(location);
        let loca = JSON.parse(location);
        // console.log(loca);
        let locaStr = "";

        loca.forEach(function(item){
          locaStr += `location[]=${item}&`
          // console.log(item);
          console.log(locaStr);
        })
        console.log(locaStr);
        return locaStr;
      }

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
