<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <!-- Create Form -->
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header <?php echo BG_BLUE_GREY; ?>">
                            <h2>
                                <?php echo "Edit Train"." <span></span>"; ?>
                            </h2>
                        </div>
                        <div class="body" style="overflow-x: scroll;">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="example2">
                                <caption style="caption-side: top;color: #254756;font-weight: bold;" ></caption>
                                    <thead class="<?php echo BG_BLUE_GREY; ?>">
                                        
                                            <tr>
                                                <th class="font-12" style="background: #2196f3;">Sno</th>
                                                
                                                <th class="font-12" style="background: #2196f3;">Train Number</th>
                                                <th class="font-12" style="background: #2196f3;">Action</th>
                                                <th class="font-12" style="background: #2196f3;">Status</th>
                                               
                                            </tr>
                                        
                                    </thead>
                                    <tbody>

                                        <?php if(count($data)>0){ ?>
                                            <?php $i=0; foreach($data as $row){ ?>
                                                <tr data-class='<?php echo $row["class"]; ?>' class='<?php echo $row["class"]; ?> all'>
                                                    <td class="font-12" style="/*background: #e3f2fd;*/"><?php echo ++$i; ?></td>
                                                   
                                                    <td class="font-12" style="background: #e3f2fd;text-transform: capitalize;"><?php echo $row['train_number'] ; ?></td>
                                                    <td class="font-12" style="background: #e3f2fd;text-transform: capitalize;">
                                                    <select id="trainStatus<?php echo $i; ?>" class="form-control input_type show-tick" name="" data-size="5" data-properties="<?php echo $row['train_number'] ; ?>" required >
                                                            <option value="">--Select Input Type--</option>
                                                            <option value="0">Block Train</option>
                                                            <option value="1">Active Train</option>
                                                            <option value="Delete Train">Delete Train</option>
                                                    </select>
                                                    
                                                    </td>
                                                    <td class="font-12" style="background: #e3f2fd;text-transform: capitalize;">
                                                        <button type="submit" class="btn btn-success updateStatusBtn" data-train-number="<?php echo $row['train_number']; ?>" data-status-id="trainStatus<?php echo $i; ?>">
                                                            Update
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php }?>
                                        
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>









        </div>
    </section>
