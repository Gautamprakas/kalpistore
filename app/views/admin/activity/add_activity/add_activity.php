<style type="text/css">
    .form-inline .bootstrap-select.btn-group .form-control{
        width : 85%;
    }
    .bootstrap-select.btn-group .dropdown-menu{
        z-index: 999;
    }
</style>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>
                    <?php echo $title ;?>
                </h1>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Activity</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            
                        <form id="submit_work" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <!-- ADD Activity -->
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <h2 class="card-inside-title">Train Number</h2>
                                    <div class="form-group">
                                        <select class="form-control show-tick train_numbers" data-live-search="true" data-selected-text-format="count" data-size="4" id="select_train" name="select_train">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h2 class="card-inside-title">Date</h2>
                                    <div class="form-group" id="bs_datepicker_component_container">
                                        <div class="form-line">
                                            <input type="date" class="form-control" value="<?php echo date('Y-m-d');?>" name="date" id="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h2 class="card-inside-title">From Time</h2>
                                    <div class="form-group" id="">
                                        <div class="form-line">
                                            <input type="time" class="" name="time1" id="time1">
                                            <span class="">to</span>
                                            <input type="time" class="" name="time2" id="time2">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label>Coach Number</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" data-live-search="true" data-selected-text-format="count" data-size="4" id="select_coach" name="select_coach">
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Toilet/Berth</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick train_numbers" data-live-search="true" data-selected-text-format="count" data-size="4" id="area" name="area">
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                        <label>Work Category</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick train_numbers" data-live-search="true" data-selected-text-format="count" data-size="4" id="work_category" name="work_category">
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-sm-4">
                                    <label>Work List</label>
                                    <div class="form-group">
                                        
                                        <div class="form-line">
                                            <select class="form-control show-tick train_numbers" data-live-search="true" data-selected-text-format="count" data-size="4" id="work_list" name="work_list">
                                            </select>
                                            <input type="hidden" class="form-control" id="work_code" name="work_code" value="">
                                            <span class="input-group-addon" id="work_code_text">Work Code</span>
                                        </div>
                                    </div>
                                    <!-- <label >Work Code</label> -->
                                </div>
                                <div class="col-sm-4">
                                        <label>Item List</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick train_numbers" data-live-search="true" data-selected-text-format="count" data-size="4" id="item_list" name="item_list">
                                                </select>
                                                <input type="hidden" class="form-control" id="rate" name="rate" value="">
                                                <input type="hidden" class="form-control" id="warranty_days" name="warranty_days" value="">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>QTY</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="qty" name="qty">
                                            <input type="hidden" class="form-control" id="uom" name="uom" value="">
                                            <span class="input-group-addon" id="uom_text">UOM</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                        <label>Work status</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick train_numbers" data-live-search="true" data-selected-text-format="count" data-size="4" id="work_status" name="work_status">
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Remark</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="remark" name="remark">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <button class="btn bg-indigo waves-effect" type="submit">SUBMIT</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            <!-- Advanced Validation -->
            
            <!-- #END# Validation Stats -->
        </div>
    </section>