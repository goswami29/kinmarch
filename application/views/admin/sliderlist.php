<?php $this->load->view('admin/include/header') ?>

<!-- Start page content wrapper -->
<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox float-e-margins">
                    <!-- / ibox-title -->
                    <div id="demo7" class="ibox-content collapse show">
                        <?php
                        $msg = $this->session->flashdata('msg');
                        if (isset($msg) && !empty($msg)) {
                            ?>
                            <div class="alert alert-success">
                                <span><?php echo $msg ?></span>
                            </div>
                        <?php } ?>
                        <div class="borderedTable">
                            <h2> Slider List <a href="<?php echo site_url('admin/slider/addslider') ?>"  class="btn btn-round btn-primary pull-right blue">Add Slider</a> </h2>
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr><th>Sort</th>
                                            <th>  Image </th>
                                            <th>  English Title1 </th>
                                            <th>  French Title1 </th>
                                            <th>  status </th>
                                            <th>  Action </th>
                                        </tr>
                                    </thead>
                                    <tbody id="banners_sortable">
                                        <?php
                                        if (isset($list) && !empty($list)) {
                                            $i = 1;
                                            foreach ($list as $val) {
                                                ?>     
                                                <tr id="banners-<?php echo $val['id']; ?>">
                                                    <td class="handle">
                                                        <a class="btn default" style="cursor:move"> <span class="fa fa-arrows"></span></a>
                                                    </td>
                                                    <td>
                                                        <img class="stream-img" style="height:80px;" src="<?php echo base_url(); ?>upload/slider/<?php echo $val['image1']; ?>"/>

                                                    </td>
                                                    <td><?php echo $val['eng_title1']; ?></td>
                                                    <td><?php echo $val['fr_title1']; ?></td>
                                                    <td>
                                                        <div class="form-group row">
                                                            <input type ="hidden" id="hidden" class="hidden-id" value="<?php echo $val['id']; ?>">
                                                            <div class="col-sm-10" >

                                                                <select name="status" class="custom-select" >
                                                                    <option selected>select</option>
                                                                    <option value="1" <?php echo($val['status'] == '1' ? 'selected' : '') ?>>Active</option>
                                                                    <option value="0" <?php echo($val['status'] == '0' ? 'selected' : '') ?>>De-active</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <a href="<?php echo site_url('admin/slider/edit/' . $val['id']) ?>"class='btn btn-outline btn-round green btn-sm blue'> <i class='fa fa-edit'></i> Edit</a>

                                                        <a href="javascript:void(0)" url="<?php echo site_url('admin/slider/delete/' . $val['id']) ?>"class='btn btn-outline btn-round dark btn-sm black delete'> <i class='fa fa-trash-o'></i> Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php $this->load->view('admin/include/footer') ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('change', '.custom-select', function() {
            var value = $(this).val();
            var id = $(this).closest('tr').find('.hidden-id').val();
            $.post('<?php echo site_url("admin/Slider/status"); ?>', {value: value, id: id}, function(res) {
                if (res == '1')
                {
                    alert("Updated");
                }
            }, 'json');

        });

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" ></script>

<script type="text/javascript">
    $(document).ready(function() {
        create_sortable();
    });
    function create_sortable() {
        $('#banners_sortable').sortable({
            scroll: true,
            axis: 'y',
            handle: '.handle',
            update: function() {
                save_sortable();
            }
        });
    }
    function save_sortable() {
        serial = $('#banners_sortable').sortable('serialize');
        console.log(serial);
        $.ajax({
            url: '<?php echo site_url('admin/slider/organize'); ?>',
            type: 'POST',
            data: serial
        });
    }
</script>
<script>
        $(document).ready(function() {
        $(document).on('click', '.delete', function() {
             if (confirm("Are You Sure you want to remove this slider ?")) {
                var url = $(this).attr('url');
                var that = $(this);
                $.post(url, '', function(result) {
                     alert(result);
                    
                  that.closest('tr').remove();
                }, 'json');
            }
       
        });

    });
</script>