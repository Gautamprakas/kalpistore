<section class="content">
        <div class="container-fluid">
            <div class="block-header"> 
                <h2 style="display: inline-block;">DASHBOARD</h2>
                <input type="date" class=" form-control"  name="date1" id="date1" placeholder="Voucher Date" min="<?php echo START_DATE; ?>" max="<?php echo END_DATE; ?>" value="<?php echo END_DATE; ?>" style="width: auto;display: inline-block;">
            </div>
 

 
       
            
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>SUMMARY REPORT</h2>
                        </div>
                        <div class="body">
            <div class="table-responsive" style="overflow-x: hidden;">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-deep-orange">
                            <div class="icon">
                                <i class="material-icons">shopping_cart</i>
                            </div>
                            <div class="content">
                                <div class="text">ITEMS TO VERIFY</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">125</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-green">
                            <div class="icon">
                                <i class="material-icons">done</i>
                            </div>
                            <div class="content">
                                <div class="text">Verified</div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-yellow">
                            <div class="icon">
                                <i class="material-icons">do_not_disturb</i>
                            </div>
                            <div class="content">
                                <div class="text">Pending</div>
                                <div class="number count-to" data-from="0" data-to="117" data-speed="1000" data-fresh-interval="20">117</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-red">
                            <div class="icon">
                                <i class="material-icons">cancel</i>
                            </div>
                            <div class="content">
                                <div class="text">Rejected</div>
                                <div class="number count-to" data-from="0" data-to="10" data-speed="1000" data-fresh-interval="20">10</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-deep-purple">
                            <div class="icon">
                                <i class="material-icons">train</i>
                            </div>
                            <div class="content">
                                <div class="text">ASSIGNED TRAINS</div>
                                <div class="number count-to" data-from="0" data-to="2" data-speed="1500" data-fresh-interval="20">2</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-amber">
                            <div class="icon">
                                <i class="material-icons">star_rate</i>
                            </div>
                            <div class="content">
                                <div class="text">RATING ENTRIES</div>
                                <div class="number count-to" data-from="0" data-to="10" data-speed="1500" data-fresh-interval="20">10</div>
                            </div>
                        </div>
                    </div>

                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>



            <div class="row clearfix">

                <!-- Task Info -->
                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>RAILWAY RATING DONE STATUS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="overflow-y: scroll;height: 250px">
                                <table class="table table-hover table-bordered dashboard-task-infos" id="table2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No. of GP Payment Done</th>
                                            <th>No. of GP Payment Not done</th>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- #END# Task Info -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>RATING WISE PIE CHART</h2>
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
                        <div class="body"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                            <canvas id="pie_chart" height="211" width="423" style="display: block; width: 423px; height: 211px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>MONTH ON MONTH BAR CHART</h2>
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
                        <div class="body"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                            <canvas id="myBarChart" height="211" width="423" style="display: block; width: 423px; height: 211px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Task Info -->
                <!-- #END# Task Info -->
            </div>


        </div>
    </section>
