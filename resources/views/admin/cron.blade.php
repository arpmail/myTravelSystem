<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .loader {
            display: inline-block;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
  </head>
  <body>

    @include('admin.sidebar')
      

    @include('admin.navbar')

    <div class="main-panel">
          <div class="content-wrapper">


        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <center style="font-size:25px"><h1>List Of CronJob</h1></center>
                    </div>
                </div>
            </div>
        </div>

        @if(session()->has('messageCovid'))
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('messageCovid')}}
            </div>
        @endif
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body"> 
                        <center style="font-size:25px"><h1>Cronjob 1 : Covid-19 Details</h1><br>
                        <form action="{{url('covid')}}" method="post" style="display: none">
                            @csrf
                            <button type="submit" class="btn btn-success" style="width: 200px; height: 35px;">Start</button>
                        </form>
                            <button type="button" id="covidBtn" class="btn btn-info btn-block" onclick="runCovid()"><i class="mdi mdi-play"></i>&nbsp;Start</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
<br>
        @if(session()->has('messageTravel'))
                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('messageTravel')}}
                    </div>
        @endif
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body text-center"> 
                        <center style="font-size:25px"><h1>Cronjob 2 : List Of Destinations</h1><br>
                        <form action="{{url('travel')}}" method="post" style="display: none">
                            @csrf
                            <button type="submit" class="btn btn-success" style="width: 200px; height: 35px;">Start</button>
                        </form>
                        <button type="button" id="travelBtn" class="btn btn-info btn-block" onclick="runTravel()"><i class="mdi mdi-play"></i>&nbsp;Start</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>

   
          
          
               
    @include('admin.script')

    <script>
        // change according to LOCALTUNNEL url
        const ws = new WebSocket('ws://perfect-ape-7.loca.lt');
        ws.onopen = function() {
            console.log('WebSocket Client Connected');
            ws.send('Hi this is web client.');
        };
        ws.onmessage = function(e) {
            //COVID
            if (e.data == "CovidDone!"){
                stopCovid();
            }
            if (e.data == "Covid already run!") {
                alreadyCovid()
            }

            //TRAVEL
            if (e.data == "TravelDone!"){
                stopTravel();
            }
            if (e.data == "Travel already run!") {
                alreadyTravel()
            }
        };

        //COVID
        function runCovid() {
            ws.send('covid')
            let covidBtn = $('#covidBtn')
            covidBtn.html("<div class='loader'><i class='mdi mdi-loading'></i></div>&nbsp;&nbsp;Running! Please wait around 3 minutes and do not refresh...")
            covidBtn.prop("disabled", true)
            covidBtn.addClass("btn-warning");
            covidBtn.removeClass("btn-info");
            covidBtn.css("cursor", "not-allowed")
        }
        
        function alreadyCovid(){
            let covidBtn = $('#covidBtn')
            let covidClone = covidBtn.clone();
            covidBtn.html("<i class='mdi mdi-alert-circle-outline'></i>&nbsp;Process already run! Please Wait...")
            covidBtn.prop("disabled", true)
            covidBtn.addClass("btn-danger");
            covidBtn.removeClass("btn-info");
            covidBtn.css("cursor", "")
            setTimeout(() => {
                covidBtn.replaceWith('<button type="button" id="covidBtn" class="btn btn-info btn-block" onclick="runCovid()"><i class="mdi mdi-play"></i>&nbsp;Start</button>')
            }, 3000);
        }

        function stopCovid(){
            let covidBtn = $('#covidBtn')
            covidBtn.html("<i class='mdi mdi-play'></i>&nbsp;Start")
            covidBtn.prop("disabled", false)
            covidBtn.addClass("btn-info");
            covidBtn.removeClass("btn-warning");
            covidBtn.css("cursor", "")
        }

        //TRAVEL
        function runTravel() {
            ws.send('travel')
            let travelBtn = $('#travelBtn')
            travelBtn.html("<div class='loader'><i class='mdi mdi-loading'></i></div>&nbsp;&nbsp;Running! Please wait around 20 minutes and do not refresh...")
            travelBtn.prop("disabled", true)
            travelBtn.addClass("btn-warning");
            travelBtn.removeClass("btn-info");
            travelBtn.css("cursor", "not-allowed")
        }
        
        function alreadyTravel(){
            let travelBtn = $('#travelBtn')
            travelBtn.html("<i class='mdi mdi-alert-circle-outline'></i>&nbsp;Process already run! Please Wait...")
            travelBtn.prop("disabled", true)
            travelBtn.addClass("btn-danger");
            travelBtn.removeClass("btn-info");
            travelBtn.css("cursor", "")
            setTimeout(() => {
                travelBtn.replaceWith('<button type="button" id="travelBtn" class="btn btn-info btn-block" onclick="runTravel()"><i class="mdi mdi-play"></i>&nbsp;Start</button>')
            }, 3000);
        }

        function stopTravel(){
            let travelBtn = $('#travelBtn')
            travelBtn.html("<i class='mdi mdi-play'></i>&nbsp;Start")
            travelBtn.prop("disabled", false)
            travelBtn.addClass("btn-info");
            travelBtn.removeClass("btn-warning");
            travelBtn.css("cursor", "")
        }
    </script>
    
  </body>
</html>