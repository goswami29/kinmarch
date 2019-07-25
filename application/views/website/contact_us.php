<?php $this->load->view('website/include/header'); ?>

<section class="top-header-box">
    <img src="<?php echo base_url();?>web/dist/image/bg/contact.jpg" class="img-fluid" />
    <div class="top-header-box-caption">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <h3 class="title"><?php if($this->first_uri == 'french'){ echo 'Detail De Contacts'; } else{  echo 'Contact Us'; } ?></h3>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if($this->first_uri == 'french'){ echo 'Detail De Contacts'; } else{  echo 'Contact Us'; } ?>
                </li>
            </ol>
            </nav>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="multi-address pd80">
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

        <h3 class="title">
            <?php if($this->first_uri == 'french'){ echo '<span>COORD</span>ONNÉES'; } else{  echo '<span>CONTACT </span>DETAIL'; } ?>
        </h3>
        </div>
            <?php foreach($contacts as $contact){ ?>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="box-bg">
                        <div class="round-div"><i class="fas fa-map-marker-alt"></i></div>
                        <h4><?php echo $contact->title; ?></h4>
                        <p><?php echo $contact->description; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php $lang = $this->first_uri; ?>

<section class="contact-form pd80">
    <div class="container">
    <div class="row">
        <div class="col-md-8" style="margin: 0 auto;">
        <h3 class="title"> <?php if($this->first_uri == 'french'){ echo '<span>ENTRER EN</span> CONTACT'; } else{  echo '<span>GET IN </span>TOUCH'; } ?> </h3>
        <p>
            <?php if($this->first_uri == 'french'){ ?>
                S'il vous plaît n'hésitez pas à nous contacter si vous en avez questions, 
                commentaires ou message, nous allons essayer pour répondre à tout!
            <?php } else{  ?>
                Please do not hesitate to contact us if you have any questions,
                comments or message, we will try to answer everything!
            <?php } ?> 
        </p>
        <form action="<?php echo base_url().$lang.'/contact-us';?>" method="post">
            <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="name" required="" class="form-control" placeholder="Full name" />
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="email" required="" class="form-control" placeholder="E-mail ID" />
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                <input type="text" name="mobile_no" required="" class="form-control" placeholder="Phone number" />
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                <textarea name="message" required="" class="form-control" rows="5" placeholder="Message"></textarea>
                </div>
            </div>
            </div>
            <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <button type="submit">Send Now</button>
            </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</section>

<?php $this->load->view('website/include/footer'); ?>