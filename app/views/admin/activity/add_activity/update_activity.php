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
                            <h2>Update Activity</h2>
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
                            <form id="fetch_activity" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="work_code" required="" aria-required="true" id="work_code">
                                        <label class="form-label">Work Code</label>
                                    </div>
                                </div>
                                <button class="btn bg-indigo waves-effect" type="submit">Fetch Data</button>
                            </form>

                        </div>
                        <div class="card" style="display: none;" id="updateFormActivity">
                        <div class="header">
                            <h2>Update Activity</h2>
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
                            <form id="update_work" method="POST">
                                <div class="form-group form-float">
                                    <!-- <div class="form-line">
                                        <input type="text" class="form-control" name="work_code" required="" aria-required="true" id="work_code">
                                        <label class="form-label">Work Code</label>
                                    </div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="trainNumber" required="" aria-required="true" id="train_number">
                                        <label class="form-label">Train Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="coachNumber" required="" aria-required="true" id="coach_number">
                                        <label class="form-label">Coach Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="area" required="" aria-required="true" id="area">
                                        <label class="form-label">Toilet/Gallery/ Berth No.*</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="work_category" required="" aria-required="true" id="work_category">
                                        <label class="form-label">Work Category</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="work_list" required="" aria-required="true" id="work_list">
                                        <label class="form-label">Work List</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="work_status" required="" aria-required="true" id="work_status">
                                        <label class="form-label">Work Status</label>
                                    </div>
                                </div>
                                
                                <button class="btn bg-indigo waves-effect" type="submit">UPDATE</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>

            <!-- #END# Basic Validation -->
            <!-- Advanced Validation -->
            
            <!-- #END# Validation Stats -->
        </div>
    </section>