<?php $this->load->view('admin/include/header') ?>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<?php
if (isset($edit) && !empty($edit)) {
    $id = $edit['id'];
    $userfile = $edit['image'];
    $status = $edit['status'];
} else {
    $id = set_value('id');
    $userfile = set_value('image');
    $status = set_value('status');
}
?>
<!-- Start page content wrapper -->
<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content" >

        <div class="wrapper-content ">
            <div class="row">
                <div class="col-lg-8">
                    <?php echo validation_errors(); ?>
                    <div class="ibox float-e-margins">
                        <div class="widgets-container">
                            <h3>Add / Edit Store Image</h3>
                            <hr>
                            <form method="Post"  action="<?php echo site_url('admin/StoreImage/addImage') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                               
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Store Header Image</label>
                                    <?php if (isset($edit['image']) && !empty($edit['image'])) { ?>
                                        <img class="stream-img" style="height:100px; margin-right: 10px;
                                             margin-bottom: 10px;" src="<?php echo base_url(); ?>upload/store/<?php echo $userfile ?>"/>
                                     <input type="hidden" name="userfile" value="<?php echo $userfile ?>" class="custom-file-input">
                                    <?php } ?>
                                    <div class="col-sm-12">
                                        <label class="custom-file">
                                            <input type="file" name="userfile" class="custom-file-input">
                                            <span class="custom-file-control"></span>
                                        </label>
                                    </div>
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
