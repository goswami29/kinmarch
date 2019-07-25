<?php $this->load->view('website/include/header'); ?>

<?php $lang = $this->first_uri; ?>

<section class="top-header-box">
    <img src="<?php echo base_url();?>web/dist/image/bg/our-product.jpg" class="img-fluid" />
    <div class="top-header-box-caption">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="title"><?php if($this->first_uri == 'french'){ echo 'DES PRODUITS'; } else{  echo 'Products'; } ?></h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php if($this->first_uri == 'french'){ echo 'DES PRODUITS'; } else{  echo 'Products'; } ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="main-product-page pd80">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="title"> <?php if($this->first_uri == 'french'){ echo '<span>KINMARCHE</span> DES PRODUITS'; } else{  echo '<span>KINMARCHE</span> PRODUCTS'; } ?> </h3>
        </div>
      
        <div class="col-lg-12 col-md-12 col-sm-12 pbox">
          <div class="row">
            <?php foreach($products as $product){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="product-box">
                    <a href="<?php echo base_url().$lang.'/product/'.$product->slug;?>">
                        <div class="product-img">
                            <img src="<?php echo base_url();?>upload/category/<?php echo $product->image;?>" alt="" class="img-fluid" />
                        </div>
                        <div class="product-box-caption">
                            <a href="<?php echo base_url().$lang.'/product/'.$product->slug;?>"> <?php if($this->first_uri == 'french'){ echo $product->fr_name ; } else{ echo $product->eng_name ; } ?></a>
                        </div>
                    </a>
                </div>
                </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </section>

<?php $this->load->view('website/include/footer'); ?>