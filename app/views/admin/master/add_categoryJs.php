<!-- Jquery Core Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery/jquery.min.js"); ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap/js/bootstrap.js"); ?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap-select/js/bootstrap-select.js"); ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery-slimscroll/jquery.slimscroll.js"); ?>"></script>

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

    <!-- SweetAlert Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/sweetalert/sweetalert.min.js"); ?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url("assets/layout/js/admin.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/forms/basic-form-elements.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/tables/jquery-datatable.js"); ?>"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url("assets/layout/js/demo.js"); ?>"></script>




<!--Logic JS-->

<script type="text/javascript">
    jQuery(document).ready(function(){
        
        $("#submitCategory").click(function(event){

            event.preventDefault();
            var category=$("#category").val();
            if(category==""){
                alert("Please enter category..");
                return;
            }
            // console.log(itemValue+uomValue+workCode+workName+workCat+workRate);
            $.ajax({

                url:'<?php echo base_url("Master/saveCategory"); ?>',
                method:'POST',
                data:{
                    category:category,

                },
                success:function(response){
                    alert(response);
                    window.location.href='<?php echo base_url("Master/addCategory"); ?>';
                    // alert("Data inserted success");

                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    
                }

            });
            

        });
        
        
    });
</script>
