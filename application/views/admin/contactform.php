<?php $this->load->view('admin/include/header') ?>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<?php
if (isset($edit) && !empty($edit)) {
    $id = $edit['id'];
    $email_id1 = $edit['email_id1'];
    $email_id2 = $edit['email_id2'];
    $mobile_no2 = $edit['mobile_no2'];
    $mobile_no = $edit['mobile_no'];
    $address = $edit['address'];
    $facebook = $edit['facebook'];
    $instagram = $edit['instagram'];
    $twitter = $edit['twitter'];
    $linkedin = $edit['linkedin'];
    $google_plus = $edit['google_plus'];
} else {
    $id = set_value('id');
    $email_id1 = set_value('email_id1');
    $email_id2 = set_value('email_id2');
    $mobile_no2 = set_value('mobile_no2');
    $mobile_no = set_value('mobile_no');
    $address = set_value('address');
    $facebook = set_value('facebook');
    $instagram = set_value('instagram');
    $twitter = set_value('twitter');
    $linkedin = set_value('linkedin');
    $google_plus = set_value('google_plus'); 
}
?>
<!-- Start page content wrapper -->
<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content" >
        <div class="wrapper-content ">
            <div class="row">
                <div class="col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="widgets-container">
                            <?php
                            $err = $this->session->flashdata('err');
                            if (isset($err) && !empty($err)) {
                                ?>
                                <div class="alert alert-warning">
                                    <span><?php echo $err ?></span>
                                </div>
                            <?php } ?>
                            <h5>Edit Contact Details </h5>
                            <hr>
                            <form method="Post"  action="<?php echo site_url('admin/Contact/addcontact') ?>" >
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <textarea class="form-control" id="editor3" name="address" required=""><?php echo $address ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile No1</label>
                                    <input class="form-control m-t-xxs" id="input2" name="mobile_no" required="" type="text" value="<?php echo $mobile_no ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile No2</label>
                                    <input class="form-control m-t-xxs" name="mobile_no2" type="text" value="<?php echo $mobile_no2 ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email ID1</label>
                                    <input class="form-control m-t-xxs" name="email_id1" required="" type="text" value="<?php echo $email_id1 ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email ID2</label>
                                    <input class="form-control m-t-xxs" name="email_id2" type="text" value="<?php echo $email_id2 ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook Link</label>
                                    <input class="form-control m-t-xxs" name="facebook" type="text" value="<?php echo $facebook ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instagram Link</label>
                                    <input class="form-control m-t-xxs" name="instagram" type="text" value="<?php echo $instagram ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Twitter Link</label>
                                    <input class="form-control m-t-xxs" name="twitter" type="text" value="<?php echo $twitter ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Google Plus</label>
                                    <input class="form-control m-t-xxs" name="google_plus" type="text" value="<?php echo $google_plus ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Linked-in Link</label>
                                    <input class="form-control m-t-xxs" name="linkedin" type="text" value="<?php echo $linkedin ?>">
                                </div>
                                <button type="submit" name="submit" class="btn  mb-0 aqua m-t-xs bottom15-xs">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('admin/include/footer') ?>
    </div>
</div>

<script>
    CKEDITOR.replace('editor3');
    CKEDITOR.config.autoParagraph = false;
</script>