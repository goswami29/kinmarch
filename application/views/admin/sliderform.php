<?php $this->load->view('admin/include/header') ?>
<?php
if (isset($edit) && !empty($edit)) {
    $id = $edit['id'];
    $userfile1 = $edit['image1'];
    $eng_title1 = $edit['eng_title1'];
    $fr_title1 = $edit['fr_title1'];
    $eng_title2 = $edit['eng_title2'];
    $fr_title2 = $edit['fr_title2'];
} else {
    $id = set_value('id');
    $userfile1 = set_value('image1');
    $eng_title1 = set_value('eng_title1');
    $fr_title1 = set_value('fr_title1');
    $eng_title2 = set_value('eng_title2');
    $fr_title2 = set_value('fr_title2');
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
                           <?php
                        $err = $this->session->flashdata('err');
                        if (isset($err) && !empty($err)) {
                            ?>
                            <div class="alert alert-warning">
                                <span><?php echo $err ?></span>
                            </div>
                        <?php } ?> 
                            <h5>Add / Edit Slider</h5>
                            <hr>

                            <form method="Post"  action="<?php echo site_url('admin/slider/addslider') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Image browser</label>
                                    <?php if (isset($edit['image1']) && !empty($edit['image1'])) { ?>
                                            <img class="stream-img" style="height:100px; margin-right: 10px;
                                                 margin-bottom: 10px;"   src="<?php echo base_url(); ?>upload/slider/<?php echo $userfile1 ?>"/>
                                             <?php
                                             }
                                         ?>
                                    <div class="col-sm-10">
                                        <label class="custom-file">
                                            <input type="file" id="file" name="userfile1" <?php echo($userfile1 == '' ? 'required=""' : '') ?> class="custom-file-input">
                                            <span class="custom-file-control"></span>
                                        </label>
                                        <div style="color: red">[1920 X 670 pixels]</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">English Title1</label>
                                    <input class="form-control m-t-xxs" name="eng_title1" required="" type="text" value="<?php echo $eng_title1 ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">French Title1</label>
                                    <input class="form-control m-t-xxs" name="fr_title1" required="" type="text" value="<?php echo $fr_title1 ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">English Sub Title</label>
                                    <input class="form-control m-t-xxs" name="eng_title2" required="" type="text" value="<?php echo $eng_title2 ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">French Sub Title</label>
                                    <input class="form-control m-t-xxs" name="fr_title2" required="" type="text" value="<?php echo $fr_title2 ?>">
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