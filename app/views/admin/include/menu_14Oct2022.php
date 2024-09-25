<!--Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    
                    <li class="<?php if(strcasecmp($menuActive, 'home2') == 0) echo 'active'; ?> blink_me">
                        <a href="https://egramswaraj.gov.in/" onclick="//return false;" id="egramswaraj" target="_blank">
                            <i class="material-icons">navigation</i>
                            <span>Go To eGramSwaraj</span>
                        </a>
                    </li>

                     <li class="<?php if(strcasecmp($menuActive, 'home') == 0) echo 'active'; ?>">
                        <a href="<?php echo base_url('Admin/dashboard'); ?>" onclick="//return false;">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- <li class="<?php if(strcasecmp($menuActive, 'map') == 0) echo 'active'; ?>">
                        <a href="<?php echo base_url('Map'); ?>">
                            <i class="material-icons">map</i>
                            <span>Map</span>
                        </a>
                    </li> -->



<?php if(  $this->office_type == "ADMIN2"): ?>
                     <li class="<?php if(strcasecmp($menuActive, 'location') == 0) echo 'active'; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>Location</span>
                        </a>
                         <ul class="ml-menu">
                                <li class="<?php if(strcasecmp($subMenuActive, 'adddistrictview') == 0) echo 'active'; ?>">
                                    <a href="<?php echo base_url('Location'); ?>">Add District View</a>
                                </li>
                                <li class="<?php if(strcasecmp($subMenuActive, 'addoffice') == 0) echo 'active'; ?>">
                                    <a href="<?php echo base_url('Office'); ?>">Add Office</a>
                                </li>
                         </ul>
                    </li>
<?php endif; ?>


                    
<?php if( $this->location_type == "ADMIN" ||  $this->location_type == "DIVISION" ||  $this->location_type == "DISTRICT" ||  $this->location_type == "BLOCK" ): ?>

                    <li class="<?php if(strcasecmp($menuActive, 'employee') == 0) echo 'active'; ?>">
                        <a href="<?php echo base_url('Employee/employeeDetails'); ?>" onclick="//return false;">
                            <i class="material-icons">person</i>
                            <span>Gram Sachiwalaya Details</span>
                        </a>
                    </li>

<?php endif; ?>
                    

<?php if( $this->location_type == "ADMIN" ){ ?>
     <li class="<?php if(strcasecmp($menuActive, 'addIncidence1') == 0) echo 'active'; ?>">
        <a href="<?php echo base_url('Incidence/addIncidence1'); ?>" onclick="//return false;">
            <i class="material-icons">account_balance_wallet</i>
            <span>Upload eGramSwaraj Data</span>
        </a>
    </li>
<?php } ?>

