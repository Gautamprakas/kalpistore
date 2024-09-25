
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                    <!-- Create Form -->
                    <div class="card" style="overflow-x: scroll";>
                    <form class="form-group form-float">
                      <table class="custom-table" style="width: 100%;font-weight: bold;">
                        <thead>
                        <tr style="margin-top: 50px;">
                          <td>
                            <label for="trainNumber">Train Number:</label>
                          <select  id="selectTrain" required>
                            <option value="">--Select Train Number--</option>
                        

                        </select>
                          </td>
                          <td colspan="1" style="text-align: right;">
                            <label for="maintenancePerson">Maintenance SEE/JEE:</label>
                            <span id="nameHere"></span>
                          </td>
                        </tr>
                        <tr>
                          <td>
                             <label for="date">From Date</label>
                            <input type="date" id="date1" data-info="" size="30" required style="margin-left:20px ;">&nbsp;To
                            <input type="date" id="date" data-info="" size="30" required style="margin-left:20px ;">
                          </td>
                          <td colspan="1" style="text-align: right;">
                            <label for="maintenanceFrom">Maintenance Slot- From &nbsp;<input type="time" id="time1" name="maintenanceFrom" required></label>
                            <label for="maintenanceTo">&nbsp;to&nbsp;&nbsp;</label>
                            <input type="time" id="time2" name="maintenanceTo" required>
                            
                          </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" id="submitTrain" class="btn btn-success">
                                               Submit
                                            </button>
                            </td>
                        </tr>
                    </thead>
                      </table>
                    </form>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header <?php echo BG_BLUE_GREY; ?>">
                           <h2>Work Order Report</h2>
                        </div>
                        <div class="body" style="overflow-x: scroll;">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="example2">
                                <caption style="caption-side: top;color: #254756;font-weight: bold;" ></caption>
                                    <thead class="<?php echo BG_BLUE_GREY; ?>">
                                            <tr>
                                                <th class="font-12" style="background: #009688;width: 5px;">SI.No</th>
                                                <th class="font-12" style="background: #009688;">DATA</th>
                                                
                                            </tr>
                                    </thead>
                                    <tbody id="myTableBody">
                <tr data-class='<?php echo $row["class"]; ?>' class='<?php echo $row["class"]; ?> all'>
                    <td class="font-12" style="/*background: #e3f2fd;*/">1</td>
                    <td class="font-12" style="/*background: #e3f2fd;*/">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="card">
                                <div class="body">
                                    <div class="table-responsive" style="height: auto;width: 100%;">
                                        <table class="table table-hover table-bordered dashboard-task-infos" id="table">
                                            <thead>
                                                <tr>
                                                    <th>Train No</th>
                                                    <th>Coach No</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>Item</th>
                                                    <th>UOM</th>
                                                </tr> 
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>12015</td>
                                                    <td>7648541</td>
                                                    <td>LWCNN</td>
                                                    <td>17-06-2024</td>
                                                    <td>Door Handle</td>
                                                    <td>Per Unit</td>
                                                    
                                                </tr>
                                                <tr id="tr">
                                                    <td colspan="3">
                                                        <p>
                                                            <td>Verfied</td>
                                                            <td>Door Handle</td>
                                                            <td>Door Handle</td>
                                                        </p>
                                                    </td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>









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