<?php $this->load->view('website/include/header'); ?>



<section class="top-header-box">
    <img src="<?php echo base_url();?>web/dist/image/bg/our-product.jpg" class="img-fluid" />
    <div class="top-header-box-caption">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="title"> <?php if($this->first_uri == 'french'){ echo "Détails de l'événement"; } else{  echo 'News & Event Details'; } ?> </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if($this->first_uri == 'french'){ echo "Détails de l'événement"; } else{  echo 'News & Event Details'; } ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="main-product-details-page pd80">
    <div class="container">
      <div class="row">

        <div class="col-xl-5 col-lg-5 col-md-5">
          <div class="promo-image">
            <img src="<?php echo base_url(); ?>upload/news/<?php if($this->first_uri == 'french'){ echo $newsDetail->fr_image; } else{  echo $newsDetail->eng_image; } ?>" alt="" class="img-fluid" />
          </div>
        </div>

        <div class="col-xl-7 col-lg-7 col-md-7">
          <div class="promo-text">
            <div class="promo-heading">
              <h3 class="title"><span> <?php if($this->first_uri == 'french'){ echo isset($newsDetail->fr_title)? $newsDetail->fr_title : ''; } else{  echo isset($newsDetail->eng_title)? $newsDetail->eng_title : ''; } ?> </span> </h3>
            </div>
            <div class="promo-box-item">
                <p>
                    <?php if($this->first_uri == 'french'){ echo isset($newsDetail->fr_description)? $newsDetail->fr_description : ''; } else{  echo isset($newsDetail->eng_description)? $newsDetail->eng_description : ''; } ?>
                </p>
                <div class="promo-hover"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


<?php $this->load->view('website/include/footer'); ?>