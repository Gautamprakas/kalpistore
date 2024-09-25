<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <?php echo $title;?>
                    <small></small>
                </h2>
            </div>
            <!-- Exportable Table -->
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
                                <table id="example2" class="table-bordered table-striped table-hover dataTable js-exportable">
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
                                <?php if($this->session->userdata("type")=="sbs" && $mark_as_done){ ?>
                                <div class="container-fluid">
                                    
                                    <button type="button" id="submitCheckedWork" class="btn bg-blue waves-effect" data-status="work_done">Mark As Done</button>
                                    <!-- <button type="button" id="submitCheckedData" class="btn bg-red waves-effect" data-status="Rejected">Reject</button> -->
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

