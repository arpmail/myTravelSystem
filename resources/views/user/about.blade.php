<div class="best-features">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Covid-19 Information</h2>
                    <p>{{  now()->toDateTimeString() }}</p>
                </div>
            </div>

            <div class="row-md-8 col-md-8">
                <table class="datatable table" style="text-align">

                    <thead>
                        <tr>
                            <th><center>Ranking</th>
                            <th><center>State</th>
                            <th><center>Cases<br>(7d avg)</th>
                            <th><center>Death<br>(Past 14days)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($covid as $cov)
                        <tr>
                            <td></td>
                            <td><center>{{$cov->state}}</td>
                            <td><center>{{$cov->cases}}</td>
                            <td><center>{{$cov->deaths}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <br><br><br>
                <div class="right-image">
                    <img src="assets/images/covid.jpeg" alt="">
                </div>
                <br>
                <div class="right-image">
                    <img src="assets/images/covid.jpeg" alt="">
                </div>
                <br>
                <div class="right-image">
                    <img src="assets/images/covid.jpeg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function rank() {
        let row = $(".datatable").find("tr")

        row.each(function(index) {
            if (index == 0) return
            $(this).children().eq(0).text(index)
        })

    }

    $(document).ready(function() {
        var table = $('.datatable').DataTable({
            "orderFixed": [2, 'desc'],
            "paging": false
        });
        rank()
    });
</script>