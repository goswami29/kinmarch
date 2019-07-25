<?php $this->load->view('admin/include/header') ?>
<?php
if (isset($edit) && !empty($edit)) {
    $id = $edit['id'];
    $eng_name = $edit['eng_name'];
    $fr_name = $edit['fr_name'];
    $eng_description = $edit['eng_description'];
    $fr_description = $edit['fr_description'];
    $userfile = $edit['image'];
    $status = $edit['status'];
    $order = $edit['order'];
    $displayHome = $edit['display_home_page'];
} else {
    $id = set_value('id');
    $eng_name = set_value('eng_name');
    $fr_name = set_value('fr_name');
    $eng_description = set_value('eng_description');
    $fr_description = set_value('fr_description');
    $userfile = set_value('image');
    $status = set_value('status');
    $order = set_value('order');
    $displayHome = set_value('display_home_page');
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
                            <?php echo validation_errors(); ?>
                            <?php 
                            $err = $this->session->flashdata('err');
                            if (isset($err) && !empty($err)) {
                                ?>
                                <div class="alert alert-warning">
                                    <span><?php echo $err ?></span>
                                </div>
                            <?php } ?> 
                            <h5>Add / Edit  Product Category</h5>
                            <hr>

                            <form method="Post"  action="<?php echo site_url('admin/category/addcategory') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">English Category Name</label>
                                    <input class="form-control m-t-xxs" id="input1" name="eng_name" required="" type="text" value="<?php echo $eng_name ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">French Category Name</label>
                                    <input class="form-control m-t-xxs" id="input1" name="fr_name" required="" type="text" value="<?php echo $fr_name ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">English Description</label>
                                    <textarea class="form-control" id="editor2" name="eng_description" required=""><?php echo $eng_description ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">French Description</label>
                                    <textarea class="form-control" id="editor3" name="fr_description" required=""><?php echo $fr_description ?></textarea>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Category Image</label>
                                    <?php if (isset($edit['image']) && !empty($edit['image'])) { ?>
                                        <img class="stream-img" style="height:100px; margin-right: 10px;
                                             margin-bottom: 10px;"   src="<?php echo base_url(); ?>upload/category/<?php echo $userfile ?>"/>
                                             <?php
                                         }
                                         ?>
                                    <div class="col-sm-10">
                                        <label class="custom-file">
                                            <input type="file" id="file" name="userfile" <?php echo($userfile == '' ? 'required=""' : '') ?> class="custom-file-input">
                                            <span class="custom-file-control"></span>
                                        </label>
                                        <!-- <div style="color: red">[1920 X 670 pixels]</div> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-5 control-label">Display On Home Screen</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="display_home_page">
                                            <option value="0" <?php echo($displayHome == '0' ? 'selected' : '') ?>>No</option>
                                            <option value="1" <?php echo($displayHome == '1' ? 'selected' : '') ?>>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status">
                                            <option value="1" <?php echo($status == '1' ? 'selected' : '') ?>>Active</option>
                                            <option value="0" <?php echo($status == '0' ? 'selected' : '') ?>>De-Active</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                <label  class="col-sm-3 control-label">Sequence</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="order">
                                        <?php
                                        for ($i = 1; $i <= 100; $i++) {
                                            ?>
                                            <option value="<?php echo $i ?>" <?php echo($order == $i ? 'selected' : '') ?>>
                                                <?php echo $i ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span style="color:red"><?php echo form_error('order') ?></span>
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

<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
    CKEDITOR.config.autoParagraph = false;
</script>