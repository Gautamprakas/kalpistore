<!-- Jquery Core Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery/jquery.min.js");?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap/js/bootstrap.js");?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap-select/js/bootstrap-select.js");?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery-slimscroll/jquery.slimscroll.js");?>"></script>

     <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap-notify/bootstrap-notify.js");?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/node-waves/waves.js");?>"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery-countto/jquery.countTo.js");?>"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/raphael/raphael.min.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/morrisjs/morris.js");?>"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url("assets/layout/plugins/chartjs/Chart.bundle.js");?>"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/flot-charts/jquery.flot.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/flot-charts/jquery.flot.resize.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/flot-charts/jquery.flot.pie.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/flot-charts/jquery.flot.categories.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/flot-charts/jquery.flot.time.js");?>"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery-sparkline/jquery.sparkline.js");?>"></script>

     <!-- SweetAlert Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/sweetalert/sweetalert.min.js"); ?>"></script>
    
      <!-- Google Maps API Js -->
    <!--<script src="https://maps.google.com/maps/api/js?v=3&sensor=false"></script>-->

    <!-- GMaps PLugin Js -->
    <!--<script src="<?php //echo base_url("assets/layout/plugins/gmaps/gmaps.js"); ?>"></script>
    <script src="<?php //echo base_url("assets/layout/js/pages/maps/google.js"); ?>"></script>-->

    <!-- Custom Js -->
    <script src="<?php echo base_url("assets/layout/js/admin.js?v=".ADMINJS_VERSION);?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/charts/chartjs.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/ui/notifications.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/index.js");?>"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url("assets/layout/js/demo.js");?>"></script>
    <script>
 
        // data sample for the chart
        let data_bar = {
            labels: ['January', 'Faburary',
                     'March', 'Aprail', 
                     'May'],
            datasets: [{
                label: 'Month wise varifed Items',
                data: [12, 17, 3, 8, 2],
                backgroundColor: 'rgba(70, 192, 192, 0.6)',
                borderColor: 'rgba(150, 100, 255, 1)',
                borderWidth: 1
            }]
        };
 
        // Configuration options for the chart
        let options_bar = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };
 
        // Get the canvas element
        let ctx_bar = document.getElementById('myBarChart')
            .getContext('2d');
 
        // Create the bar chart
        let myBarChart = new Chart(ctx_bar, {
            type: 'bar',
            data: data_bar,
            options: options_bar
        });
    </script>
 <script>
        // Get the canvas element
        var ctx = document.getElementById('pie_chart').getContext('2d');
        // Define the data for the pie chart
        var data = {
            labels: ['zero rating', 'one rating', 'two rating', 'three rating'],
            datasets: [{
                data: [11, 19, 3, 5],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Create the pie chart
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return data.labels[tooltipItem.dataIndex] + ': ' + data.datasets[0].data[tooltipItem.dataIndex];
                            }
                        }
                    }
                }
            }
        });
    </script>



