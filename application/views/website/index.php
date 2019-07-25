<?php $this->load->view('website/include/header'); ?>
<?php $lang = $this->first_uri; ?>
<section class="banner">
    <div class="owl-carousel banner-slider">
		<?php foreach($sliders as $slider){ ?>
		<div class="item" style="background-image: url(<?php echo base_url(); ?>upload/slider/<?php echo $slider->image1;?>);">
			<div class="carousel-caption">
			<h3><?php if($this->first_uri == 'french'){ echo $slider->fr_title1; } else{  echo $slider->eng_title1; } ?> </h3>
			<p><?php if($this->first_uri == 'french'){ echo $slider->fr_title2; } else{  echo $slider->eng_title2; } ?></p>
			</div>
		</div>
		<?php } ?>
    </div>
  </section>

  <section class="about_us_section pd80">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12" style="margin: 0 auto;">
          <h5><?php if($this->first_uri == 'french'){ echo 'BIENVENU'; } else{  echo 'WELCOME'; } ?></h5>
          <h4 class="title2"> <?php if($this->first_uri == 'french'){ echo $welcome->fr_title; } else{  echo $welcome->eng_title; } ?> </h4>
          <p> <?php if($this->first_uri == 'french'){ echo $welcome->fr_description; } else{  echo $welcome->eng_description; } ?> </p>
          <a href="<?php echo base_url().$lang.'/about';?>" class="read_more">
            <span> <?php if($this->first_uri == 'french'){ echo 'Lire la suite'; } else{  echo 'Read More'; } ?> </span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="products pd80">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="title"> <span style="color:#000;"> <?php if($this->first_uri == 'french'){ echo $product->fr_title; } else{  echo $product->eng_title; } ?> </span> </h3>
          <p> <?php if($this->first_uri == 'french'){ echo $product->fr_description; } else{  echo $product->eng_description; } ?> </p>
        </div>

		<!-- Categories List  -->
        <div class="products-card">
          <div class="row">
            <?php foreach($categories as $cat){ ?>
              <div class="col-lg-3 col-md-4 col-sm-6 col-12 product-item">
              <a href="<?php echo base_url().$lang.'/product/'.$cat->slug;?>">
                <div class="product_box">
                <img src="<?php echo base_url(); ?>upload/category/<?php echo $cat->image;?>" alt="" class="img-fluid" />
                <div class="product_caption">
                  <h3> <?php if($this->first_uri == 'french'){ echo $cat->fr_name; } else{  echo $cat->eng_name; } ?></h3>
                </div>
                </div>
              </a>
              </div>
            <?php } ?>	
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- testimonials List  -->
  <section class="testimonial pd80">
    <div class="container">
      <div class="row">

        <div class="col-sm-12">
          <div class="header-text">
             <h3 class="title"><span> <?php if($this->first_uri == 'french'){ echo 'LES GENS DISENT KINMARCHE'; } else{  echo 'PEOPLE SAYS KINMARCHE'; } ?> </h3>
          </div>
		</div>
		
        <div class="col-lg-8 col-md-8 col-sm-12" style="margin: 0 auto;">
          <div class="owl-carousel testimonial-slider">

            <?php foreach($testimonials as $testimony){ ?>
              <div class="item">
              <div class="clent-feedback">
                <p> <?php if($this->first_uri == 'french'){ echo $testimony->fr_description; } else{  echo $testimony->eng_description; } ?> </p>
              </div>
              <div class="client-info">
                <ul>
                <li>
                  <img style="width:80px;" src="<?php echo base_url(); ?>upload/testimonial/<?php echo $testimony->image ?>" alt="" class="img-fluid" />
                </li>
                <li>
                  <h3><span><?php echo $testimony->title ?> /</span> <?php echo $testimony->sub_title ?></h3>
                </li>
                </ul>
              </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  
  <section class="suparmarket_secion">
    <div class="container-fluid">
      <div class="row">
      
        <?php foreach($supermarketImage as $images){ ?>
          <div class="col-lg-6 col-md-6 col-sm-12" style="padding:0;">
            <a href="#">
              <div class="supar_market_section">
                <div class="supar_box">
                  <img src="<?php echo base_url(); ?>upload/supermarket/<?php echo $images->image; ?>" alt="Avatar" class="image" />
                  <div class="overlay">
                    <div class="text">
                      <h4> 
                          <?php if($this->first_uri == 'french'){ echo $images->fr_title; } else{ echo $images->eng_title; } ?>
                      </h4>
                      <h5>
                          <?php if($this->first_uri == 'french'){ echo $images->fr_subtitle; } else{ echo $images->eng_subtitle; } ?>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>


   <!-- NEWS EVENT List  -->
  <section class="news pd80">
    <div class="container">
      <div class="row">

        <div class="col-sm-12">
          <div class="header-text">
            <h3 class="title">
              <?php if($this->first_uri == 'french'){ echo '<span>NOUVELLES ET</span> ÉVÉNEMENT'; } else{  echo '<span>NEWS &amp </span>EVENT'; } ?>
            </h3>
            <p> 
              <?php if($this->first_uri == 'french'){ echo 'Des mots latins, associés à une poignée de structures de phrases modèles, pour générer'; } else{  echo 'Latin words, combined with a handful of model sentence structures, to generate'; } ?>
            </p>
          </div>
		</div>
		
        <?php foreach($newsevent as $event){ ?>
          <div class="col-lg-4 col-md-4 col-sm-12">
          <a href="<?php echo base_url($lang.'/news/'.$event->slug);?>" class="news-card">
            <div class="news-img">
            <img src="<?php echo base_url(); ?>upload/news/<?php if($this->first_uri == 'french'){ echo $event->fr_image; } else{  echo $event->eng_image; } ?>" alt="" class="img-fluid" />
            <div class="date"> <?php echo date('d M', strtotime($event->add_date)); ?> </div>
            </div>

            <div class="news-text">
            <h4><?php if($this->first_uri == 'french'){ echo $event->fr_title; } else{  echo $event->eng_title; } ?></h4>
            <p> <?php if($this->first_uri == 'french'){ echo  limitTextWords($event->fr_description, 20, true, true); } else{  echo limitTextWords($event->eng_description, 20, true, true); } ?></p>
            </div>
          </a>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>

<!-- Client / Brands List  -->
  <section class="clients">
    <div class="container">
      <div class="row">
        <div class="owl-carousel clients-logo">
			<?php foreach($brands as $brand){ ?>
				<div class="item">
					<img src="<?php echo base_url(); ?>upload/brand/<?php echo $brand->image;?>" alt="<?php echo $brand->eng_title;?>" class="img-fluid" />
				</div>
			<?php } ?>
        </div>
      </div>
    </div>
  </section>
  
  <?php $this->load->view('website/include/footer'); ?>