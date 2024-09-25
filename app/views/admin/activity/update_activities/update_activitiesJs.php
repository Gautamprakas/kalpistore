<!-- Jquery Core Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery/jquery.min.js");?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap/js/bootstrap.js");?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap-select/js/bootstrap-select.js"); ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery-slimscroll/jquery.slimscroll.js");?>"></script>

     <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap-notify/bootstrap-notify.js");?>"></script>
     <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/node-waves/waves.js"); ?>"></script>

    <!-- Jquery DataTable Plugin Js -->
        <script src="<?php echo base_url("assets/layout/plugins/jquery-datatable/jquery.dataTables.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/jquery-datatable/extensions/export/jszip.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/jquery-datatable/extensions/export/pdfmake.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/jquery-datatable/extensions/export/vfs_fonts.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/plugins/jquery-datatable/extensions/export/buttons.print.min.js"); ?>"></script>

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
    <script src="<?php echo base_url("assets/layout/js/pages/tables/jquery-datatable.js"); ?>"></script>
    <!-- Demo Js -->
    <script src="<?php echo base_url("assets/layout/js/demo.js");?>"></script>
    <script>
      jQuery(document).ready(function(){
        // $("#incidence_type_1").html("");
        //     var data = jQuery.parseJSON(data);
        //     $("#incidence_type_1").append($('<option>',{value: "",text: "SELECT <?php echo "SCHEME NAME";?>"}));
          $("#add_activity").click(function(){
            // var train_number=$("#select_train").val();
            // console.log(train_number);
            // if(train_number==""){
            //   swal({
            //                             title: "Wait!",
            //                             text: "Please select train number to proceed..",
            //                             icon: "warning"
            //                         }
            //                     );
            //   return;
            // }
            // alert("add add_activity clicked");
            window.location.href = "<?php echo base_url('Railway/addActivity'); ?>";
              // alert("ADD Activity clicked!");
              // Add your desired action here
              // For example, you can show a modal, navigate to another page, etc.
          });
          $("#view_pending_activity").click(function(){
            // alert("add add_activity clicked");
            window.location.href = "<?php echo base_url('Railway/viewPendingActivity'); ?>";
              // alert("ADD Activity clicked!");
              // Add your desired action here
              // For example, you can show a modal, navigate to another page, etc.
          });
          $("#view_verified_activity").click(function(){
            // alert("add add_activity clicked");
            window.location.href = "<?php echo base_url('Railway/viewVerifiedActivity'); ?>";
              // alert("ADD Activity clicked!");
              // Add your desired action here
              // For example, you can show a modal, navigate to another page, etc.
          });
          $("#update_activity").click(function(){
            // alert("add add_activity clicked");
            window.location.href = "<?php echo base_url('Railway/updateActivity'); ?>";
          });
          $("#work_done_activity").click(function(){
            window.location.href = "<?php echo base_url('Railway/workDoneActivity'); ?>"; 
          });
          $("#fetch_activity").submit(function(event){
            event.preventDefault();
            var workCode=$("#work_code").val();
            console.log(workCode);
            $.post("<?php echo base_url("/Railway/getWorkDetails"); ?>",{
                        work_code:workCode,
                    },
                    function(data){
                        console.log(data);
                        var response = jQuery.parseJSON(data);
                        if(response.status_code=="200"){
                            var a=response.data;
                            console.log(a);
                            $("#work_code").val(a.work_code);
                            $("#train_number").val(a.train_number);
                            $("#coach_number").val(a.coach_number);
                            $("#work_category").val(a.work_category);
                            $("#work_status").val(a.work_status);
                            $("#work_list").val(a.work_list);
                            $("#area").val(a.area);
                            $("#updateFormActivity").show();
                        }else{
                            swal("Error !","Some Error Occured ..","failed");
                        }
                        
                    });

          });
          $('#example2').DataTable().destroy();
          // var table = $('#example2').DataTable({
          //             dom: 'lBfrtip', // Specify where the buttons will appear
          //             buttons: [
          //                 'copy', 'csv', 'excel', 'pdf', 'print'
          //             ],
          //             lengthMenu: [
          //                 [10, 25, 50, 100], // Number of rows per page options
          //                 ['10', '25', '50', '100'] // Text to display in the dropdown
          //              ]
          // });
          json = { 
                   "dom" : "<'row'<'col-sm-3'l><'col-sm-5 'B><'col-sm-3'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                   "buttons" : [
                                  { "extend": 'copy', "text":'Copy' },
                                  { "extend": 'excel', "text":'Excel' },
                                  { "extend": 'csv', "text":'CSV' },
                                  { "extend": 'pdf', "text":'PDF' },
                                  { "extend": 'print', "text":'Print' }
                              ],
                   "scrollX": false,
                   "aLengthMenu": [[10 , 20, 50, 100, -1], [10,20, 50, 100, "All"]],
                   "pageLength": 10,
                   "colReorder" : true

                };

        var tab= $('#example2').dataTable( json );
        $('table>thead').addClass("<?php echo MY_CLASS; ?>");

      });


    </script>