<?php
/**
 * TeamOne functions and definitions
 *
 * @package TeamOne
 */
function teamone_setup() {
	global $content_width;
if ( ! isset( $content_width ) ){
      $content_width = 960;
}
	load_theme_textdomain( 'teamone', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	register_nav_menu( 'primary',  esc_attr__( 'Main Menu', 'teamone' ));
	
	add_theme_support( 'custom-background', array(
		'default-color' => '5bc1c3',
	) );
	add_theme_support( 'post-thumbnails' );
	add_image_size('teamone-servicethumb', 300, 160, true);
	add_image_size('teamone-slidethumb', 100, 75, true);
	add_image_size('teamone-slideimage', 950, 460, true);
	add_image_size('teamone-blogthumb', 650, 300, true);
}
add_action( 'after_setup_theme', 'teamone_setup' );
function teamone_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

if (!is_admin()) {
	if(is_front_page()){
		wp_enqueue_script( 'teamone-slidemobile-script', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'teamone-jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'teamone-camera-script', get_template_directory_uri() . '/js/camera.js', array( 'jquery' ), '', true );
	}
	wp_enqueue_script( 'teamone-superfish-script', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'teamone-mobilemenu-script', get_template_directory_uri() . '/js/reaktion.js', array( 'jquery' ), '', true );
	wp_enqueue_style('teamone-font-opensans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800', array(), '1', 'screen'); 
	wp_enqueue_style('teamone-arvo-font', '//fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic', array(), '1', 'screen'); 
	wp_enqueue_style('teamone-custom-style', get_template_directory_uri().'/custom.css', array(), '1', 'screen'); 
	wp_enqueue_style( 'teamone-genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
	wp_enqueue_style( 'teamone-style', get_stylesheet_uri());
}
}
add_action( 'wp_enqueue_scripts', 'teamone_scripts_styles' );
function teamone_widgets_init() {
	
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar', 'teamone' ),
		'id' => 'sidebar-1',
		'description' => esc_attr__( 'Right sidebar visible in all pages, drag and drop widgets from the left', 'teamone' ),
		'before_widget' => '<div id="%1$s" class="widgets">',
      	'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'teamone_widgets_init' );
function teamone_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'teamone_page_menu_args' );

if ( ! function_exists( 'teamone_content_nav' ) ) :

function teamone_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>

	<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
		<h3 class="assistive-text">
			<?php esc_html_e( 'Post navigation', 'teamone'); ?>
		</h3>
		<div class="nav-previous">
			<?php next_posts_link( esc_attr__( '<span class="meta-nav">&larr;</span> Older posts', 'teamone') ); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( esc_attr__( 'Newer posts <span class="meta-nav">&rarr;</span>', 'teamone') ); ?>
		</div>
	</nav>
	<!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;
function teamone_custom_meta () {

	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'teamone_meta',
			esc_attr__( 'Custom Post Features', 'teamone'  ),
			'teamone_meta_callback',
			$screen, 'side', 'high'
		);
	}
}
add_action( 'add_meta_boxes', 'teamone_custom_meta' );
function teamone_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'teamone_nonce' );
    $teamone_stored_meta = get_post_meta( $post->ID );
    ?>
	<p> <span class="teamone-row-title"><?php esc_html_e( 'Check the box below to feature post in the front page slider', 'teamone' ); ?></span>
		<div class="teamone-row-content">
			<label for="_teamone-slider-checkbox">
      <input type="checkbox" name="_teamone-slider-checkbox" id="_teamone-slider-checkbox" value="yes" <?php if ( isset ( $teamone_stored_meta['_teamone-slider-checkbox'] ) ) checked( $teamone_stored_meta['_teamone-slider-checkbox'][0], 'yes' ); ?> />
    </label>
		</div>
	</p>
	<p> <span class="teamone-row-title"><?php esc_html_e( 'Check the box to feature post in featured posts section', 'teamone' ); ?> </span>
		<div class="teamone-row-content">
			<label for="_teamone-services-checkbox">
      <input type="checkbox" name="_teamone-services-checkbox" id="_teamone-services-checkbox" value="yes" <?php if ( isset ( $teamone_stored_meta['_teamone-services-checkbox'] ) ) checked( $teamone_stored_meta['_teamone-services-checkbox'][0], 'yes' ); ?> />
    </label>
		</div>
	</p>
	<?php
}
function teamone_meta_save( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'teamone_nonce' ] ) && wp_verify_nonce( $_POST[ 'teamone_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']) || $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if( isset( $_POST[ '_teamone-slider-checkbox' ] ) ) {
    update_post_meta( $post_id, '_teamone-slider-checkbox', 'yes' );
} else {
    delete_post_meta( $post_id, '_teamone-slider-checkbox', '' );
}
	if( isset( $_POST[ '_teamone-services-checkbox' ] ) ) {
    update_post_meta( $post_id, '_teamone-services-checkbox', 'yes' );
} else {
    delete_post_meta( $post_id, '_teamone-services-checkbox', '' );
}
    // Checks for input and sanitizes/saves if needed
}
add_action( 'save_post', 'teamone_meta_save' );
function teamone_new_excerpt_length($length) {
	return 70;
}
add_filter('excerpt_length', 'teamone_new_excerpt_length'); 
function teamone_new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'teamone_new_excerpt_more');
add_post_type_support( 'page', 'excerpt');
// display custom admin notice

function teamone_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	if (!get_user_meta($user_id, 'teamone_notice_ignore')) {
		echo '<div class="updated notice"><p>'. esc_html__('Thanks for installing TeamOne theme!', 'teamone') .' <a href="http://cp3402.freddymutnosh.com/production/" target="blank">'. esc_html__('Check out our other themes  &#8594;', 'teamone') .'</a><a class="notice-dismiss" href="?teamone-ignore-notice"><span class="screen-reader-text">Dismiss Notice</span></a></p></div>';
	}
}
add_action('admin_notices', 'teamone_notice');

function teamone_notice_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
	if (isset($_GET['teamone-ignore-notice'])) {
		add_user_meta($user_id, 'teamone_notice_ignore', 'true', true);
	}
}
add_action('admin_init', 'teamone_notice_ignore');

add_action('admin_head', 'teamone_admin_style');
function teamone_admin_style() {
  echo '<style>
   .notice {position: relative;}
   a.notice-dismiss {text-decoration:none;}
  </style>';
}
require get_template_directory() . '/customizer.php';
