<?php $this->load->view('admin/include/header') ?>
<!-- Start page content wrapper -->
<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <!-- / ibox-title -->
                    <div id="demo7" class="ibox-content collapse show">
                        <div class="borderedTable">
                            <?php
                            $msg = $this->session->flashdata('msg');
                            if (isset($msg) && !empty($msg)) {
                                ?>
                                <div class="alert alert-success">
                                    <span><?php echo $msg ?></span>
                                </div>
                            <?php } ?>
                           <h2> Contact List </h2>
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th> Address</th>
                                            <th> Mobile No.</th>
                                            <th> Email Id </th>
                                            <th> Facebook Link</th>
                                            <th> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($list) && !empty($list)) {
                                            $i = 1;
                                            foreach ($list as $val) {
                                                ?>
                                                   <tr id="banners-<?php echo $val['id']; ?>">

                                                   <td><?php echo $val['address']; ?></td>
                                                    <td><?php echo $val['mobile_no']; ?></td>
                                                    <td><?php echo $val['email_id1']; ?></td>
                                                    <td><?php echo $val['facebook']; ?> </td>
                                                    <td>
                                                        <a href = '<?php echo site_url('admin/Contact/edit/' . $val['id']); ?>' class='btn btn-outline btn-round green btn-sm blue'> <i class='fa fa-edit'></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                        }
                                        ?>  

                                    </tbody>
                                </table>
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