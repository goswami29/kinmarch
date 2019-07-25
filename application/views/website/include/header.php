<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title> :: Welcome to KinMarche ::</title>
  <link href="" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>web/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>web/dist/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>web/dist/css/main.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<?php $lang = $this->first_uri; ?>

<?php if($lang == "english"){ ?>
  <style>
    header .navbar-nav .nav-item .nav-link {
      color: #ffffff;
      text-transform: uppercase;
      font-weight: 700;
      letter-spacing: 1px;
      font-size: 16px; 
    }
  </style>
<?php } else{ ?>
  <style>
    header .navbar-nav .nav-item .nav-link {
      color: #ffffff;
      text-transform: uppercase;
      font-weight: 700;
      letter-spacing: 1px;
      font-size: 14px; 
    }
  </style>
<?php } ?>

<body>
  <?php $contact = get_contact();	?>
  <header>
    <div class="top-nav">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-5 col-6 padding-right">
            <div class="logo">
              <a href="<?php echo base_url();?>">
                <img src="<?php echo base_url(); ?>web/dist/image/logo.png" alt="" class="img-fluid" />
              </a>
            </div>
          </div>
          <div class="col-lg-9 col-md-8 col-sm-7 col-6 padding-left">
            <div class="top-link">
              <ul class="nav">
                <li class="nav-item mob">
                  <a class="nav-link" href="tel:<?php echo $contact['mobile_no'];?>">
                    <div class="icon">
                      <img src="<?php echo base_url(); ?>web/dist/image/svg/telephone.svg" alt="" />
                    </div>
                    <span><?php echo $contact['mobile_no'];?></span>
                  </a>
                </li>
                <li class="nav-item mob">
                  <a class="nav-link" href="mailto:<?php echo $contact['email_id1'];?>">
                    <div class="icon">
                      <img src="<?php echo base_url(); ?>web/dist/image/svg/sent-mail.svg" alt="" />
                    </div>
                    <span><?php echo $contact['email_id1'];?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $contact['facebook'];?>" target="_blank">
                    <div class="icon">
                      <img src="<?php echo base_url(); ?>web/dist/image/svg/facebook.svg" alt="" />
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $contact['twitter'];?>" target="_blank">
                    <div class="icon">
                      <img src="<?php echo base_url(); ?>web/dist/image/svg/twitter.svg" alt="" />
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $contact['instagram'];?>" target="_blank">
                    <div class="icon">
                      <img src="<?php echo base_url(); ?>web/dist/image/svg/instagram.svg" alt="" />
                    </div>
                  </a>
                </li>

                <li class="nav-item">
                      <div class="lang">
                        <select name="menu1" onchange="MM_jumpMenu('parent', this, 0)">
                          <option <?php echo(isset($lang) && !empty($lang) && $lang == "french"?"selected":"")?> value="<?php echo base_url('french/home') ?>">French</option>
                          <option <?php echo(isset($lang) && !empty($lang) && $lang == "english"?"selected":"")?> value="<?php echo base_url('english/home') ?>">English</option>
                        </select>
                      </div>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
          <a class="navbar-brand" href="<?php echo base_url();?>">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

      <?php $categories = get_categories(); ?>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item <?php echo (isset($active) && ($active == 1) ? 'active' : ''); ?>">
              <a class="nav-link" href="<?php echo base_url();?>">Home</a>
            </li>
            <li class="nav-item <?php echo (isset($active) && ($active == 2) ? 'active' : ''); ?>">
              <a class="nav-link" href="<?php echo base_url().$lang.'/about';?>"><?php if($this->first_uri == 'french'){ echo 'À PROPOS'; } else{  echo 'About'; } ?></a>
            </li>
            
            <li class="nav-item dropdown <?php echo (isset($active) && ($active == 3) ? 'active' : ''); ?>">
              <a class="nav-link dropdown-toggle" href="<?php echo base_url().$lang.'/product';?>" id="navbardrop" data-toggle="dropdown">
                <?php if($this->first_uri == 'french'){ echo 'DES PRODUITS'; } else{  echo 'Products'; } ?>
              </a>
              <!-- Category Dropdown -->
              <div class="dropdown-menu">
                <?php foreach($categories as $cat){ ?>
                  <a class="dropdown-item" href="<?php echo base_url().$lang.'/product/'.$cat->slug;?>"> <?php if($this->first_uri == 'french'){ echo $cat->fr_name; } else{  echo $cat->eng_name; } ?></a>
                <?php } ?>
              </div>
            </li>

            <li class="nav-item <?php echo (isset($active) && ($active == 4) ? 'active' : ''); ?>">
              <a class="nav-link" href="<?php echo base_url().$lang.'/supermarkets';?>"><?php if($this->first_uri == 'french'){ echo 'SUPERMARCHÉ'; } else{  echo 'Supermarket'; } ?></a>
            </li>
            <li class="nav-item <?php echo (isset($active) && ($active == 5) ? 'active' : ''); ?>">
              <a class="nav-link" href="<?php echo base_url().$lang.'/ourshop';?>"><?php if($this->first_uri == 'french'){ echo 'NOS MAGASINS'; } else{  echo 'Our Stores'; } ?></a>
            </li>
            <li class="nav-item <?php echo (isset($active) && ($active == 6) ? 'active' : ''); ?>">
              <a class="nav-link" href="<?php echo base_url().$lang.'/client-survey';?>"><?php if($this->first_uri == 'french'){ echo 'FORMULAIRE ENQUETE CLIENT'; } else{  echo 'Client Survey Form'; } ?> </a>
            </li>
            <li class="nav-item <?php echo (isset($active) && ($active == 7) ? 'active' : ''); ?>">
              <a class="nav-link" href="<?php echo base_url().$lang.'/contact-us';?>"><?php if($this->first_uri == 'french'){ echo 'DETAIL DE CONTACTS'; } else{  echo 'Contact Us'; } ?> </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>
