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
          <div class="blog-page">
            <div class="col-md-12">

			<?php
			while ( have_posts() ) : the_post(); ?>

              <div class="blog-post  wow fadeInUp">
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