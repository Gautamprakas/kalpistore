<!--Menu -->
<?php
if($this->session->userdata("type")==USER_ADMIN){
    $type=USER_ADMIN;
}else if($this->session->userdata("type")==USER_SSE){
    $type=USER_SSE;
}else if($this->session->userdata("type")==USER_CONTRACTOR){
    $type=USER_CONTRACTOR;
}else if($this->session->userdata("type")==SBS_ADMIN){
    $type=SBS_ADMIN;
}else if($this->session->userdata("type")==SSE_ADMIN){
    $type=SSE_ADMIN;
}
?>
<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        

        <li class="<?php if(strcasecmp($menuActive, 'home') == 0) echo 'active'; ?>">
            <a href="<?php echo base_url('Railway/dashboard'); ?>" onclick="//return false;">
                <i class="material-icons">dashboard</i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- //Master Menu -->
        <?php if( $type==USER_ADMIN || $type==SSE_ADMIN || $type==SBS_ADMIN ){ ?>
                    <li class="<?php if(strcasecmp($menuActive, 'update_form1') == 0) echo 'active'; ?>">
                       <a href="javascript:void(0);" class="menu-toggle">
                           <i class="material-icons">train</i>
                           <span>Train Master</span>
                       </a>
                       <ul class="ml-menu">
                            
                               <li class="<?php if(strcasecmp($subMenuActive, 'add_train') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/addTrain'); ?>">Add Train</a>
                               </li>
                               <li class="<?php if(strcasecmp($subMenuActive, 'edit_train') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/editTrain'); ?>">Edit Train</a>
                               </li>
                        </ul>
                   </li>
                   <li class="<?php if(strcasecmp($menuActive, 'update_form2') == 0) echo 'active'; ?>">
                       <a href="javascript:void(0);" class="menu-toggle">
                           <i class="material-icons">directions_railway</i>
                           <span>Coach Master</span>
                       </a>
                       <ul class="ml-menu">
                            
                               <li class="<?php if(strcasecmp($subMenuActive, 'add_coach') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/addCoach'); ?>">Add Coach</a>
                               </li>
                               <li class="<?php if(strcasecmp($subMenuActive, 'edit_coach') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/editCoach'); ?>">Edit Coach</a>
                               </li>
                        </ul>
                   </li>
               <?php } ?>
               <?php if( $type==USER_ADMIN ){ ?>
                   <li class="<?php if(strcasecmp($menuActive, 'update_form3') == 0) echo 'active'; ?>">
                       <a href="javascript:void(0);" class="menu-toggle">
                           <i class="material-icons">space_bar</i>
                           <span>Berth Master</span>
                       </a>
                       <ul class="ml-menu">
                            
                               <li class="<?php if(strcasecmp($subMenuActive, 'add_berth') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/addBerth'); ?>">Add Toilet/Berth Number</a>
                               </li>
                               <li class="<?php if(strcasecmp($subMenuActive, 'edit_berth') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/editBerth'); ?>">Toilet/Berth Number List</a>
                               </li>
                        </ul>
                   </li>
                   
                   <li class="<?php if(strcasecmp($menuActive, 'update_form5') == 0) echo 'active'; ?>">
                       <a href="javascript:void(0);" class="menu-toggle">
                           <i class="material-icons">add_shopping_cart</i>
                           <span>Item Master</span>
                       </a>
                       <ul class="ml-menu">
                            
                               <li class="<?php if(strcasecmp($subMenuActive, 'add_item') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/addItem'); ?>">Add Item</a>
                               </li>
                               <li class="<?php if(strcasecmp($subMenuActive, 'edit_item') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/editItem'); ?>">  Item List</a>
                               </li>
                        </ul>
                   </li>
                   <li class="<?php if(strcasecmp($menuActive, 'update_form4') == 0) echo 'active'; ?>">
                       <a href="javascript:void(0);" class="menu-toggle">
                           <i class="material-icons">linear_scale</i>
                           <span>UOM Master</span>
                       </a>
                       <ul class="ml-menu">
                            
                               <li class="<?php if(strcasecmp($subMenuActive, 'add_uom') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/addUom'); ?>">Add UOM</a>
                               </li>
                               <li class="<?php if(strcasecmp($subMenuActive, 'edit_uom') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/editUom'); ?>">UOM List</a>
                               </li>
                        </ul>
                   </li>
                   <li class="<?php if(strcasecmp($menuActive, 'update_form6') == 0) echo 'active'; ?>">
                       <a href="javascript:void(0);" class="menu-toggle">
                           <i class="material-icons">work</i>
                           <span>Work Name/Code/Rate Master</span>
                       </a>
                       <ul class="ml-menu">
                            
                               <li class="<?php if(strcasecmp($subMenuActive, 'add_work') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/addWork'); ?>">Add Work Name/Code/Rate</a>
                               </li>
                               <li class="<?php if(strcasecmp($subMenuActive, 'edit_work') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/editWork'); ?>">  Work List</a>
                               </li>
                        </ul>
                   </li>
                   <li class="<?php if(strcasecmp($menuActive, 'warranty') == 0) echo 'active'; ?>">
                       <a href="javascript:void(0);" class="menu-toggle">
                           <i class="material-icons">history</i>
                           <span>Warranty Master</span>
                       </a>
                       <ul class="ml-menu">
                            
                               <li class="<?php if(strcasecmp($subMenuActive, 'add_warranty') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/addWarranty'); ?>">Add Warranty</a>
                               </li>
                               <li class="<?php if(strcasecmp($subMenuActive, 'edit_warranty') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/editWarranty'); ?>">  Warranty List</a>
                               </li>
                        </ul>
                   </li>
                   <li class="<?php if(strcasecmp($menuActive, 'update_form7') == 0) echo 'active'; ?>">
                       <a href="javascript:void(0);" class="menu-toggle">
                           <i class="material-icons">list</i>
                           <span>Work Category</span>
                       </a>
                       <ul class="ml-menu">
                            
                               <li class="<?php if(strcasecmp($subMenuActive, 'add_category') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/addCategory'); ?>">Add Category</a>
                               </li>
                               <li class="<?php if(strcasecmp($subMenuActive, 'edit_category') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/editCategory'); ?>">  Category List</a>
                               </li>
                        </ul>
                   </li>
                   <li class="<?php if(strcasecmp($menuActive, 'update_form8') == 0) echo 'active'; ?>">
                       <a href="javascript:void(0);" class="menu-toggle">
                           <i class="material-icons">list</i>
                           <span>Work Status Master</span>
                       </a>
                       <ul class="ml-menu">
                            
                               <li class="<?php if(strcasecmp($subMenuActive, 'add_status') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/addStatus'); ?>">Add Status</a>
                               </li>
                               <li class="<?php if(strcasecmp($subMenuActive, 'edit_status') == 0) echo 'active'; ?>">
                                   <a href="<?php echo base_url('Master/editStatus'); ?>">  Status List</a>
                               </li>
                        </ul>
                   </li>
                   <?php } ?>
        <!-- Master Menu Ends here -->
        <?php if($type==USER_CONTRACTOR){?>
            <li class="<?php if(strcasecmp($menuActive, 'update_activity') == 0) echo 'active'; ?>">
                            <a href="<?php echo base_url('Railway/updateActivities'); ?>">
                                <i class="material-icons">train</i>
                                <span>Update Activities</span>
                            </a>
            </li>

        <?php }?>
        <?php if($type==USER_ADMIN || $type==USER_SSE){?>
            <li class="<?php if(strcasecmp($menuActive, 'data_sheet') == 0) echo 'active'; ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">equalizer</i>
                                <span>Reports</span>
                            </a>
                            <ul class="ml-menu">
                                    <li class="<?php if(strcasecmp($subMenuActive, 'pre_billing') == 0) echo 'active'; ?>">
                                        <a href="<?php echo base_url('Railway/preBilling'); ?>">Pre Billing</a>
                                    </li>
                                    <li class="<?php if(strcasecmp($subMenuActive, 'work_order') == 0) echo 'active'; ?>">
                                        <a href="<?php echo base_url('Railway/workOrderReport'); ?>">Work Order Report</a>
                                    </li>
                                    <li class="<?php if(strcasecmp($subMenuActive, 'work_rating') == 0) echo 'active'; ?>">
                                        <a href="<?php echo base_url('Railway/workRatingReport'); ?>">Work Rating</a>
                                    </li>
                                     <!-- <li class="<?php if(strcasecmp($subMenuActive, 'warranty_report') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('view/CreateForm/reportInWarranty/1690450752274'); ?>">Resend For Rating</a>
                                   </li>
                                   <li class="<?php if(strcasecmp($subMenuActive, 'data_sheet_history') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('view/CreateForm/reportHistory/1690450752274'); ?>">Repair And Replace Hisotry</a>
                                   </li>
                                   <li class="<?php if(strcasecmp($subMenuActive, 'data_sheet_billing') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('view/CreateForm/reportBilling/1690450752274'); ?>">Billing Report</a>
                                   </li> -->
                                   
                                   <li class="<?php if(strcasecmp($subMenuActive, 'billing_done_report') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('view/CreateForm/finalBillingReport/1690365766/admin'); ?>">Print Billing Report</a>
                                   </li>
                                   <li class="<?php if(strcasecmp($subMenuActive, 'final_billing_report') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('view/CreateForm/finalBillingReport/1690450752274/admin'); ?>">Final Billing Report</a>
                                   </li>
                                    <li class="<?php if(strcasecmp($subMenuActive, 'billing_done_report_ssc') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('view/CreateForm/finalBillingReport/1690365766/ssc'); ?>">Print Billing Report SSC</a>
                                   </li>
                                   <li class="<?php if(strcasecmp($subMenuActive, 'final_billing_report_ssc') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('view/CreateForm/finalBillingReport/1690450752274/ssc'); ?>">Final Billing Report SSC</a>
                                   </li>
                            </ul>
            </li>
        <?php } ?> 
    <li class="<?php if(strcasecmp($menuActive, 'changepassword') == 0) echo 'active'; ?>">
                        <a href="<?php echo base_url('Admin/changePasswordView'); ?>">
                            <i class="material-icons">security</i>
                            <span>Change Password</span>
                        </a>
    </li>
    <?php if($type==USER_ADMIN || $type==SBS_ADMIN || $type==SSE_ADMIN){?>
        <li class="<?php if(strcasecmp($menuActive, 'assign_work') == 0) echo 'active'; ?>">
                           <a href="javascript:void(0);" class="menu-toggle">
                               <i class="material-icons">work</i>
                               <span>Assign Work</span>
                           </a>
                           <ul class="ml-menu">
                                   <?php $type='admin'; if( $type==USER_ADMIN || $type==SBS_ADMIN ){ ?>
                                   <li class="<?php if(strcasecmp($subMenuActive, 'assign_work_sbs_supervisor') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('Admin/assignWork/sbs_supervisor'); ?>">Conrtactor  Supervisor</a>
                                   </li>
                                   <?php } ?>
                                   <?php if( $type==USER_ADMIN || $type==SSE_ADMIN ){ ?>
                                   <li class="<?php if(strcasecmp($subMenuActive, 'assign_work_sse') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('Admin/assignWork/sse'); ?>">SSE</a>
                                   </li>
                                   <?php } ?>
                            </ul>
        </li>
        <li class="<?php if(strcasecmp($menuActive, 'create_user') == 0) echo 'active'; ?>">
                           <a href="javascript:void(0);" class="menu-toggle">
                               <i class="material-icons">face</i>
                               <span>Create User</span>
                           </a>
                           <ul class="ml-menu">
                                   <?php if( $type==USER_ADMIN || $type==SBS_ADMIN ){ ?>
                                   <li class="<?php if(strcasecmp($subMenuActive, 'createuser_sbs_supervisor') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('Admin/createUserView/sbs_supervisor'); ?>">Conrtactor  Supervisor</a>
                                   </li>
                                   <?php } ?>
                                   <?php if( $type==USER_ADMIN || $type==SSE_ADMIN ){ ?>
                                   <li class="<?php if(strcasecmp($subMenuActive, 'createuser_sse') == 0) echo 'active'; ?>">
                                       <a href="<?php echo base_url('Admin/createUserView/sse'); ?>">SSE</a>
                                   </li>
                                   <?php } ?>
                            </ul>
        </li>
    <?php }?>

    <ul>
                

</div>