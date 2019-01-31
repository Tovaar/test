<?php
  require "header.php";
?>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <?php
            require_once 'includes/phptoarray.inc.php';
            $file = 'data/13-28-01-2019.tsv';
            $data = tsv_to_array($file,array('remove_header_row'=>true));
            ?>

            <div class="container">
              <canvas id="chartone" width="300" height="300"></canvas>
            </div>

            <script>
              var js_array = [<?php echo '"'.implode('","', $data).'"' ?>];
              var ctx = document.getElementById('chartone').getContext('2d');
              var array = ['Station Number', 'Date', 'Time', 'Temperature', 'Dew point','Air pressure Station', 'Air pressure Sea', 'Visibility in km', 'Windspeed in km p/h', 'Rainfall in cm', 'Fallen snow in cm'];
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: array,
                  datasets: [{
                    label: '# of Votes',
                    data: js_array,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    yAxes: [{
                      ticks: {
                        beginAtZero:true
                      }
                    }]
                  }
                }
              });
            </script>

          </div>
        </div>
      </div>
      <?php require "disclaimer.php"; ?>
    </main>

<?php
  require "footer.php";
?>
