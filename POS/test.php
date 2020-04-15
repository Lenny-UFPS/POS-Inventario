<?php require 'header.php'; ?>
<body>
  <div class="card" style="height: 600px; width: 600px;">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square" style="color: rgb(0, 99, 132);"></i> Ventas mensuales
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
  <?php require 'footer.php'; ?>

  <?php
  $today = date("Y-m-d H:i:s");

  $arr = [date("Y-m-d 00:00:00", strtotime($today . "- 5 months")), date("Y-m-d 00:00:00", strtotime($today . "- 4 months")), date("Y-m-d 00:00:00", strtotime($today . "- 3 months")), date("Y-m-d 00:00:00", strtotime($today . "- 2 months")), date("Y-m-d 00:00:00", strtotime($today . "- 1 month")), $today];

  $arr2 = [date('F', strtotime('- 5 months')), date('F', strtotime('- 4 months')), date('F', strtotime('- 3 months')), date('F', strtotime('- 2 months')), date('F', strtotime('- 1 month')), date('F')];

   ?>

  <script>
    var array = <?php echo json_encode($arr);?>;
    var lbl = <?php echo json_encode($arr2);?>;
    var ctx = document.getElementById('sales-chart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',

      // Data 
      data: {
        labels: lbl,
        datasets: [{
          label: 'Promedio ventas últimos 6 meses',
          backgroundColor: 'rgb(0, 99, 132)',
          borderColor: 'rgb(0, 99, 132)',
          data: [5, 30, 15, 20, 4, 2]
        }]
      },
      options: {}
    });
  </script>
</body>
</html>
