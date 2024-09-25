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
    <script type="text/javascript">
      jQuery(document).ready(function(){
        var selector_coach='#select_coach';
            $.post("<?php echo base_url("api/Get_api/getCoachDetails"); ?>",{
               
            },function(data){
                $(selector_coach).html("");
                var data = jQuery.parseJSON(data);
                $(selector_coach).append($('<option>',{value: "",text: "SELECT <?php echo "COACH NUMBER";?>"}));
                if(data.status_code == '200'){
                    $.each(data.result,function(index,value){
                      var coach_no_cat=value.coach_number+'|'+value.coach_category;
                        $(selector_coach).append('<option value="'+coach_no_cat+'">'+
                                                  coach_no_cat+'</option>');
                    });
                }
                $(selector_coach).selectpicker('refresh');
            });
            var selector_train='#select_train';
            $.post("<?php echo base_url("api/Get_api/getTrainDetailsByUser"); ?>",{
               username:"<?php echo $this->session->userdata("id");?>"
            },function(data){
                $(selector_train).html("");
                var data = jQuery.parseJSON(data);
                $(selector_train).append($('<option>',{value: "",text: "SELECT <?php echo "TRAIN NUMBER";?>"}));
                if(data.status_code == '200'){
                    $.each(data.result,function(index,value){
                      var train_number=value.train_number;
                        $(selector_train).append('<option value="'+train_number+'">'+
                                                  train_number+'</option>');
                    });
                }
                $(selector_train).selectpicker('refresh');
            });
            var selector_berth='#area';
            $.post("<?php echo base_url("api/Get_api/getBerthDetails"); ?>",{
               
            },function(data){
                $(selector_berth).html("");
                var data = jQuery.parseJSON(data);
                $(selector_berth).append($('<option>',{value: "",text: "SELECT <?php echo "BERTH";?>"}));
                if(data.status_code == '200'){
                    $.each(data.result,function(index,value){
                      var berth=value.berth;
                        $(selector_berth).append('<option value="'+berth+'">'+
                                                  berth+'</option>');
                    });
                }
                $(selector_berth).selectpicker('refresh');
            });

            var selector_work_category='#work_category';
            $.post("<?php echo base_url("api/Get_api/getWorkCategory"); ?>",{
               
            },function(data){
                $(selector_work_category).html("");
                var data = jQuery.parseJSON(data);
                $(selector_work_category).append($('<option>',{value: "",text: "SELECT <?php echo "CATEGORY";?>"}));
                if(data.status_code == '200'){
                    $.each(data.result,function(index,value){
                      var work_category=value.work_category;
                        $(selector_work_category).append('<option value="'+work_category+'" data-category="'+work_category+'">'+
                                                  work_category+'</option>');
                    });
                }
                $(selector_work_category).selectpicker('refresh');
            });
            var selector_work_status='#work_status';
            $.post("<?php echo base_url("api/Get_api/getWorkStatus"); ?>",{
               
            },function(data){
                $(selector_work_status).html("");
                var data = jQuery.parseJSON(data);
                $(selector_work_status).append($('<option>',{value: "",text: "SELECT <?php echo "STATUS";?>"}));
                if(data.status_code == '200'){
                    $.each(data.result,function(index,value){
                      var work_status=value.status;
                        $(selector_work_status).append('<option value="'+work_status+'">'+
                                                  work_status+'</option>');
                    });
                }
                $(selector_work_status).selectpicker('refresh');
            });
            
      });
    </script>
    <script>
      jQuery(document).ready(function(){
 
          $("#submit_work").click(function(event){
            event.preventDefault();
            console.log("clicked");
            var formData=new FormData(this);
            var selectedTrain = $("#select_train").val();
            var selectedCoach = $("#select_coach").val();
            var time1         =$("#time1").val();
            var time2         =$("#time2").val();
            var date     =$("#date").val();
            if(time1=='' || time2==''){
              swal({
                "title":"Wait",
                "text":"Please select time",
                "icon":"success"
              });
              return;
            }
            console.log(formData);
            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }
            swal({
                    title: "Are you sure you want to add activity ?",
                    text: "",
                    type: "info",
                    html: true,
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                }, function () {
                    
                    $.ajax({
                      url: "<?php echo base_url('Railway/saveAddActivity'); ?>",
                      type: 'POST',
                      data: formData,
                      processData: false, // Important! To send formData correctly
                      contentType: false, // Important! To send formData correctly
                      success: function(data) {
                          var data= jQuery.parseJSON(data);
                          if(data.status_code==200){
                              swal({
                                  title: "Success!",
                                  text: data.status_message,
                                  icon: "success"
                              }, function() {
                                    // Clear all form fields
                                  $("#submit_work")[0].reset();
                                  $("#work_list").selectpicker('refresh');
                                  $("#item_list").selectpicker('refresh');
                                  $("#work_category").selectpicker('refresh');
                                  $("#work_status").selectpicker('refresh');
                                  $("#area").selectpicker('refresh');
                                  $("#work_code_text").text("Work Code");
                                  $("#uom_text").text("UOM");
                                  // Re-set selected train number and coach number
                                  $("#select_train").val(selectedTrain);
                                  $("#select_coach").val(selectedCoach);
                                  $("#time1").val(time1);
                                  $("#time2").val(time2);
                                  $("#date").val(date);
                              });
                            }else{
                              swal({
                                  title: "Failed!",
                                  text: "Error Occuered..",
                                  icon: "Failed"
                              });

                            }
                          
                      },
                      error: function(xhr, status, error) {
                          console.error('Error:', error);
                      }
                  });

                });
          });

          $('#item_list').change(function(){
            var optionSelected=$(this).find('option:selected');
            var uom=optionSelected.data('uom');
            var rate=optionSelected.data('rate');
            var warranty_days=optionSelected.data('warranty');
            $("#uom").val(uom);
            $("#uom_text").text('UOM:'+uom);
            $("#rate").val(rate);
            $("#warranty_days").val(warranty_days);
          });
          $('#work_category').change(function(){
            var optionSelected=$(this).find('option:selected');
            var selected_category=optionSelected.data('category');
            console.log(selected_category)
            var selector_work_list='#work_list';
            $.post("<?php echo base_url("api/Get_api/getWorkList"); ?>",{
               work_category:selected_category
            },function(data){
                $(selector_work_list).html("");
                var data = jQuery.parseJSON(data);
                $(selector_work_list).append($('<option>',{value: "",text: "SELECT <?php echo "WORK";?>"}));
                if(data.status_code == '200'){
                    $.each(data.result,function(index,value){
                      var work_list=value.work_name;
                        $(selector_work_list).append('<option value="'+value.work_name+'" data-work-code="'+value.work_code+'">'+
                                                  work_list+'</option>');
                    });
                }
                $(selector_work_list).selectpicker('refresh');
            });
          });
          $("#work_list").change(function(){
                var optionSelected=$(this).find('option:selected');
                var work_code=optionSelected.data('work-code');
                $("#work_code").val(work_code);
                $("#work_code_text").text('Work Code :'+work_code);
                console.log("selected work code",work_code);
                var selector_item_list='#item_list';
                $.post("<?php echo base_url("api/Get_api/getItemList"); ?>",{
                   work_code:work_code
                },function(data){
                    $(selector_item_list).html("");
                    var data = jQuery.parseJSON(data);
                    $(selector_item_list).append($('<option>',{value: "",text: "SELECT <?php echo "ITEM";?>"}));
                    if(data.status_code == '200'){
                        $.each(data.result,function(index,value){
                          var item_name=value.item_name;
                            $(selector_item_list).append('<option value="'+value.item_name+'" data-uom="'+value.uom+'" data-rate="'+value.work_rate+'" data-warranty="'+value.warranty_days+'">'+
                                                      item_name+'</option>');
                        });
                    }
                    $(selector_item_list).selectpicker('refresh');
                });
          });
            

      });


    </script>