<?php /* Template Name: custom-login-page */ ?>

<?php get_header();?>
    <div class="breadcrumb">
      <div class="container">
        <div class="breadcrumb-inner">
          <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>Blog</li>
          </ul>
        </div>
        <!-- /.breadcrumb-inner -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content">
      <div class="container">
        <div class="row">
         <div class="welcome-caption">
        	<div class="col-md-7">
        		<h1>Intellipet Philippines Co.</h1>
        		<p>Welcome to Intellipet online catalogue, new user please register to view our products.</p>
            <div class="welcome-image">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/animals.png" alt="">
            </div>  
        	</div>
    	</div>
    	<div class="col-md-1">
    	</div>
          <div class="blog-page">
            <div class="col-md-4">

			<?php
			while ( have_posts() ) : the_post(); ?>

              <div class="blog-post wow slideInRight">
                <h1><?php the_title();?></h1>
                <?php the_content(); ?>
              </div>

			<?php endwhile; // End of the loop.
			?>		  
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
<?php get_footer();?>