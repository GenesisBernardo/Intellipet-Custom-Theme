<?php

//*** Support Title Tag 
add_theme_support( 'title-tag' );

//*** Enqueue Intellipet Scripts
function intellipet_enqueue_scripts (){
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '3.2.0' );
		
	wp_enqueue_style( 'main', get_template_directory_uri().'/assets/css/main.css', array(), '1.0' );
	
	wp_enqueue_style( 'blue', get_template_directory_uri().'/assets/css/blue.css', array(), '1.0' );
	
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri().'/assets/css/owl.carousel.css', array(), '1.0' );
	
	wp_enqueue_style( 'owl.transitions', get_template_directory_uri().'/assets/css/owl.transitions.css', array(), '1.0' );
	
	wp_enqueue_style( 'animate.min', get_template_directory_uri().'/assets/css/animate.min.css', array(), '1.0' );
	
	wp_enqueue_style( 'rateit', get_template_directory_uri().'/assets/css/rateit.css', array(), '1.0' );
	
	wp_enqueue_style( 'bootstrap-select.min', get_template_directory_uri().'/assets/css/bootstrap-select.min.css', array(), '1.0' );
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome.css', array(), '1.0' );
	
	// Theme stylesheet.
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	// WP Latest JQuery
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'bootstrap-hover-dropdown.min', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'echo.min', get_template_directory_uri() . '/assets/js/echo.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/assets/js/jquery.easing-1.3.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'bootstrap-slider.min', get_template_directory_uri() . '/assets/js/bootstrap-slider.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'lightbox.min', get_template_directory_uri() . '/assets/js/lightbox.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'bootstrap-select.min', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'bootstrap-select.min', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'wow.min', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0.0', true );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
	

}

add_action('wp_enqueue_scripts','intellipet_enqueue_scripts');


// WooCommerce Theme Support 

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );

}
	
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}


// Remove woocommerce defaults result count
add_action( 'init', 'intellipet_woocommerce_result_count' );
function intellipet_woocommerce_result_count() {
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
}

// Remove woocommerce defaults catalog ordering
add_action( 'init', 'intellipet_woocommerce_catalog_ordering' );
function intellipet_woocommerce_catalog_ordering() {
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
}

// Remove woocommerce defaults pagination
add_action( 'init', 'intellipet_woocommerce_pagination' );
function intellipet_woocommerce_pagination() {
    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10, 0 );
}

function intellipet_pagination() {

global $wp_query;

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
		'prev_next'          => true,
		'prev_text'          => __('<i class="fa fa-angle-left"></i>'),
		'next_text'          => __('<i class="fa fa-angle-right"></i>'),

    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination-container"><ul class="list-inline list-unstyled">';
        foreach ( $pages as $page ) {
                echo "<li>$page</li>";
        }
       echo '</ul></div>';
        }
}

// WooCommerce shop page show per page drop down

function intellipet_woocommerce_catalog_page_ordering() {
?>
<div class="lbl-cnt">

</div>
<?php
}
// now we set our cookie if we need to
function dl_sort_by_page($count) {
if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
$count = $_COOKIE['shop_pageResults'];
}
if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', 'www.your-domain-goes-here.com', false); //this will fail if any part of page has been output- hope this works!
$count = $_POST['woocommerce-sort-by-columns'];
}
// else normal page load and no cookie
return $count;
}
add_filter('loop_shop_per_page','dl_sort_by_page');


// WooCommerce custom catalog ordering 
add_filter( 'woocommerce_catalog_orderby', 'intellipet_custom_woocommerce_catalog_orderby' );
function intellipet_custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['menu_order'] = 'A-Z';
	$sortby['date'] = 'Newest to Oldest';
	//$sortby['price-desc'] = 'Price:HIghest first';
	unset($sortby['popularity']);
	//unset($sortby['date']);
	unset($sortby['rating']);
	unset($sortby['price-desc']);
    unset($sortby['price']);
	return $sortby;
}


// Remove list/grid view plugin default option
function intellipet_listgrid_plugin_option(){
   global $WC_List_Grid;
   remove_action( 'woocommerce_before_shop_loop', array( $WC_List_Grid, 'gridlist_toggle_button' ), 30); 
}
add_action('woocommerce_archive_description','intellipet_listgrid_plugin_option');

// Intellipet sidebar register
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Front Page', 'intellipet' ),
        'id' => 'frontpage',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'intellipet' ),
        'before_widget' => '<div class="sidebar-widget-body outer-top-xs">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
    ) );
}


function wpb_custom_new_menu ()
	{
		register_nav_menu('my-custom-menu',__('My Custom Menu'));
		register_nav_menu('my-custom-menu-customercare',__('My Custom Menu Customercare'));
		register_nav_menu('my-custom-menu-footer',__('My Custom Menu Footer'));
		register_nav_menu('logout',__('Logout'));
	}

	add_action('init','wpb_custom_new_menu');

