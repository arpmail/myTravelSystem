<div class="main-panel">
          <div class="content-wrapper">

            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                   <center style="font-size:25px"><h1>MYMALAYSIATRAVEL ADMIN PANEL</h1></center>
                  </div>
                </div>
              </div>
          </div>

            <div class="row ">

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$userPref}}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-account icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total user</h6>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$dc}}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger ">
                          <span class="mdi mdi-chart-areaspline icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">District with cluster</h6>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$tcases}}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger ">
                          <span class="mdi mdi-chart-pie icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">District with more than 200 cases</h6>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$dest}}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-home-variant icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Destinations</h6>
                  </div>
                </div>
              </div>
            </div>
              



          <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                   <center style="font-size:25px"><h1>List Of Users Registered</h1></center>
                  </div>
                </div>
              </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Name</th>
                                    <th><center>Email</th>
                                    <th><center>Phone Number</th>
                                    <th><center>Usertype</th>
                                    <th><center>Action</th>
                                </tr>
                            </thead>
                            <?php $i = 1?> @foreach($user as $u)
                            <tr>
                                <td><center>{{$i++}}</td>
                                <td><center>{{$u->name}}</td>
                                <td><center>{{$u->email}}</td>
                                <td><center>{{$u->phone}}</td>
                                <td><center><?php $data = $u->usertype; if($data==0)$dat="User";else $dat="Admin"; echo $dat?></td>
                                @if ($data==0)
                                  <td><center><a type="button" href="{{url('updateUser',$u->email)}}" class="btn btn-success">Upgrade to Admin</a></td>
                                @else
                                  <td><center><a type="button" href="{{url('updateUser',$u->email)}}" class="btn btn-warning">Downgrade to User</a></td>
                                @endif
                                
                            @endforeach
                              
                            </tbody>
                          </table>
                        </div>
                        <div class="d-flex justify-content-center">
                          {!! $user->links() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                   <center style="font-size:25px"><h1>Total Destination Scraped For Every State</h1></center>
                  </div>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <thead>
                              <tr>
                                  <th><center>No</th>
                                  <th><center>State</th>
                                  <th><center>Total Destination Scraped</th>
                              </tr>
                            </thead>
                              <tr> 
                                  <td><center>1</td>
                                  <td><center>All Destination</td>
                                  <td><center>{{$dest}}</td>
                              </tr>
                              <tr>
                                  <td><center>2</td>
                                  <td><center>Johor</td>
                                  <td><center>{{$johor}}</td>
                              </tr>
                              <tr>
                                  <td><center>3</td>
                                  <td><center>Kedah</td>
                                  <td><center>{{$kedah}}</td>
                              </tr>
                              <tr>
                                  <td><center>4</td>
                                  <td><center>Kelantan</td>
                                  <td><center>{{$kelantan}}</td>
                              </tr>
                              <tr>
                                  <td><center>5</td>
                                  <td><center>Melaka</td>
                                  <td><center>{{$melaka}}</td>
                              </tr>
                              <tr>
                                  <td><center>6</td>
                                  <td><center>Negeri Sembilan</td>
                                  <td><center>{{$ns}}</td>         
                              </tr> 
                              <tr>
                                <td><center>7</td>
                                <td><center>Pahang</td>
                                <td><center>{{$pahang}}</td>         
                              </tr>
                              <tr>
                                <td><center>8</td>
                                <td><center>Perak</td>
                                <td><center>{{$perak}}</td>         
                              </tr>       
                              <tr>
                                <td><center>9</td>
                                <td><center>Perlis</td>
                                <td><center>{{$perlis}}</td>         
                              </tr> 
                              <tr>
                                <td><center>10</td>
                                <td><center>Pulau Pinang</td>
                                <td><center>{{$pp}}</td>         
                              </tr> 
                              <tr>
                                <td><center>11</td>
                                <td><center>Sabah</td>
                                <td><center>{{$sabah}}</td>         
                              </tr> 
                              <tr>
                                <td><center>12</td>
                                <td><center>Sarawak</td>
                                <td><center>{{$sarawak}}</td>         
                              </tr> 
                              <tr>
                                <td><center>13</td>
                                <td><center>Selangor</td>
                                <td><center>{{$selangor}}</td>         
                              </tr> 
                              <tr>
                                <td><center>14</td>
                                <td><center>Terengganu</td>
                                <td><center>{{$terengganu}}</td>         
                              </tr> 
                              <tr>
                                <td><center>15</td>
                                <td><center>Kuala Lumpur</td>
                                <td><center>{{$KL}}</td>         
                              </tr> 
                              <tr>
                                <td><center>16</td>
                                <td><center>Labuan</td>
                                <td><center>{{$labuan}}</td>         
                              </tr> 
                              <tr>
                                <td><center>17</td>
                                <td><center>Putrajaya</td>
                                <td><center>{{$putrajaya}}</td>         
                              </tr>          
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © myMalaysiaTravel 2022</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">MYMALAYSIATRAVEL </a>- The World Is Yours</span>
            </div>
          </footer>