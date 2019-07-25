
<?php $this->load->view('website/include/header'); ?>


<section class="top-header-box">
    
    <?php if(!empty($headerImg->image)){ ?>
        <img src="<?php echo base_url();?>upload/store/<?php echo isset($headerImg->image)? $headerImg->image : ''; ?>" alt="" class="img-fluid" />
      <?php } else { ?>
        <img src="<?php echo base_url();?>web/dist/image/bg/our-shop.jpg" class="img-fluid" />
      <?php } ?>

    <div class="top-header-box-caption">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <h3 class="title"><?php if($this->first_uri == 'french'){ echo 'Nos Magasins'; } else{  echo 'Our Stores'; } ?> </h3>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if($this->first_uri == 'french'){ echo 'Nos Magasins'; } else{  echo 'Our Stores'; } ?>
                </li>
            </ol>
            </nav>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="shops pd80">
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
        <h3 class="title"> <?php if($this->first_uri == 'french'){ echo '<span> NOS</span> MAGASINS'; } else{  echo '<span> OUR</span> STORES'; } ?> </h3>
        </div>
        <div class="row timeline">
            <?php foreach($shops as $shop){ ?>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="content">
                    <div class="address">
                        <h4>
                            <?php if($this->first_uri == 'french'){ echo $shop->fr_address; } else{  echo $shop->eng_address; } ?>
                        </h4>
                        <a href="mailto:<?php echo $shop->email;?>"><?php echo $shop->email;?></a>
                    </div>
                    <iframe
                        src="<?php echo $shop->map;?>" frameborder="0" style="border:0" allowfullscreen="">
                    </iframe>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>
</section>

<?php $this->load->view('website/include/footer'); ?>