<?php $this->load->view('admin/include/header') ?>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<?php
if (isset($edit) && !empty($edit)) {
    $id = $edit['id'];
    $title = $edit['title'];
    $description = $edit['description'];
    $status = $edit['status'];
} else {
    $id = set_value('id');
    $title = set_value('title');
    $description = set_value('description');
    $status = set_value('status');
}
?>
<!-- Start page content wrapper -->
<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content" >

        <div class="wrapper-content ">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="widgets-container">
                            <h5>Add / Edit Contact Address</h5>
                            <hr>
                            <form method="Post"  action="<?php echo site_url('admin/contactus/addcontact') ?>" >
                                <input type="hidden" name="id" value="<?php echo $id ?>">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address Title</label>
                                    <input class="form-control m-t-xxs" id="input2" name="title" required="" type="text" value="<?php echo $title ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="form-control" id="editor3" name="description" required=""><?php echo $description ?></textarea>
                                </div>
                                <script>
                                    CKEDITOR.replace('editor3');
                                    CKEDITOR.config.autoParagraph = false;
                                </script>

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