<?php if( $this->location_type == "VILLAGE" ){ ?>
    <li class="<?php if(strcasecmp($menuActive, 'addIncidence2') == 0) echo 'active'; ?>">
        <a href="<?php echo base_url('Incidence/addIncidence2'); ?>" onclick="//return false;">
            <i class="material-icons">account_balance_wallet</i>
            <span>Maker Entry Form</span>
        </a>
    </li>

    <li class="<?php if(strcasecmp($menuActive, 'incidenceDetails2') == 0) echo 'active'; ?>">
        <a href="<?php echo base_url('Incidence/incidenceDetails2'); ?>" onclick="//return false;">
            <i class="material-icons">account_balance_wallet</i>
            <span>Checker Entry Form</span>
        </a>
    </li>
<?php } ?>

                    



                      <li class="<?php if(strcasecmp($menuActive, 'report') == 0) echo 'active'; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">equalizer</i>
                            <span>Reports</span>
                        </a>
                        <ul class="ml-menu">

                                <li class="<?php if(strcasecmp($subMenuActive, 'incidencedetails') == 0) echo 'active'; ?>">
                                    <a href="<?php echo base_url('Incidence/incidenceDetails/pending'); ?>">Expenditure Details</a>
                                </li>
                                

                                <?php if( $this->location_type == "ADMIN" || $this->location_type == "DIVISION" || $this->location_type == "DISTRICT" || $this->location_type == "BLOCK" ){ ?>
                                <!-- <li class="<?php //if(strcasecmp($subMenuActive, 'comparison') == 0) echo 'active'; ?>">
                                    <a href="<?php //echo base_url('Report/comparison'); ?>">Comparison</a>
                                </li> -->
                                <li class="<?php if(strcasecmp($subMenuActive, 'main') == 0) echo 'active'; ?>">
                                    <a href="<?php echo base_url('Report/main'); ?>">Summary</a>
                                </li>
                                <li class="<?php if(strcasecmp($subMenuActive, 'PanchayatGatewayTransactionAfter7PM') == 0) echo 'active'; ?>">
                                    <a href="<?php echo base_url('Report/Reports/PanchayatGatewayTransactionAfter7PM'); ?>">Panchayat Gateway Transaction After 7PM</a>
                                </li>
                                <li class="<?php if(strcasecmp($subMenuActive, 'PanchayatGatewayTransactionMatched') == 0) echo 'active'; ?>">
                                    <a href="<?php echo base_url('Report/Reports/PanchayatGatewayTransactionMatched'); ?>">Panchayat Gateway Transaction Matched</a>
                                </li>
                                <li class="<?php if(strcasecmp($subMenuActive, 'PanchayatGatewayTransactionNotMatched') == 0) echo 'active'; ?>">
                                    <a href="<?php echo base_url('Report/Reports/PanchayatGatewayTransactionNotMatched'); ?>">Panchayat Gateway Transaction Not Matched</a>
                                </li>
                                <li class="<?php if(strcasecmp($subMenuActive, 'notmMatchedEgramswaraj') == 0) echo 'active'; ?>">
                                    <a href="<?php echo base_url('Report/notmMatchedEgramswaraj'); ?>">eGramswaraj Not Matched Transactions</a>
                                </li>
                                <!-- <li class="<?php //if(strcasecmp($subMenuActive, 'loginDetails') == 0) echo 'active'; ?>">
                                    <a href="<?php //echo base_url('Report/loginDetails'); ?>">Login Details</a>
                                </li> -->
                                <?php } ?>

                                


                                <li class="<?php if(strcasecmp($subMenuActive, 'egramswaraj') == 0) echo 'active'; ?>">
                                    <a href="<?php echo base_url('Incidence/egramswaraj'); ?>">eGramSwaraj Log</a>
                                </li>
                         </ul>
                    </li>


                    <?php if( $this->location_type == "ADMIN" || $this->location_type == "DIVISION" || $this->location_type == "DISTRICT" ){ ?>

                    <li class="<?php if(strcasecmp($menuActive, 'report_links') == 0) echo 'active'; ?> blink_me">
                        <a href="<?php echo base_url('Report/report_links'); ?>">
                            <i class="material-icons">equalizer</i>
                            <span>12 To 22 September Report</span>
                        </a>
                    </li>
                    <?php } ?>



                  




                   
<?php if(  $this->location_type == "VILLAGE"){ ?>
                   <!--  <li class="<?php //if(strcasecmp($menuActive, 'viewSystemInfo') == 0) echo 'active'; ?>">
                        <a href="<?php //echo base_url('Incidence/viewSystemInfo'); ?>" onclick="//return false;" >
                            <i class="material-icons">system_update_alt</i>
                            <span>System Info</span>
                        </a>
                    </li> -->
<?php } ?>                  

                    <li class="<?php if(strcasecmp($menuActive, 'changepassword') == 0) echo 'active'; ?>">
                        <a href="<?php echo base_url('Employee/changePasswordView'); ?>">
                            <i class="material-icons">mode_edit</i>
                            <span>Change Password</span>
                        </a>
                    </li>

                   <!--  <li class="<?php //if(strcasecmp($menuActive, 'logout') == 0) echo 'active'; ?>">
                        <a href="<?php //echo base_url('Login/logout'); ?>">
                            <i class="material-icons">power_settings_new</i>
                            <span>Logout</span>
                        </a>
                    </li> -->
                   
                    
                </ul>
            </div> 
            <!-- #Menu