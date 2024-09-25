<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <?php echo $title;?>
                    <small></small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="card" style="padding-left: 12px;padding-top: 5px;">
                <div class="row clearfix">
                                <div class="col-sm-4">
                                    <h2 class="card-inside-title">Train Number</h2>
                                    <div class="form-group">
                                        <select class="form-control show-tick train_numbers" data-live-search="true" data-selected-text-format="count" data-size="4" id="select_train" name="select_train">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h2 class="card-inside-title">SSE/JEE</h2>
                                    <div class="form-group" id="bs_datepicker_component_container">
                                        <div class="">
                                            <span id="sse_name"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h2 class="card-inside-title">From Date</h2>
                                    <div class="form-group" id="bs_datepicker_component_container">
                                        <div class="form-line" style="display:flex;">
                                            <input type="date" class="" value="<?php echo date('Y-m-d');?>" name="date1" id="date1">To
                                            <input type="date" class=" " value="<?php echo date('Y-m-d');?>" name="date2" id="date2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <button type="button" id="filter" class="btn bg-blue waves-effect" data-status="Verified" style="margin-bottom: 5px;">Filter</button>
                                </div>
                            </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header <?php echo BG_BLUE_GREY; ?>">
                            <h2>
                                <?php echo $title;?>
                            </h2>
                        </div>
                        <div class="body">

                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Please wait..</td>
                                        </tr>
                                        <!-- Table body will be populated by DataTables -->
                                    </tbody>
                                </table>
                                <?php if($this->session->userdata("type")=="sse" && $approve_button){ ?>
                                <div class="container-fluid">
                                    
                                </button>
                                    <button type="button" id="submitCheckedData" class="btn bg-blue waves-effect" data-status="Verified">Verify</button>
                                    <button type="button" id="submitCheckedData" class="btn bg-red waves-effect" data-status="Rejected">Reject</button>
                                </div>

                                <?php } ?>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

