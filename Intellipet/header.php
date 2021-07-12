

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
  <head>
    <!-- Meta -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="google-site-verification" content="FKn-vXYyyr8VGfY7lI4gUuZ-d4RvTPJZZBg1txM-XBQ" />
    <meta name="description" content="Wholesale Pet Supplies Supplier in the Philippines">
    <meta name="keywords" content="Wholesale, Pet, Petsupplies, Petsupplier, Wholesalepetsupplier, Wholesalepet, Wholesalesupplier, Burgess, Carno, Happypets, Nurturezyme, Sundog, Thxpet, Dog, Cat, Hamster, Rabbit, Dogsupplier, Catsupplier, Hamstersupplier, Rabbitsupplier, Dogwholesalesupplier, Catwholesalesupplier, Hamsterwholesalesupplier, Rabbitwholesalesupplier">
    <meta name="author" content="Genesis Bernardo">
	 
    
 
    <!-- Fonts --> 
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
  </head>
  <body <?php body_class();?>>
    <!--  HEADER  -->
    <header class="header-style-1">
      <div class="main-header">
        <?php
              wp_nav_menu( array(
                'theme_location' => 'logout',

              )); 


              ?>
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
              <div class="logo">
                <a href="https://intellipetph.com/intellipet-home-page/">
                <img  src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Intellipet-logo-white-copy.png" alt="Intellipet-logo">
                </a>
              </div>
            </div>

           <!-- Search Bar -->  
            <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
              <div class="search-area">
                <?php dynamic_sidebar( 'custom-header-widget' ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Mega Menu -->
      <div>
          <?php
           wp_nav_menu( array(
            'theme_location' => 'my-custom-menu',
              )); 
              ?>
      </div>
            
    </div>
    </header>