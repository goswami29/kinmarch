<?php $this->load->view('admin/include/header') ?>
<!-- Start page content wrapper -->
<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content">
        <div class="ibox-title">
            <h2> Contact Enquiry List </h2>
        </div>
        <div class="widgets-container">
            <form action="" method="get">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <!--<label class="control-label">Name</label>-->
                                <div>                                                
                                    <input type="text" name="name" autocomplete="off" placeholder="Name" class="form-control  m-t-xxs" value="<?php echo $name; ?>" placeholder="">
                                </div>
                            </div>                               
                        </div>                            
                        <div class="col-md-3">
                            <div class="form-group">
                                <!--<label class="control-label">Email</label>-->
                                <div>                                                
                                    <input type="text" name="email" autocomplete="off" placeholder="Email" class="form-control m-t-xxs" value="<?php echo $email; ?>" placeholder="">
                                </div>
                            </div>                               
                        </div>  
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <!--<label class="control-label" style="visibility: hidden;">User Id</label>-->
                                <div>                                                
                                    <button type="submit" name="search" class="btn btn-outline btn-round green">Search</button>
                                </div>
                            </div>                               
                        </div>                            
                        <div class="col-md-2">
                            <div class="form-group">
                                <!--<label class="control-label" style="visibility: hidden;">User Id</label>-->
                                <div>                                                
                                    <a href="<?php echo site_url('admin/Contactenquiry') ?>" class="btn btn-outline btn-round red">Reset</a>
                                </div>
                            </div>                               
                        </div>                            
                    </div>
                </div>                            
            </form>
        </div>
        <?php
        $starts_from = ($per_page * ($page - 1)) + 1;
        $end_to = $starts_from + $per_page - 1;
        if ($end_to > $num_rows) {
            $end_to = $num_rows;
        }
        $entries_text = "Showing " . $starts_from . " to " . $end_to . " of " . $num_rows . " entries";
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <!-- / ibox-title -->
                    <div id="demo7" class="ibox-content collapse show">
                        <div class="borderedTable">

                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th> Sr. No. </th>
                                            <th> Name </th>
                                            <th> Email </th>
                                            <th> Mobile </th>
                                            <th> Message </th>
                                            <th> Enquiry Date </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($list) && !empty($list)) {
                                            $i = 1;
                                            foreach ($list as $val) {
                                                ?>     
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td><?php echo $val['name']; ?> </td>
                                                    <td><?php echo $val['email']; ?></td>
                                                    <td><?php echo $val['mobile_no']; ?></td>
                                                    <td><?php echo $val['message']; ?></td>
                                                    <td><?php echo date('d M Y', strtotime($val['add_date'])); ?> </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                echo pagination($num_rows, $per_page, $page, $url);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php $this->load->view('admin/include/footer') ?>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/datepicker/jquery-ui.js"></script>
<link href="<?php echo base_url() ?>assets/datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
<script>
    $('.datepicker').datepicker({
        dateFormat: 'dd M yy',
        changeMonth: true,
        changeYear: true
    });
</script>
