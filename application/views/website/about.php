<?php $this->load->view('website/include/header'); ?>

<section class="top-header-box">
    <img src="<?php echo base_url(); ?>web/dist/image/bg/about-us.jpg" class="img-fluid" />
    <div class="top-header-box-caption">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="title"> <?php if($this->first_uri == 'french'){ echo 'À PROPOS'; } else{  echo 'About Us'; } ?></h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if($this->first_uri == 'french'){ echo 'À PROPOS'; } else{  echo 'About Us'; } ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-info-text pd80">
    <div class="container">
      <div class="row">
        <div class="srv-bx6 col-lg-12 p-0">
          <div class="col-md-8 p-0">
            <div class="">
              <div id="carousel2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                
                  <?php if(!empty($aboutus->images)){ 
                        $aboutImg = explode(',' , $aboutus->images);
                        
                      foreach($aboutImg as $key => $img){ 
                    ?>
                    <div class="carousel-item <?php echo ($key == 0)? 'active' : '';  ?>"> 
                      <img style="width:790px; height:480px;" src="<?php echo base_url(); ?>upload/aboutus/<?php echo $img; ?>" alt="" title="" class="img-fluid">
                    </div>
                  <?php }
                  } 
                  ?>
                  <!-- <div class="carousel-item active">
                     <img alt="" title="" style="width:790px; height:480px;" src="<?php echo base_url(); ?>web/dist/image/img/2.jpg" class="img-fluid">
                  </div> -->
                </div>
                <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev"> <i
                    class="fa fa-angle-left"></i> </a> <a class="carousel-control-next" href="#carousel2" role="button"
                  data-slide="next"> <i class="fa fa-angle-right"></i> </a>
              </div>
            </div>
          </div>

          <div class="srv-inf6">
            <h3 class="title"><span> <?php if($this->first_uri == 'french'){ echo isset($aboutus->fr_title)? $aboutus->fr_title : ''; } else{  echo isset($aboutus->eng_title)? $aboutus->eng_title : ''; } ?> </span> </h3>
            <p>
                <?php if($this->first_uri == 'french'){ echo isset($aboutus->fr_description)? $aboutus->fr_description : ''; } else{  echo isset($aboutus->eng_description)? $aboutus->eng_description : ''; } ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="vision">
    <div class="container">
      <div class="row">

        <div class="col-lg-5 col-md-5 col-sm-12">
          <h3 class="title2 text-right"> <span> <?php if($this->first_uri == 'french'){ echo isset($vision->fr_title)? $vision->fr_title : ''; } else{  echo isset($vision->eng_title)? $vision->eng_title : ''; } ?> </span> </h3>
          <p class="vision-text">
            <?php if($this->first_uri == 'french'){ echo isset($vision->fr_description)? $vision->fr_description : ''; } else{  echo isset($vision->eng_description)? $vision->eng_description : ''; } ?>
          </p>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12">
          <div class="vision-img"></div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12">
          <h3 class="title2 text-left"> <span> <?php if($this->first_uri == 'french'){ echo isset($mission->fr_title)? $mission->fr_title : ''; } else{  echo isset($mission->eng_title)? $mission->eng_title : ''; } ?> </span></h3>
          <p class="mission-text">
            <?php if($this->first_uri == 'french'){ echo isset($mission->fr_description)? $mission->fr_description : ''; } else{  echo isset($mission->eng_description)? $mission->eng_description : ''; } ?>
          </p>
        </div>

      </div>
    </div>
  </section>


  <section class="expertise pd80">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="expertise-img">
            <img src="<?php echo base_url(); ?>web/dist/image/suparmarket_02.jpg" alt="" class="img-fluid" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="expertise-text">
            <h3 class="title"><span> <?php if($this->first_uri == 'french'){ echo isset($expertise->fr_title)? $expertise->fr_title : ''; } else{  echo isset($expertise->eng_title)? $expertise->eng_title : ''; } ?> </span></h3>
            <?php if($this->first_uri == 'french'){ echo isset($expertise->fr_description)? $expertise->fr_description : ''; } else{  echo isset($expertise->eng_description)? $expertise->eng_description : ''; } ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php $this->load->view('website/include/footer'); ?>