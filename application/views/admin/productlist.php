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
                            <h2> Home Product Details </h2>
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th>English Title</th>
                                            <th>French Title</th>
                                            <th>English Description</th>
                                            <th>French Description</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="banners_sortable">

                                        <?php
                                        if (isset($list) && !empty($list)) {
                                            $i = 1;
                                            foreach ($list as $val) {
                                                ?>

                                                <tr id="banners-<?php echo $val['id']; ?>">
                                                    <td><?php echo $val['eng_title']; ?> </td>
                                                    <td><?php echo $val['fr_title']; ?> </td>
                                                    <td><?php echo $val['eng_description']; ?> </td>
                                                    <td><?php echo $val['fr_description']; ?> </td>
                                                    <td class="hidden-xs"><?php echo($val['status'] == '1' ? '<button class="btn green btn-xs">Active</button>' : '<button class="btn red btn-xs">De-Active</button>'); ?>
                                                    <td>
                                                        <a href = '<?php echo site_url('admin/Product/edit/' . $val['id']); ?>' class='btn btn-outline btn-round green btn-sm blue'> <i class='fa fa-edit'></i> Edit</a>
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
