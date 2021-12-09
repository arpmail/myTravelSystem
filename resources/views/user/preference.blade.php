<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Preference</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

  @include('user.nav')

    <!-- Page Content -->
    <div class="page-heading about-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Reference</h4>
              <h2>Make your own recommendation</h2>
            </div>
          </div>
        </div>
      </div>
    </div>



    
    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Choose your destination preference</h2>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img height="260" width="370" src="assets/images/team_01.jpg" alt="">
              </div>
              <div class="down-content">
              <div class="checkbox">
              <h4><label><input type="checkbox" value=""> High Travel Budget</label></h4>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img height="260" width="370" src="assets/images/team_02.jpg" alt="">
              </div>
              <div class="down-content">
              <h4><label><input type="checkbox" value=""> Low Travel Budget</label></h4>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img height="260" width="370" src="assets/images/team_03.jfif" alt="">
              </div>
              <div class="down-content">
              <h4><label><input type="checkbox" value=""> Nature Environment</label></h4>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img height="260" width="370" src="assets/images/team_04.jpg" alt="">
              </div>
              <div class="down-content">
              <h4><label><input type="checkbox" value=""> Historical Environment</label></h4>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img height="260" width="370" src="assets/images/team_05.jpg" alt="">
              </div>
              <div class="down-content">
              <h4><label><input type="checkbox" value=""> Most Visited Destination</label></h4>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img height="260" width="370" src="assets/images/team_06.jpg" alt="">
              </div>
              <div class="down-content">
              <h4><label><input type="checkbox" value=""> Less Visited Destination</label></h4>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img height="260" width="370" src="assets/images/team_07.png" alt="">
              </div>
              <div class="down-content">
              <h4><label><input type="checkbox" value=""> High Covid-19 Cases</label></h4>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img height="260" width="370" src="assets/images/team_08.jpg" alt="">
              </div>
              <div class="down-content">
                <h4><label><input type="checkbox" value=""> Low Covid-19 Cases</label></h4>
              </div>
            </div>
          </div>

  <center><div class="col-md-4">
                <div style="padding: 15px;">
                    <input class="btn btn-success" type="submit" value="Save Preference">
                </div>
          </div></center>

        </div>
      </div>
    </div>


    
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
