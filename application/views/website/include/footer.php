  <?php $contact = get_contact();	?>
  <?php $lang = $this->first_uri; ?>
  <section class="contact pd80">
    <div class="container">
      <div class="row">
        <div class="page-links">
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <a href="<?php echo base_url();?>" class="nav-link">HOME</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url().$lang.'/about';?>" class="nav-link"><?php if($this->first_uri == 'french'){ echo 'À PROPOS'; } else{  echo 'ABOUT'; } ?></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url().$lang.'/product';?>" class="nav-link"> <?php if($this->first_uri == 'french'){ echo 'DES PRODUITS'; } else{  echo 'PRODUCTS'; } ?></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url().$lang.'/supermarkets';?>" class="nav-link"><?php if($this->first_uri == 'french'){ echo 'SUPERMARCHÉ'; } else{  echo 'SUPERMARKET'; } ?></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url().$lang.'/ourshop';?>" class="nav-link"><?php if($this->first_uri == 'french'){ echo 'NOS MAGASINS'; } else{  echo 'OUR SHOPS'; } ?></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url().$lang.'/client-survey';?>" class="nav-link"><?php if($this->first_uri == 'french'){ echo 'FORMULAIRE ENQUETE CLIENT'; } else{  echo 'CLIENT SURVEY FORM'; } ?></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url().$lang.'/contact-us';?>" class="nav-link"><?php if($this->first_uri == 'french'){ echo 'DETAIL DE CONTACTS'; } else{  echo 'CONTACT US'; } ?></a>
            </li>
          </ul>
          
          <div class="address">
            <h5><?php if($this->first_uri == 'french'){ echo 'ENTRER EN CONTACT'; } else{  echo 'GET IN TOUCH'; } ?></h5>
            <p>
              <?php echo $contact['address'];?>
            </p>
            <p> <?php echo $contact['mobile_no'];?> <span> | </span>
              <a href="mailto:<?php echo $contact['email_id1'];?>"><?php echo $contact['email_id1'];?></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <ul class="nav">
            <li class="nav-item">
              <?php if($this->first_uri == 'french'){ echo '© 2019 Kin Marche. Tous Les Droits Sont Réservés.'; } else{  echo '© 2019 Kin Marche. All Rights Reserved.'; } ?>
            </li>
            <li class="nav-item">
              <ul>
                <li>
                  <a href="<?php echo $contact['facebook'];?>" target="_blank">
                    <img src="<?php echo base_url(); ?>web/dist/image/svg/facebook.svg" alt="" />
                  </a>
                </li>
                <li>
                  <a href="<?php echo $contact['twitter'];?>" target="_blank">
                    <img src="<?php echo base_url(); ?>web/dist/image/svg/twitter.svg" alt="" />
                  </a>
                </li>
                <li>
                  <a href="<?php echo $contact['instagram'];?>" target="_blank">
                    <img src="<?php echo base_url(); ?>web/dist/image/svg/instagram.svg" alt="" />
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <?php if($this->first_uri == 'french'){ echo 'Site conçu et développé par'; } else{  echo 'Website designed & developed by'; } ?> <a href="https://www.goyalinfotech.com/" target="_blank">Goyal Infotech</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script>
    function MM_jumpMenu(targ, selObj, restore) { //v3.0

        eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");

        if (restore)

            selObj.selectedIndex = 0;

    }
</script>
  <script src="<?php echo base_url(); ?>web/dist/js/jquery-3.4.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>web/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>web/dist/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>web/dist/js/scripts.js"></script>
</body>

</html>