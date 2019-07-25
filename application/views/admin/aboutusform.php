<?php $this->load->view('admin/include/header') ?>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<?php
if (isset($edit) && !empty($edit)) {
    $id = $edit['id'];
    $eng_title = $edit['eng_title'];
    $fr_title = $edit['fr_title'];
    $eng_description = $edit['eng_description'];
    $fr_description = $edit['fr_description'];
    $status = $edit['status'];
    $product_images = explode(',', $edit['images']);
   
} else {
    $id = set_value('id');
    $eng_title = set_value('eng_title');
    $fr_title = set_value('fr_title');
    $eng_description = set_value('eng_description');
    $fr_description = set_value('fr_description');
    $status = set_value('status');
    $product_images = array();
   }
?>

<style>
    .images_div{
        float: left; 
        margin: 10px;
        position:relative;
    }
    .cross_icon{
        font-size: 26px;
        color: red;
        position: absolute;
        top: -4px;
        right: -26px;
        z-index: 999;
    }
    .cross_icon2{
        font-size: 20px;
        color: red;
        position: absolute;
        top: -15px;
        right: -10px;
        z-index: 1;
    }
</style>

<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content" >
        <div class="wrapper-content ">
            <div class="row">
                <div class="col-lg-8">
                    <?php echo validation_errors(); ?>
                    <div class="ibox float-e-margins">
                        <div class="widgets-container">
                            <h5>Edit Form </h5>
                            <hr>
                            <form method="Post"  action="<?php echo site_url('admin/Aboutus/addaboutus') ?>" enctype="multipart/form-data"  >
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

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-14">
                                        <select class="form-control" name="status">
                                            <option value="1" <?php echo($status == '1' ? 'selected' : '') ?>>Active</option>
                                            <option value="0" <?php echo($status == '0' ? 'selected' : '') ?>>De-Active</option>
                                        </select>
                                    </div>
                                </div>
                                
                                   
                                <div class="form-group row property_images_main_div">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="validationCustom02">Upload About Us Images</label>
                                                <input type="file" class="form-control product_images_upload" name="product_images" multiple="">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12"></div>
                                        <?php
                                        if (isset($product_images) && !empty($product_images)) {
                                            foreach ($product_images as $product_images_val) {
                                                if (!empty($product_images_val)) {
                                                    echo '<div class="col-lg-3 property_images_sub_div">';
                                                    echo '<div class="card d-block">';
                                                    echo '<i class="cross_icon2 fa fa-remove" style="font-size:24px"></i>';
                                                    echo '<img class="card-img-top img-thumbnail" src="' . base_url('upload/aboutus/' . $product_images_val) . '" alt="Card image cap">';
                                                    echo '<input type="hidden" value="' . $product_images_val . '" name="product_images[]">';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                        }
                                        ?>

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

    $(document).on('click', '.cross_icon2', function () {
        //$('.animationload').css('display', 'block');
        $(this).closest('.property_images_sub_div').remove();
        //$('.animationload').css('display', 'none');
    });


    $(document).on('change', '.product_images_upload', function () {
        //$('.animationload').css('display', 'block');
        var form_data = new FormData();
        jQuery.each($(this)[0].files, function (i, file) {
            form_data.append(i, file);
        });
        var that = $(this);
        $.ajax({
            url: '<?php echo site_url('admin/aboutus/upload_images') ?>',
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (res) {
                var error = "";
                if (res['status'] == 1) {
                    var galleryData = "";
                    for (i = 0; i < Object.keys(res['image']).length; i++) {
                        galleryData += '<div class="col-lg-3 property_images_sub_div">';
                        galleryData += '<div class="card d-block">';
                        galleryData += '<i class="cross_icon2 fa fa-remove" style="font-size:24px"></i>';
                        galleryData += '<img class="card-img-top img-thumbnail" src="' + '<?php echo base_url('upload/aboutus/'); ?>' + res['image'][i] + '" alt="Card image cap">';
                        galleryData += '<input type="hidden" value="' + res['image'][i] + '" name="product_images[]">';
                        galleryData += '</div>';
                        galleryData += '</div>';
                    }
                    $('.property_images_main_div').append(galleryData);
                }
               // $('.animationload').css('display', 'none');
            }
        });

    })
</script>