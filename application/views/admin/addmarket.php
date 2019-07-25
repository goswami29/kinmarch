<?php $this->load->view('admin/include/header') ?>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<?php
if (isset($edit) && !empty($edit)) {
    $id = $edit['id'];
    $eng_title = $edit['eng_title'];
    $fr_title = $edit['fr_title'];
    $eng_description = $edit['eng_description'];
    $fr_description = $edit['fr_description'];
    $userfile = $edit['image'];
    $headerimg = $edit['headerimg'];
    $status = $edit['status'];
} else {
    $id = set_value('id');
    $eng_title = set_value('eng_title');
    $fr_title = set_value('fr_title');
    $eng_description = set_value('eng_description');
    $fr_description = set_value('fr_description');
    $userfile = set_value('image');
    $headerimg = set_value('headerimg');
    $status = set_value('status');
   }
?>
<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content" >
        <div class="wrapper-content ">
            <div class="row">
                <div class="col-lg-8">
                    <?php echo validation_errors(); ?>
                    <div class="ibox float-e-margins">
                        <div class="widgets-container">
                            <h3>Add / Edit - Supermarkets </h3>
                            <hr>
                            <form method="Post"  action="<?php echo site_url('admin/Supermarket/add') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">English Title</label>
                                    <input class="form-control m-t-xxs" id="input2" name="eng_title" required="" type="text" value="<?php echo $eng_title ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">French Title</label>
                                    <input class="form-control m-t-xxs" id="input2" name="fr_title" required="" type="text" value="<?php echo $fr_title ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">English Description</label>
                                    <textarea class="form-control" id="editor1" name="eng_description" required=""><?php echo $eng_description ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">French Description</label>
                                    <textarea class="form-control" id="editor2" name="fr_description" required=""><?php echo $fr_description ?></textarea>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Supermarket Image</label>
                                    <?php if (isset($edit['image']) && !empty($edit['image'])) { ?>
                                        <img class="stream-img" style="height:100px; margin-right: 10px;
                                             margin-bottom: 10px;"   src="<?php echo base_url(); ?>upload/supermarket/<?php echo $userfile ?>"/>
                                         <?php } ?>
                                    <div class="col-sm-10">
                                        <label class="custom-file">
                                            <input type="file" id="file" name="userfile"  class="custom-file-input">
                                            <span class="custom-file-control"></span>
                                        </label>
                                    </div>
                                </div>

                                <br /> <br />
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Header Image</label>
                                    <?php if (isset($edit['headerimg']) && !empty($edit['headerimg'])) { ?>
                                        <img class="stream-img" style="height:100px; margin-right: 10px;
                                             margin-bottom: 10px;"   src="<?php echo base_url(); ?>upload/supermarket/<?php echo $headerimg ?>"/>
                                         <?php } ?>
                                    <div class="col-sm-10">
                                        <label class="custom-file">
                                            <input type="file" id="file" name="headerimg"  class="custom-file-input">
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

<script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    CKEDITOR.config.autoParagraph = false;
</script>