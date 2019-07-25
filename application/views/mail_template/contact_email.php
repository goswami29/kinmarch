<?php $this->load->view('mail_template/mail_header'); ?>

<div style="margin:0 auto; width:100%;">
    <div style="float:left; width:100%; margin:0;">
        <div style="margin:0 auto; width:800px; background:#fff;">
            <div style="margin:0 auto; float:left; width:100%; padding:20PX 0 55px 0px;">

                <h1 style=" text-align:left; font-family: 'Roboto', sans-serif; font-weight:300; font-size:34px;">
                    <?php echo SITE_NAME ?> : Contact-Us Email
                </h1>
                <div style=" text-align:left; font-family: 'Roboto', sans-serif; font-size:15px; font-weight:400; line-height:26px; margin:0;">
                    <table style="width: 90%;margin: 8px;border: 1px solid #ddd;">
                        <?php
                        if (isset($list) && !empty($list)) {
                            foreach ($list as $key => $val) {
                                ?>
                                <tr>
                                    <td style="border: 1px solid #ddd;padding: 5px;"><b><?php echo $key; ?></b></td> 
                                    <td style="border: 1px solid #ddd;padding: 5px;"><?php echo $val ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('mail_template/mail_footer'); ?>