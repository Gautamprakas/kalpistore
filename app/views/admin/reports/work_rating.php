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
                                            <input type="date" class="" value="<?php echo date('Y-m-d');?>" name="date1" id="date2">To
                                            <input type="date" class=" " value="<?php echo date('Y-m-d');?>" name="date1" id="date2">
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
<?php if($this->session->userdata("type")=="sse"){ ?>
<div class='icon-button-demo' style='display: inline-flex;'><button type='button'  class='btn bg-black btn-circle waves-effect waves-circle waves-float rating-button' data-status='Verified' data-rating='0' >0<i class='material-icons'>star_rate</i><button type='button'  class='btn bg-red btn-circle waves-effect waves-circle waves-float rating-button' data-status='Verified' data-rating='1' >1<i class='material-icons'>star_rate</i></button><button type='button' class='btn bg-amber btn-circle waves-effect waves-circle waves-float rating-button' data-status='Verified' data-rating='2' >2<i class='material-icons'>star_rate</i></button><button type='button'  class='btn bg-light-green btn-circle waves-effect waves-circle waves-float rating-button' data-status='Verified' data-rating='3'>3<i class='material-icons'>star_rate</i></button></div>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>







        </div>
    </section>


<!-- Modal -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Update</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect save_changes">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>