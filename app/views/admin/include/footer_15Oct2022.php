 <!-- Footer --> 
            <div class="legal">
                <div class="copyright">
                    <a href="javascript:void(0);">Technical Support By Vdai Biosec Pvt Ltd</a>
                </div>
                <div class="version">
                    <!--<b>Version: </b> 1.0.5-->
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
<?php $this->load->view($mainContent); ?>
<?php $this->load->view($footerJs); ?>
</body>
     <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap-notify/bootstrap-notify.js");?>"></script>
   <script src="<?php echo base_url("assets/layout/js/pages/ui/notifications.js");?>"></script>
   <script type="text/javascript">
       jQuery(document).ready(function(){

           // setInterval(
           //   function(){
           //         $.get("<?php //echo base_url("Login/logout_time"); ?>",function(data){});
           //   }
           //  ,40000);


           $("#egramswaraj").click(function() {
                $.post("<?php echo base_url("Login/clickonegramswaraj"); ?>",{
                    user_agent: localStorage.getItem('public_ip')
                },function(data){});
                return true;
           });


           $(".datetimepicker2").bootstrapMaterialDatePicker({
                maxDate : '<?php echo date("Y-m-d H:i"); ?>',
                format :  'YYYY-MM-DD HH:mm',
                weekStart: 1
           });

           $('.datepicker2').bootstrapMaterialDatePicker({
                maxDate : '<?php echo date("Y-m-d"); ?>',
                format: 'YYYY-MM-DD',
                weekStart: 1,
                time: false
           });

       });


       // myVar = setInterval(getPendingActionData,7000);
       //      function getPendingActionData(){
       //         $.post("<?php //echo  base_url("incidence/getIncidenceForDashboard"); ?>",
       //         {},function(data){
       //          console.log(data);
       //           var respone = JSON.parse(data);
       //           IncidenceIds = Array();
       //           IncidenceCount = 0;
       //           $.each(respone.result.yourAction, function (index, value) {
       //              //IncidenceIds.push(value.incidence_id);
       //              //if(CurrentIncidenceIds.indexOf(value.incidence_id)==-1){
       //                IncidenceCount++;
       //              //}
       //           });
       //           if(IncidenceCount!=0){
       //            showNotification("",`
       //                     You Have ${IncidenceCount} Pending Actions. <a href="<?php //echo base_url('Admin/dashboard'); ?>">Click Here</a>
       //                  `, "top", "right", "", "");
       //           }
       //         });
       //      }
   </script>



       <!-- <script type="text/javascript">
            $(document).ready(function () {
                //Disable full page
                $("body").on("contextmenu",function(e){
                    return false;
                });
                
            });
            </script>

            <script type="text/javascript">
            $(document).ready(function () {
                //Disable full page
                $('body').bind('cut copy paste', function (e) {
                    e.preventDefault();
                });
             
            });
            </script>

            <script type="text/javascript">
              
                $(window).bind('keydown', function(event) {
                    if (event.ctrlKey || event.metaKey) {
                        switch (String.fromCharCode(event.which).toLowerCase()) {
                        case 's':
                            event.preventDefault();   
                            //alert('ctrl-s');
                            break;
                        case 'f':
                            event.preventDefault();
                            //alert('ctrl-f');
                            break;
                        case 'g':
                            event.preventDefault();
                            //alert('ctrl-g');
                            break;
                        }
                    }
                });
            </script>-->
</html>