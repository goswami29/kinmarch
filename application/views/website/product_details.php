<?php $this->load->view('website/include/header'); ?>



<section class="top-header-box">
    <img src="<?php echo base_url();?>web/dist/image/bg/our-product.jpg" class="img-fluid" />
    <div class="top-header-box-caption">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="title"> <?php if($this->first_uri == 'french'){ echo 'Détails De Produits'; } else{  echo 'Products Details'; } ?> </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if($this->first_uri == 'french'){ echo 'Détails De Produits'; } else{  echo 'Products Details'; } ?>
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
            <img src="<?php echo base_url();?>upload/category/<?php echo isset($productDetail->image)? $productDetail->image : ''; ?>" alt="promo image">
          </div>
        </div>

        <div class="col-xl-7 col-lg-7 col-md-7">
          <div class="promo-text">
            <div class="promo-heading">
              <h3 class="title"><span> <?php if($this->first_uri == 'french'){ echo isset($productDetail->fr_name)? $productDetail->fr_name : ''; } else{  echo isset($productDetail->eng_name)? $productDetail->eng_name : ''; } ?> </span> </h3>
            </div>
            <div class="promo-box-item">
                <p>
                    <?php if($this->first_uri == 'french'){ echo isset($productDetail->fr_description)? $productDetail->fr_description : ''; } else{  echo isset($productDetail->eng_description)? $productDetail->eng_description : ''; } ?>
                </p>
                <div class="promo-hover"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


<?php $this->load->view('website/include/footer'); ?>