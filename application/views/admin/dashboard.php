<?php include('header.php');?>
<div class="container h-75">
  <div class="page allchart">
  <div class="row">
   
        <div class="col-md-12">
          <h2>Dashboard</h2>
        </div>

        <div class="col-md-4">
          <div class="border p-2">
          <h5 class="text-center font-weight-bold mt-1">Work Order</h5>

          <div id="piechart" ></div>
</div>
        </div>
        <div class="col-md-4">
          <div class="border p-2">
            <h5 class="text-center font-weight-bold mt-1">Material Request</h5>
           <div id="chart_div"></div>
              <ul class="list-inline text-center mtchart">
  <li class="list-inline-item"><i class="fa fa-circle gbg-1"></i> Mat. Req</li>
  <li class="list-inline-item"><i class="fa fa-circle gbg-2"></i> Mat. Received</li>
  <li class="list-inline-item"><i class="fa fa-circle gbg-3"></i> Mat. Issue</li>
</ul>
</div>
        </div>
        <div class="col-md-4">
          <div class="otherchart" >
            <h5 class="text-center font-weight-bold mt-1">Site Statistics</h5>
            <div class="row">
                  <div class="col-md-7">
                    <p>Closed Out</p>
                  </div>
                  <div class="col-md-5">
                       <div class="progress mt-1">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animate" style="width:30%">30
                        </div>
                      </div>
                  </div>
            </div><!--Row-->
            <div class="row">
                  <div class="col-md-7">
                    <p>Awaiting Approval</p>
                  </div>
                  <div class="col-md-5">
                       <div class="progress mt-1">
                        <div class="progress-bar bg-warning  progress-bar-striped progress-bar-animate" style="width:70%">70
                        </div>
                      </div>
                  </div>
            </div><!--Row-->
            <div class="row">
                  <div class="col-md-7">
                    <p>PPM</p>
                  </div>
                  <div class="col-md-5">
                       <div class="progress mt-1">
                        <div class="progress-bar bg-danger  progress-bar-striped progress-bar-animate" style="width:35%">35
                        </div>
                      </div>
                  </div>
            </div><!--Row-->
            <div class="row">
                  <div class="col-md-7">
                    <p>Reported</p>
                  </div>
                  <div class="col-md-5">
                       <div class="progress mt-1">
                        <div class="progress-bar bg-secondary  progress-bar-striped progress-bar-animate" style="width:55%">55
                        </div>
                      </div>
                  </div>
            </div><!--Row-->
            <div class="row">
                  <div class="col-md-7">
                    <p>In Progress</p>
                  </div>
                  <div class="col-md-5">
                       <div class="progress mt-1">
                        <div class="progress-bar bg-warning  progress-bar-striped progress-bar-animate" style="width:50%">50
                        </div>
                      </div>
                  </div>
            </div><!--Row-->
            <div class="row">
                  <div class="col-md-7">
                    <p>Forward To Facility</p>
                  </div>
                  <div class="col-md-5">
                       <div class="progress mt-1">
                        <div class="progress-bar bg-info  progress-bar-striped progress-bar-animate" style="width:50%">50
                        </div>
                      </div>
                  </div>
            </div><!--Row-->
          </div>
        </div>
    
  </div>

</div>
</div>
<?php include('footer.php');?>
</section>
<script>

    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/loader.js'); ?>"></script>
    


<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Language', 'Rating'],
      ['Open', 79],
            ['Close', 71],
            ['In Progress', 35]
            
    ]);

    var options = { 
      width: '100%',
      height: '280',
      legend: { position: 'bottom' },
      // colors: ['#7846FF', '#FF7E2A','#67B869'],
    fontName: '"Segoe UI", "Source Sans Pro", Calibri, Candara, Arial, sans-serif',
    fontSize: '12',
     chartArea: {
      left: 0,
      top: 10,
      width: '100%',
      height: '75%'
    }

    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Mat. Req', 'Mat. Received', 'Mat. Issue'],
          ['2018', 500, 600, 200]
        ]);

        var options = {
          
          bars: 'vertical',
          height: 250,
          legend: { position: 'none' },
          };
        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, google.charts.Bar.convertOptions(options));

      }
  </script>
<script src="<?php echo base_url('assets/js/clock.js');?>"></script>
</body>
</html>
