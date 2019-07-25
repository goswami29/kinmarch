<?php $this->load->view('admin/include/header') ?>

<!-- Start page content wrapper -->
<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content">
        <?php
        $msg = $this->session->flashdata('msg');
        if (isset($msg) && !empty($msg)) {
            ?>
            <div class="alert alert-success">
                <span><?php echo $msg ?></span>
            </div>
        <?php } ?>

        <div class="wrapper-content "> </div>

        <?php $this->load->view('admin/include/footer') ?>

    </div>
</div>
