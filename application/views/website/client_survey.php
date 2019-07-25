<?php $this->load->view('website/include/header'); ?>

<section class="top-header-box">
    <img src="<?php echo base_url();?>web/dist/image/bg/contact.jpg" class="img-fluid" />
    <div class="top-header-box-caption">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="title"> <?php if($this->first_uri == 'french'){ echo 'Formulaire Enquete Client'; } else{  echo 'Clients Survey form'; } ?> </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if($this->first_uri == 'french'){ echo 'Formulaire Enquete Client'; } else{  echo 'Clients Survey form'; } ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php $lang = $this->first_uri; ?>

  <section class="client-form pd80">
    <div class="container">
      <div class="row">
        
        <div class="col-sm-12">
          <?php
              $msg = $this->session->flashdata('msg');
              if (isset($msg) && !empty($msg)) { ?>
              <div class="alert alert-success">
                  <span><?php echo $msg ?></span>
              </div>
          <?php } ?>

          <?php
          $error = $this->session->flashdata('error');
          if (isset($error) && !empty($error)) {
              ?>
              <div class="alert alert-danger">
                  <span><?php echo $error ?></span>
              </div>
          <?php } ?>

          <h3 class="title">  <?php if($this->first_uri == 'french'){ echo '<span>FORMULAIRE</span> ENQUETE CLIENT'; } else{  echo '<span>CLIENT</span> SURVEY FORM'; } ?> </h3>
        </div>
        
    <form method="Post" action="<?php echo base_url().$lang.'/client-survey';?>" >
        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p> <strong>STORE</strong> </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="store" id="store">
                    <?php
                    $arr_store = array("KIN-1", "KIN-2", "KIN-3", "KIN-4", "KIN-5", "KIN-6", "KIN-7", "KIN-8");
                    foreach ($arr_store as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les parking et chariots de shopping sont disponibles et accessibles
                <?php } else{  ?>
                  Parking and shopping carts are available and accessible
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_1" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les heures d'ouverture sont commodes po
                <?php } else{  ?>
                  The opening hours are convenient in
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_2" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  La Disposition du <strong> magasin </strong> est conçu pour simplifier les achats . L'atmosphere et la décoration sont séduisants.
                <?php } else{  ?>
                  The <strong> Store </strong> Layout is designed to simplify shopping. The atmosphere and decoration are seductive.
                <?php } ?>
                </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_3" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les personnels est sympathique, courtois et bien informé
                <?php } else{  ?>
                  The staff is friendly, courteous and knowledgeable
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_4" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les rayons sont bien approvisionnés et entretenus
                <?php } else{  ?>
                  The shelves are well stocked and maintained
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_5" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les étiquettes placées aux étagères identifient clairement les prix des produits
                <?php } else{  ?>
                  Labels placed on shelves clearly identify product prices
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_6" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les Affiches sont bien présentées à point marquants les produits et promotions
                <?php } else{  ?>
                  Posters are well presented to the point products and promotions
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_7" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les produits vendus sont de la plus haute qualité
                <?php } else{  ?>
                  The products sold are of the highest quality
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_8" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les produits sont toujours frais et alternés
                <?php } else{  ?>
                  The products are always fresh and alternated
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_9" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  L'alimenetation et toilettes d'installations sont propres et bien entretenues
                <?php } else{  ?>
                  The food and toilet facilities are clean and well maintained
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_10" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  L'alimentation a un nombre suffisant de caissiers en tout le temps
                <?php } else{  ?>
                  The food has a sufficient number of cashiers in all the time
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_11" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  les caissiers expriment une gratitude et me disent merci d'avoir acheté à la fin de mes achats
                <?php } else{  ?>
                  The cashiers express gratitude and say thank you for buying at the end of my purchases
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_12" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les Offres promotionnelles sont attrayantes et bien annoncées
                <?php } else{  ?>
                  Promotional Offers are attractive and well advertised
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_13" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  Les affiches intérieures de l'alimentation attirent mon attention sur les promotions, les produits importés et les nouvelles arrivé
                <?php } else{  ?>
                  Inner food posters draw attention to promotions, imported products and new arrivals
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_14" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                 <strong> Les publicités KIN MARCHE m'encouragent à visiter ici </strong>
                <?php } else{  ?>  
                  <strong> KIN MARCHE advertisements encourage me to visit here </strong>
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_15" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <p>
                <?php if($this->first_uri == 'french'){ ?>
                  <strong> Globalement, je suis satisfait de l'alimenation </strong>
                <?php } else{  ?>
                  <strong> Overall, I am satisfied with the food </strong>
                <?php } ?>
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <select class="form-control" name="client_enquiry_option_16" >
                    <option value="Strongly agree">fortement d'accord</option>
                    <option value="Agree">fortement d'accord</option>
                    <option value="Strongly disagree">d'accord</option>
                    <option value="Disagree">d'accord</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-sm-12">
          <hr />
            <p>
              <?php if($this->first_uri == 'french'){ ?>
                Si vous avez d'autres commentaires ou préoccupations concernant votre expérience d'achat sur la bonté, s'il vous plaît sentez-vous libre de les mentionner ici.
              <?php } else{  ?>
                If you have any other comments or concerns regarding your shopping experience on Kindness, please feel free to mention them here.
              <?php } ?>
            </p>
            <p>
              <?php if($this->first_uri == 'french'){ ?>
                Nous apprécions sincèrement votre opinion honnête et une contribution précieuse
              <?php } else{  ?>
                We sincerely appreciate your honest opinion and a valuable contribution
              <?php } ?>
            </p>
          <hr />
        </div>

        <div class="col-sm-12">
          <div class="feedback">
            <div class="row">
          
            <div class="col-md-6">
              <div class="form-group">
                <label for=""> <?php if($this->first_uri == 'french'){ echo 'Nom'; } else{  echo 'Name'; } ?> </label>
                <input type="text" name="name" required="" class="form-control" placeholder="Enter name" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for=""> Email Id</label>
                <input type="text" name="email" required="" class="form-control" placeholder="Enter E-mail ID" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for=""> <?php if($this->first_uri == 'french'){ echo 'Téléphone'; } else{  echo 'Phone'; } ?> </label>
                <input type="text" name="phone" required="" class="form-control" placeholder="Enter Phone number" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for=""> <?php if($this->first_uri == 'french'){ echo 'Numéro de la Carte Récompense KIN MARCHE'; } else{  echo ' KIN MARCHE Reward Card Number'; } ?> </label>
                <input type="text" name="card_number" required="" class="form-control" placeholder="Enter Card Number" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Message</label>
                <textarea rows="7" name="message" required="" class="form-control" placeholder="Enter Message"></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <button class="btn client-form-btn">Submit Now</button>
              </div>
            </div>
          </div>
          </div>
        </div>
                    
    </form>

      </div>
    </div>
  </section>

<?php $this->load->view('website/include/footer'); ?>