<?php $this->load->view('admin/include/header') ?>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<?php
if (isset($edit) && !empty($edit)) {
    $id = $edit['id'];
    $email = $edit['email'];
    $eng_address = $edit['eng_address'];
    $fr_address = $edit['fr_address'];
    $map = $edit['map'];
    $status = $edit['status'];
} else {
    $id = set_value('id');
    $email = set_value('email');
    $eng_address = set_value('eng_address');
    $fr_address = set_value('fr_address');
    $map = set_value('map');
    $status = set_value('status');
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
                            <h3>Add / Edit Store Address</h3>
                            <hr>
                            <form method="Post"  action="<?php echo site_url('admin/ourshops/addshop') ?>" >
                                <input type="hidden" name="id" value="<?php echo $id ?>">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Store Email Address</label>
                                    <input class="form-control m-t-xxs" name="email" required="" type="text" value="<?php echo $email ?>">
                                </div>

                                <div class="form-group">
                                    <label>English Address</label>
                                    <textarea class="form-control" rows="4" name="eng_address" required=""><?php echo $eng_address ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>French Address</label>
                                    <textarea class="form-control" rows="4" name="fr_address" required=""><?php echo $fr_address ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Map</label>
                                    <textarea class="form-control" rows="5" name="map" required=""><?php echo $map ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-14">
                                        <select class="form-control" name="status">
                                            <option value="1" <?php echo($status == '1' ? 'selected' : '') ?>>Active</option>
                                            <option value="0" <?php echo($status == '0' ? 'selected' : '') ?>>De-Active</option>
                                        </select>
                                    </div>
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