class Walker_Nav_Primary extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array ()) {
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth >0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"sub-menu-2$submenu depth_$depth\">\n";

	}
}

class Walker_Nav_Primary_Two extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array ()) {
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth >0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"sub-menu-3$submenu depth_$depth\">\n";

	}
}


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 9;
  return $cols;
}


/*** Redirect login user */
add_filter( 'wpmem_login_redirect', 'my_login_redirect', 10, 2 );
function my_login_redirect( $redirect_to, $user_id ) {
    
    // This will redirect to https://yourdomain.com/your-page/
    return home_url( '/?page_id=7' );

}

function wpb_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Custom Header Widget Area',
        'id'            => 'custom-header-widget',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );


/* Block user from accessing directly link pag hindi sign out at mare-redirect sila sa login */
/*add_action( 'template_redirect', function() {

    if( ( !is_page('login') ) ) {

        if (!is_user_logged_in() ) {
            wp_redirect( site_url( '' ) );        // redirect all...
            exit();
        }

    }

}); */


 /*Add column number*/
function new_contact_methods( $contactmethods ) {
    $contactmethods['billing_phone'] = 'billing_phone';
    return $contactmethods;
}
add_filter( 'user_contactmethods', 'new_contact_methods', 10, 1 );


function new_modify_user_table( $column ) {
    $column['billing_phone'] = 'Contact Number';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'billing_phone' :
            return get_the_author_meta( 'billing_phone', $user_id );
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );

/**
 * Allow Shop Managers to edit and promote users with the Editor role 
 * using the 'woocommerce_shop_manager_editable_roles' filter.
 *
 * @param array $roles Array of role slugs for users Shop Managers can edit.
 * @return array
 */
function myextension_shop_manager_role_edit_capabilities( $roles ) {
    $roles[] = 'editor';
    return $roles;
}
add_filter( 'woocommerce_shop_manager_editable_roles', 'myextension_shop_manager_role_edit_capabilities' );

/* Change notfiy address of wp-members when someone register */
add_filter( 'wpmem_notify_addr', 'my_admin_email' );
 
function my_admin_email( $email ) {
 
    // single email example
    $email = 'intellipetph@gmail.com';
     
    // multiple emails example
    // $email = 'notify1@mydomain.com, notify2@mydomain.com';
     
    // take the default and append a second address to it example:
    // $email = $email . ', notify2@mydomain.com';
     
    // return the result
    return $email;
}


/* Add heading on login */

add_filter( 'wpmem_inc_login_args', 'my_login_args' );

/* New User Please Register to View Catalogue sa text sa login
function my_login_args( $args ) {
    // This example changes the button text.
    $args = array( 'heading'  => nl2br("<p style ='color:#16c7f4;font-size:24px;text-align:center;'>New User Please Register to View Catalogue</p>\n Existing Users Log In"));

    return $args;
} */

/* Add SKU Under title */
add_action( 'woocommerce_after_shop_loop_item_title',  'custom_after_title1' );
function custom_after_title1() {

echo "SKU: ";

}




/* Add SKU Under title */
add_action( 'woocommerce_after_shop_loop_item_title',  'custom_after_title' );
function custom_after_title() {

global $product;

if ( $product->get_sku() ) {
    echo $product->get_sku();
}

}


//Hide WooCommerce from non-logged in users
function woocommerce_hide_non_registered() {        
    if( ( is_shop() || is_product() || is_product_category() )  && ! is_user_logged_in() ) {
        wp_redirect( site_url( '/' ) );
        exit();
    }   
}
add_action( 'template_redirect','woocommerce_hide_non_registered' );


/* Wp members login form filter
add_filter( 'wpmem_inc_login_inputs', 'my_login_inputs' );
function my_login_inputs( $default_inputs ) {

    //$default_inputs[0]['name'] = 'Email';
	//

    return $default_inputs;
} */


/* Redirect user after register
add_action( 'wpmem_register_redirect','the_reg_redirect' );

function the_reg_redirect()
{
// NOTE: this is an action hook that uses wp_redirect
// wp_redirect must end with exit();

wp_redirect( 'https://intellipetph.com/' );

exit();
} */

/*
add_filter( 'wpmem_login_form_rows', 'my_login_form_rows_filter', 10, 2 );
 
function my_login_form_rows_filter( $rows, $action )
{
    
     
    Form rows are assembled as an array and the array
    is passed through this filter. The rows will be
    numerical array keys (defaults: 0 & 1).
     
    [0] => Array (
        [row_before] => 
        [label] => <label for="fieldname">Field Name</label>
        [field_before] => <div class="div_text">
        [field] => <input name="fieldname" type="text" id="fieldname" value="" class="class" placeholder="Username or Email" />
        [field_after] => </div>
        [row_after] => 
    )
     
    


 
    return $rows;
} */

