  
    <!-- FOOTER -->
    <footer id="footer" class="footer color-bg">
      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="module-heading">
                <h4 class="module-title">Contact Us</h4>
              </div>
              <div class="module-body">
                <ul class="toggle-footer" style="">
                  <li class="media">
                    <div class="pull-left">
                      <span class="icon fa-stack fa-lg">
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="media-body">
                      <p>(63) 09451544949<br>(63)2-85681349</p>
                    </div>
                  </li>
                  <li class="media">
                    <div class="pull-left">
                      <span class="icon fa-stack fa-lg">
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="media-body">
                      <span>Intellipetph@gmail.com</span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="module-heading">
                <h4 class="module-title">Customer Care</h4>
              </div>
              <div class="module-body">
                <ul class="list-unstyled">
                  <?php
              wp_nav_menu( array(
                'theme_location' => 'my-custom-menu-customercare',

              )); 


              ?>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="module-heading">
                <h4 class="module-title">Menu</h4>
              </div>
              <div class="module-body">
                <ul class="footer-menu">
                 <?php
              wp_nav_menu( array(
                'theme_location' => 'my-custom-menu-footer',

              )); 


              ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright-bar">
        <div class="container">
          <div class="col-xs-12 col-sm-6 no-padding social">
            <ul class="link">
              <li class="fb pull-left"><a target="_blank" rel="nofollow" href="https://facebook.com/intellipetph/" title="Facebook"></a></li>
            </ul>
          </div>
          <h4 class="footer-copyright">&copy; <?php echo date("Y"); ?> Intellipet all rights reserved. </h4>
        </div>
      </div>
    </footer>

  <?php wp_footer(); ?>
  </body>
</html>

