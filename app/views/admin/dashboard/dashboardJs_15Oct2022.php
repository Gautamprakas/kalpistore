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
    <script src="<?php echo base_url("assets/layout/js/admin.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/charts/chartjs.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/ui/notifications.js");?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/index.js");?>"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url("assets/layout/js/demo.js");?>"></script>


<script>
    jQuery(document).ready(function(){

            function fetchDashboardTable(){
                
                var location_type = '<?php echo $this->location_type; ?>';

                $('#table1 tbody').html("<tr><th colspan='6'>Please Wait...</th></tr>");
                $('#table2 tbody').html("<tr><th colspan='4'>Please Wait...</th></tr>");
                $('#table3 tbody').html("<tr><th colspan='4'>Please Wait...</th></tr>");

                
                $.post("<?php echo base_url("Incidence/getIncidenceForDashboard"); ?>",
                {
                    date1 : $("#date1").val()
                },function(data){
                    var response = jQuery.parseJSON(data);
                    if(response.status_code == "200"){
                        if( response.result.length > 0 ){
                            var tbody1 = ``;
                            var tbody2 = ``;
                            var tbody3 = ``;
                        }else{
                            $('#table1 tbody').html("<tr><th colspan='6'>Data Not Found</th></tr>");
                            $('#table2 tbody').html("<tr><th colspan='4'>Data Not Found</th></tr>");
                            $('#table3 tbody').html("<tr><th colspan='4'>Data Not Found</th></tr>");
                        }
                        
                        $.each(response.result,function(index,row){

                            if( location_type == 'ADMIN' ){
                                tbody1 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.division}</td>
                                        <td>${row.total_gram_sachiwalaya_ids}</td>
                                        <td>${row.total_installed}</td>
                                        <td>${row.total_gram_sachiwalaya_ids - row.total_installed}</td>
                                        <td>${row.total_payment_matched}</td>
                                        <td>${row.total_not_payment_matched}</td>
                                    </tr>
                                `;
                                tbody2 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.division}</td>
                                        <td>${row.total_done}</td>
                                        <td>${row.total_not_done}</td>
                                    </tr>
                                `;
                                tbody3 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.division}</td>
                                        <td>${row.total_logged_in}</td>
                                        <td>${row.total_gram_sachiwalaya_ids - row.total_logged_in}</td>
                                    </tr>
                                `;
                            }else if( location_type == 'DIVISION' ){
                                tbody1 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.district}</td>
                                        <td>${row.total_gram_sachiwalaya_ids}</td>
                                        <td>${row.total_installed}</td>
                                        <td>${row.total_gram_sachiwalaya_ids - row.total_installed}</td>
                                        <td>${row.total_payment_matched}</td>
                                        <td>${row.total_not_payment_matched}</td>
                                    </tr>
                                `;
                                tbody2 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.district}</td>
                                        <td>${row.total_done}</td>
                                        <td>${row.total_not_done}</td>
                                    </tr>
                                `;
                                tbody3 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.district}</td>
                                        <td>${row.total_logged_in}</td>
                                        <td>${row.total_gram_sachiwalaya_ids - row.total_logged_in}</td>
                                    </tr>
                                `;
                            }else if( location_type == 'DISTRICT' ){
                                tbody1 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.block}</td>
                                        <td>${row.total_gram_sachiwalaya_ids}</td>
                                        <td>${row.total_installed}</td>
                                        <td>${row.total_gram_sachiwalaya_ids - row.total_installed}</td>
                                        <td>${row.total_payment_matched}</td>
                                        <td>${row.total_not_payment_matched}</td>
                                    </tr>
                                `;
                                tbody2 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.block}</td>
                                        <td>${row.total_done}</td>
                                        <td>${row.total_not_done}</td>
                                    </tr>
                                `;
                                tbody3 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.block}</td>
                                        <td>${row.total_logged_in}</td>
                                        <td>${row.total_gram_sachiwalaya_ids - row.total_logged_in}</td>
                                    </tr>
                                `;
                            }else if( location_type == 'BLOCK' ){
                                tbody1 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.village}</td>
                                        <td>${row.total_gram_sachiwalaya_ids}</td>
                                        <td>${row.total_installed}</td>
                                        <td>${row.total_gram_sachiwalaya_ids - row.total_installed}</td>
                                        <td>${row.total_payment_matched}</td>
                                        <td>${row.total_not_payment_matched}</td>
                                    </tr>
                                `;
                                tbody2 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.village}</td>
                                        <td>${row.total_done}</td>
                                        <td>${row.total_not_done}</td>
                                    </tr>
                                `;
                                tbody3 += `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${row.village}</td>
                                        <td>${row.total_logged_in}</td>
                                        <td>${row.total_gram_sachiwalaya_ids - row.total_logged_in}</td>
                                    </tr>
                                `;
                            }
                            
                        });
                        $("#table1 tbody").html(tbody1);
                        $("#table2 tbody").html(tbody2);
                        $("#table3 tbody").html(tbody3);
                    }else if(response.status_code == "404"){
                        $('#table1').html("<tr><th>Data Not Found</th></tr>");
                    }else{
                        console.log("server error");
                        return false;
                    }

                });
            }


            fetchDashboardTable();

            $("#date1").change(function(){
                fetchDashboardTable();
            });
    });
</script>


