<?php $this->load->view('admin/include/header') ?>
<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content" >
        <div class="wrapper-content ">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="widgets-container">
                            <h5>Change Password </h5>
                            <hr>
                            <?php
                            $error = $this->session->flashdata('err');
                            if (isset($error) && !empty($error)) {
                                ?>
                                <div class="alert alert-danger">
                                    <span><?php echo $error ?></span>
                                </div>
                            <?php } ?>
                            <form method="Post"  action="<?php echo site_url('admin/setting/changepassword') ?>" >
                                <input type="hidden" name="user_id" value="">
                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">Current Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="oldPassword" type="password" required=""  value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="renewPassword" required="" type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">Re-type Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="newPassword" required="" type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('admin/include/footer') ?>
    </div>
</div>
