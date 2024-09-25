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
    <script src="<?php echo base_url("assets/layout/js/admin.js?v=".ADMINJS_VERSION); ?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/tables/jquery-datatable.js"); ?>"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url("assets/layout/js/demo.js"); ?>"></script>




<!--Logic JS-->

<script type="text/javascript">
jQuery(document).ready(function(){     
        function initializeMobileTable(){
            $.get("<?php echo base_url("Railway/getActivitiesData"); ?>",function(data){
                      
                      var response = jQuery.parseJSON(data);

                      if( $.fn.DataTable.isDataTable( '#example2' ) ) {
                          $('#example2').DataTable().destroy();
                          $('#example2').empty();
                      }; 

                      if(response.status_code == "200"){

                        var arr = response.result;
                        console.log(arr);
                        var columns = [];
                        var j = 0;
                        columns[j] = {"title" : "Sno","data":"Sno",render: function (data, type, row, meta)             { return meta.row + meta.settings._iDisplayStart + 1; }
                                     };

                        // for(var key in arr[0]){
                        //     columns[++j] = {"title" : key,"data":key};
                        // }
                        columns[++j]={"title":"Data","data":"Data"};

                        json = {
                                   "data":sanitizeDataMobile(arr),
                                   "columns":columns,
                                   "destroy": true,
                                   "ordering":false, 
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
                              $("#mycardTable").css({
                                "border": "2px solid #ccc"
                              });
                              $('#example2').removeClass('table-bordered');
                              $("#example2 tbody tr td, #example2 tbody tr th").css({
                                    "padding": "1px",
                                    "border": "1px solid #eee"
                              });

                      }else{
                        console.log("server error");
                        return false;
                      }

           });
        }   
        function initializeWebTable(){
         
           // $.get("<?php echo base_url("Railway/getPreBillingData"); ?>",function(data){
         
           $.get("<?php echo base_url("Railway/getActivitiesData"); ?>",function(data){
                      
                      var response = jQuery.parseJSON(data);

                      if( $.fn.DataTable.isDataTable( '#example2' ) ) {
                          $('#example2').DataTable().destroy();
                          $('#example2').empty();
                      }; 

                      if(response.status_code == "200"){

                        var arr = response.result;
                        var columns = [];
                        var j = 0;

                        columns[j] = {"title" : "Sno","data":"Sno",render: function (data, type, row, meta)             { return meta.row + meta.settings._iDisplayStart + 1; }
                                     };

                        for(var key in arr[0]){
                            if(key=='id'){
                                continue;
                            }
                            columns[++j] = {"title" : key,"data":key};
                        }

                        json = {
                                   "data":sanitizeData(arr),
                                   "columns":sanitizeColumns(columns),
                                   "destroy": true, 
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

                      }else{
                        console.log("server error");
                        return false;
                      }

           });

                      
       }


        if (window.innerWidth <= "<?php echo MOBILE_SCREEN_WIDTH;?>") {
                // Mobile view
                initializeMobileTable();
            } else {
                // Web view
                initializeWebTable();
        }
});
</script>


<script type="text/javascript">
    
    function sanitizeData(jsonArray) {
        var newKey;
        jsonArray.forEach(function(item) {
            for (key in item) {
                newKey = key.replace(/\s/g, '').replace(/\./g, '');
                if (key != newKey) {
                    item[newKey]=item[key];
                    delete item[key];
                }     
            }    
        })    
        return jsonArray;
    }
      //remove whitespace and dots from data : <propName> references
    function sanitizeColumns(jsonArray) {
        var dataProp;
        jsonArray.forEach(function(item) {
            dataProp = item['data'].replace(/\s/g, '').replace(/\./g, '');
            item['data'] = dataProp;
        })
        return jsonArray;
    } 
    function sanitizeDataMobile(jsonArray) {
        var newKey;
        var newArr=[];
        var i=0;
        jsonArray.forEach(function(item) {
            // for (key in item) {
            //     newKey = key.replace(/\s/g, '').replace(/\./g, '');
            //     if (key != newKey) {
            //         item[newKey]=item[key];
            //         delete item[key];
            //     }     
            // } 
            newArr.push({
                'Data':`<div class="card" style="margin-bottom:0px;">
                    <div class="body">
                        <table style="width:100%;border:2px solid #ccc" id="mycardTable">
                        <tr>
                        <th>Train No</th>
                        <th>Date</th>
                        </tr>
                        <tr>
                        <td>${item.train_number}</td>
                        <td>${item.date}</td>
                        </tr>
                        <tr>
                        <th>Coach No</th>
                        <th>Coach Type</th>
                        </tr>
                        <tr>
                        <td>${item.coach_number}</td>
                        <td>${item.coach_category}</td>
                        </tr>
                        <tr><th colspan="2">Work List</th></tr>
                        <tr><td colspan="2">${item.work_list}</td></tr>
                        <tr>
                        <th>Item</th>
                        <th>UOM</th>
                        </tr>
                        <tr><td>${item.item_list}</td><td>${item.uom}</td></tr>
                        <tr>
                        <th>Qty</th>
                        <th>Area</th>
                        </tr>
                        <tr><td>${item.qty}</td><td>${item.area}</td></tr>
                        <th>Category</th>
                        <th>Work Code</th>
                        </tr>
                        <tr><td>${item.work_category}</td><td>${item.work_code}</td></tr>
                        <th>Warranty</th>
                        <th>Status</th>
                        </tr>
                        <tr><td>${item.warranty_days}</td><td>Pending</td></tr>
                        <th>Approve By</th>
                        <th>Feed By</th>
                        </tr>
                        <tr><td></td><td>${item.added_by}</td></tr>
                        </table>
                    </div>
                </div>`
            });  
        });    
        console.log("rows");
        console.log(newArr);
        return newArr;
    }             
   
    function sanitizeColumnsMobile(jsonArray) {
        var dataProp;
        var newArr=[]
        // jsonArray.forEach(function(item) {
        //     dataProp = item['data'].replace(/\s/g, '').replace(/\./g, '');
        //     item['data'] = dataProp;
        // })
        //newArr[0]['data']="Data";
        console.log("columns");
        console.log(jsonArray);
        return jsonArray;
    }  

 
</script>
<script type="text/javascript">
    
    jQuery(document).ready(function(){           
         

    });
</script>
