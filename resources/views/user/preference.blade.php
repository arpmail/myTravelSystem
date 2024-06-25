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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
</head>

<style>
    .slider {
  -webkit-appearance: none;
  width: 100%;
  height: 11px;
  border: 1px solid #c5c5c5;
  border-radius: 3px;
  background: #ffffff;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  border: 1px solid #c5c5c5;
  background: #b6b4b4;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 15px;
  height: 15px;
  border: 1px solid #c5c5c5;
  background: #b6b4b4;
  cursor: pointer;
}
</style>

<body>

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    <h2>myMalaysia <em>Travel</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('/')}}">Home
                  
                </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('allstate')}}">Destinations</a>

                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('preference')}}">Preference</a>
                            <span class="sr-only">(current)</span>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login')) @auth
                            <x-app-layout>
                            </x-app-layout>
                            @else
                            <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                            @endif @endauth @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

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

    <form action="{{url('pref')}}" method="GET">
        <div class="team-members">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Choose your destination preference</h2>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6" style="height: 100%;">
                            <div class="team-member">
                                <div class="thumb-container">
                                    <img height="260" width="370" src="assets/images/team_02.jfif" alt="">
                                </div>
                                <div class="down-content">
                                    <p>
                                        <label for="amount">Price range:</label>
                                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                        <input type="hidden" name="high" id="high" value="{{isset($pref->highPrice) ? $pref->highPrice : 300}}">
                                        <input type="hidden" name="low" id="low" value="{{isset($pref->lowPrice) ? $pref->lowPrice : 75}}">
                                    </p>

                                    <div id="slider-range"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" style="height: 100%;">
                            <div class="team-member">
                                <div class="thumb-container">
                                    <img height="260" width="370" src="assets/images/cov.jfif" alt="">
                                </div>
                                
                                <div class="down-content">
                                    <p>
                                        <label for="amount" style="display: inline;">Cases range: </label> <input type="text" id="crg" value="{{isset($pref->numCases) ? $pref->numCases : 300}}" size="3" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                    </p>
                                    <input type="range" oninput="cRange(this.value)" onchange="cRange(this.value)" id="total" class="slider" name="numCases" min="0" max="999" value="{{isset($pref->numCases) ? $pref->numCases : 300}}" readonly style="width:100%;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="team-member">

                                <div class="thumb-container">
                                    <img height="260" width="370" src="assets/images/rated.jfif" alt="">
                                </div>
                                <div class="down-content" style="text-align: left; justify-content:center;">
                                    <label for="rate">   Rating Destination </label><br>
                                    <p>
                                        <input type="radio" id="rate" name="rate" value="2" {{!isset($pref->rate) || $pref->rate == "2" ? "checked" : ""}}> (0-2.0)&nbsp;&nbsp;&#11088;
                                    </p>
                                    <p>
                                        <input type="radio" id="rate" name="rate" value="4" {{isset($pref->rate) && $pref->rate == "4" ? "checked" : ""}}> (2.1-4.0)&nbsp;&nbsp;&#11088;&#11088;
                                    </p>
                                    <p>
                                        <input type="radio" id="rate" name="rate" value="6" {{isset($pref->rate) && $pref->rate == "6" ? "checked" : ""}}> (4.1-6.0)&nbsp;&nbsp;&#11088;&#11088;&#11088;
                                    </p>
                                    <p>
                                        <input type="radio" id="rate" name="rate" value="8" {{isset($pref->rate) && $pref->rate == "8" ? "checked" : ""}}> (6.1-8.0)&nbsp;&nbsp;&#11088;&#11088;&#11088;&#11088;
                                    </p>
                                    <p>
                                        <input type="radio" id="rate" name="rate" value="10" {{isset($pref->rate) && $pref->rate == "10" ? "checked" : ""}}> (8.1-9.9)&nbsp;&nbsp;&#11088;&#11088;&#11088;&#11088;&#11088;&#11088;
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            
                            <div class="team-member">

                                <div class="down-content" style="text-align: left; justify-content:center;">
                                    <label for="rate"> List Of States</label><br>
                                        <input type="checkbox" id="johor" name="location[]" value="Johor" {{isset($pref->location) &&  in_array("Johor",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle1">Johor</label><br>

                                        <input type="checkbox" id="kedah" name="location[]" value="Kedah" {{isset($pref->location) &&  in_array("Kedah",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle2">Kedah</label><br>

                                        <input type="checkbox" id="melaka" name="location[]" value="Melaka" {{isset($pref->location) &&  in_array("Melaka",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle3">Melaka</label><br>
                                        
                                        <input type="checkbox" id="negeriSembilan" name="location[]" value="Negeri Sembilan" {{isset($pref->location) &&  in_array("Negeri Sembilan",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle1">Negeri Sembilan</label><br>

                                        <input type="checkbox" id="pahang" name="location[]" value="Pahang" {{isset($pref->location) &&  in_array("Pahang",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle2">Pahang</label><br>

                                        <input type="checkbox" id="perak" name="location[]" value="Perak" {{isset($pref->location) &&  in_array("Perak",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle3">Perak</label><br>

                                        <input type="checkbox" id="perlis" name="location[]" value="Perlis" {{isset($pref->location) &&  in_array("Perlis",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle1">Perlis</label><br>

                                        <input type="checkbox" id="pp" name="location[]" value="Pulau Pinang" {{isset($pref->location) &&  in_array("Pulau Pinang",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle2">Pulau Pinang</label><br>

                                        <input type="checkbox" id="sabah" name="location[]" value="Sabah" {{isset($pref->location) &&  in_array("Sabah",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle3">Sabah</label><br>

                                        <input type="checkbox" id="sarawak" name="location[]" value="Sarawak" {{isset($pref->location) &&  in_array("Sarawak",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle1">Sarawak</label><br>

                                        <input type="checkbox" id="selangor" name="location[]" value="Selangor" {{isset($pref->location) &&  in_array("Selangor",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle2">Selangor</label><br>

                                        <input type="checkbox" id="terengganu" name="location[]" value="Terengganu" {{isset($pref->location) &&  in_array("Terengganu",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle3">Terengganu</label><br>

                                        <input type="checkbox" id="kl" name="location[]" value="Kuala Lumpur" {{isset($pref->location) &&  in_array("Kuala Lumpur",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle1">Kuala Lumpur</label><br>

                                        <input type="checkbox" id="labuan" name="location[]" value="Labuan" {{isset($pref->location) &&  in_array("Labuan",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle2">Labuan</label><br>

                                        <input type="checkbox" id="putrajaya" name="location[]" value="Putrajaya" {{isset($pref->location) &&  in_array("Putrajaya",json_decode($pref->location)) ? "checked" : ""}}>
                                        <label for="vehicle3">Putrajaya</label><br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div style="">
                                <input class="btn btn-success btn-block" type="submit">
                            </div>
                        </div>

                    </div>
                </div>
            </div>


                
            </div>
    </form>

    @include('user.footernjs')

    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 3000,
                values: [{{isset($pref->lowPrice) ? $pref->lowPrice : 75}}, {{isset($pref->highPrice) ? $pref->highPrice : 300}}],
                slide: function(event, ui) {
                    $("#amount").val("RM" + ui.values[0] + " - RM" + ui.values[1]);
                    $("#high").val(ui.values[1])
                    $("#low").val(ui.values[0])
                }
            });
            $("#amount").val("RM" + $("#slider-range").slider("values", 0) +
                " - RM" + $("#slider-range").slider("values", 1));
        });

        function cRange(value){
            document.getElementById("crg").value = value;
        }
    </script>


</body>

</html>