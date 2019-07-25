<?php $this->load->view('website/include/header'); ?>

<section class="top-header-box">
      
      <?php if(!empty($supermarket->headerimg)){ ?>
        <img src="<?php echo base_url();?>upload/supermarket/<?php echo isset($supermarket->headerimg)? $supermarket->headerimg : ''; ?>" alt="" class="img-fluid" />
      <?php } else { ?>
        <img src="<?php echo base_url();?>web/dist/image/bg/super.jpg" class="img-fluid" />
      <?php } ?>

      <div class="top-header-box-caption">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="title"><?php if($this->first_uri == 'french'){ echo 'Supermarché'; } else{  echo 'Supermarket'; } ?></h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <?php if($this->first_uri == 'french'){ echo 'Supermarché'; } else{  echo 'Supermarket'; } ?>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="market pd80">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="market-img">
              <img src="<?php echo base_url();?>upload/supermarket/<?php echo isset($supermarket->image)? $supermarket->image : ''; ?>" alt="" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="market-text">
              <h3 class="title"><span> <?php if($this->first_uri == 'french'){ echo isset($supermarket->fr_title)? $supermarket->fr_title : ''; } else{  echo isset($supermarket->eng_title)? $supermarket->eng_title : ''; } ?> </span></h3>
              <p>
                <?php if($this->first_uri == 'french'){ echo isset($supermarket->fr_description)? $supermarket->fr_description : ''; } else{  echo isset($supermarket->eng_description)? $supermarket->eng_description : ''; } ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php $this->load->view('website/include/footer'); ?>