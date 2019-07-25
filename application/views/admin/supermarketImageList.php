<?php $this->load->view('admin/include/header') ?>

<div class="page-content-wrapper animated fadeInRight">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <!-- / ibox-title -->
                    <div id="demo7" class="ibox-content collapse show">
                        <div class="borderedTable">
                            <?php
                            $msg = $this->session->flashdata('msg');
                            if (isset($msg) && !empty($msg)) {
                                ?>
                                <div class="alert alert-success">
                                    <span><?php echo $msg ?></span>
                                </div>
                            <?php } ?>
                            <h2> Supermarket Image List 
                                <a href = '<?php echo site_url('admin/SupermarketImage/addimage') ?>' class="btn btn-round btn-primary pull-right blue"> Add Supermarket Image </a>
                            </h2>
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr><th>Sort</th>
                                            <th>English Title</th>
                                            <th>French Title</th>
                                            <th>Image</th>
                                            <th>Status </th>
                                            <th>Action</th>
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
                                                    <td><?php echo $val['eng_title']; ?> </td>
                                                    <td><?php echo $val['fr_title']; ?> </td>
                                                   <td>
                                                        <?php if($val['image']){ ?>
                                                            <img class="stream-img" style="height:80px;" src="<?php echo base_url(); ?>upload/supermarket/<?php echo $val['image']; ?>"/>
                                                        <?php } else { echo "No Image"; } ?>
                                                    </td>
                                                    <td class="hidden-xs"><?php echo($val['status'] == '1' ? '<button class="btn green btn-xs">Active</button>' : '<button class="btn red btn-xs">De-Active</button>'); ?> 
                                                    <td>
                                                        <a href = '<?php echo site_url('admin/SupermarketImage/edit/' . $val['id']); ?>' class='btn btn-outline btn-round green btn-sm blue'> <i class='fa fa-edit'></i> Edit</a>
                                                        <a href ='javascript:void(0)' url = '<?php echo site_url('admin/SupermarketImage/delete/' . $val['id']); ?>' class='btn btn-outline btn-round dark btn-sm black delete'> <i class='fa fa-trash-o'></i> Delete</a>
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
            url: '<?php echo site_url('admin/SupermarketImage/organize'); ?>',
            type: 'POST',
            data: serial
        });
    }
</script>
<script>
        $(document).ready(function() {
        $(document).on('click', '.delete', function() {
             if (confirm("Are You Sure you want to remove this Image ?")) {
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