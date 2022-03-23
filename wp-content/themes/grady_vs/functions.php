<?php

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Theme Subscribe Settings',
		'menu_title'  => 'Subscribe',
		'parent_slug' => 'theme-general-settings',
	) );

}


add_filter( 'the_generator', '__return_empty_string' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );

add_filter( 'show_admin_bar', '__return_false' );


add_filter( 'pll_get_post_types', 'unset_cpt_pll', 10, 2 );
function unset_cpt_pll( $post_types, $is_settings ) {
	$post_types['acf-field-group'] = 'acf-field-group';
	$post_types['acf']             = 'acf';

	return $post_types;
}

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
add_theme_support( 'post-thumbnails' );
add_filter( 'jpeg_quality', function () {
	return 100;
} );

function _remove_script_version( $src ) {
	$parts = explode( '?', $src );
	if ( $parts[0] == 'https://fonts.googleapis.com/css' ) {
		$parts[0] = $src;
	}
	if ( $parts[0] == 'https://maps.googleapis.com/maps/api/js' ) {
		$parts[0] = $src;
	}


	return $parts[0];
}

add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


function disable_wp_emojis_in_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


//Add style or scripts files
function load_theme_styles() {
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), null, 'all' );
	wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css', array(), null, 'all' );
	wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), time(), 'all' );;

	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'style' );
	$js_directory_uri = get_template_directory_uri() . '/js/';
	wp_register_script( 'slick', $js_directory_uri . 'slick.js', array( 'jquery' ), null );
	wp_register_script( 'script', $js_directory_uri . 'script.js', array( 'jquery' ), null );

    wp_enqueue_script( 'slick' );
	wp_enqueue_script( 'script' );

}

add_action( 'wp_enqueue_scripts', 'load_theme_styles', 100 );


//Register menu
function menulang_setup() {
	load_theme_textdomain( 'themename', get_template_directory() . '/languages' );
	register_nav_menus( array( 'header_menu' => __( 'Menu', 'themename' ) ) );
    register_nav_menus( array( 'header_top_menu' => __( 'Top Menu', 'themename' ) ) );
	register_nav_menus( array( 'social' => __( 'Social link', 'themename' ) ) );
    register_nav_menus( array( 'footer_bottom_menu' => __( 'footer bottom menu', 'themename' ) ) );
}

add_action( 'after_setup_theme', 'menulang_setup' );

function inspiry_theme_sidebars() {
	register_sidebar( array( 'name'          => __( 'Header logo', 'themename' ),
	                         'id'            => 'header_logo',
	                         'description'   => __( 'Header logo', 'themename' ),
	                         'before_widget' => '',
	                         'after_widget'  => '',
	                         'before_title'  => '',
	                         'after_title'   => ''
	) );
	register_sidebar( array( 'name'          => __( 'Header button', 'themename' ),
	                         'id'            => 'header_button',
	                         'description'   => __( 'Header button', 'themename' ),
	                         'before_widget' => '',
	                         'after_widget'  => '',
	                         'before_title'  => '',
	                         'after_title'   => ''
	) );
    register_sidebar( array( 'name'          => __( 'Header image', 'themename' ),
        'id'            => 'header_image',
        'description'   => __( 'Header image under menu', 'themename' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ) );

    register_sidebar( array( 'name'          => __( 'Footer Hour', 'themename' ),
        'id'            => 'footer_hour',
        'description'   => __( 'Footer Hour', 'themename' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ) );
    register_sidebar( array( 'name'          => __( 'Footer Address', 'themename' ),
        'id'            => 'footer_address',
        'description'   => __( 'Footer Address', 'themename' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ) );
    register_sidebar( array( 'name'          => __( 'Footer Image-logo', 'themename' ),
        'id'            => 'footer_image-logo',
        'description'   => __( 'Footer image-logo', 'themename' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ) );

    register_sidebar( array( 'name'          => __( 'Footer Copyright', 'themename' ),
                              'id'            => 'footer_copyright',
                              'description'   => __( 'Footer copyright', 'themename' ),
                              'before_widget' => '',
                              'after_widget'  => '',
                              'before_title'  => '',
                              'after_title'   => ''
    ) );


}

add_action( 'widgets_init', 'inspiry_theme_sidebars' );

// TODO: excerpt length
function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

function add_file_types_to_uploads( $file_types ) {
	$new_filetypes        = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types           = array_merge( $file_types, $new_filetypes );

	return $file_types;
}

add_action( 'upload_mimes', 'add_file_types_to_uploads' );



// Remove blog highlighting
class    Main_Submenu_Class extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $classes     = array( 'sub-menu', 'list-unstyled', 'child-navigation' );
        $class_names = implode( ' ', $classes );
        $output      .= "\n" . '<ul class="' . $class_names . '">' . "\n";
    }

    function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        }

        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
        global $wp_query;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names_arr = array();
        $class_names     = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        if(is_single()){
            $curr_post_type=get_post_type(get_the_ID());

            if (in_array($curr_post_type,$classes)) {
                $classes[]='current_page_parent';
                $classes[]='current-menu-item';

            } else {
                if (($key = array_search('current_page_parent', $classes)) !== false) {
                    unset($classes[$key]);
                }
                if (($key = array_search('current-menu-item', $classes)) !== false) {
                    unset($classes[$key]);
                }
            }

        }

        $class_names       = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names_arr[] = esc_attr( $class_names );
        $class_names_arr[] = 'menu-item-id-' . $item->ID;
        if ( $args->has_children ) {
            $class_names_arr[] = 'has-child';
        }

        $class_names = ' class="' . implode( ' ', $class_names_arr ) . '"';
        $output      .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';
        $attributes  = '';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . $item->url . '"' : '';


        $item_output = $args->before;
        $item_output .= '<div class="parent"><a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
        $item_output .= $args->link_after;
        $item_output .= '</a>';
        if ( $args->has_children ) {
            $item_output .= '<span data-id="' . $item->ID . '"><i class="fal fa-chevron-left"></i></span>';
        }
        $item_output .= '</div>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}


// Numbered pagination
function pagination( $pages = '', $range = 4 ) {
	$showitems = ( $range * 2 ) + 1;

	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo "<div class='paginate'>";
		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo; First</a>";
		}
		if ( $paged > 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo; Previous</a>";
		}

		for ( $i = 1; $i <= $pages; $i ++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? "<span class=\"pag_item current\">" . $i . "</span>" : "<a href='" . get_pagenum_link( $i ) . "' class=\"pag_item inactive\">" . $i . "</a>";
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo "<a href=\"" . get_pagenum_link( $paged + 1 ) . "\">Next &rsaquo;</a>";
		}
		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $pages ) . "'>Last &raquo;</a>";
		}
		echo "</div>\n";
	}
}


// TODO: Ajax load posts
// Ajax load posts
function load_posts () {
    $paged = isset($_POST['current_page']) ? (int) $_POST['current_page'] : 1;
    $paged++;
$pages=6;
$args3 = array('post_type' => 'post', 'posts_per_page' =>$pages,'order' => 'asc', 'post_status' => 'publish','paged' => $paged);
$posts1 = new WP_Query($args3);?>

<?php if ( $posts1->have_posts() ){ ?>
         <?php      while ( $posts1->have_posts() ) {
                    $posts1->the_post();
                $id         = get_the_ID();
                $permalink  = get_the_permalink();
                $image      = get_the_post_thumbnail_url( $id, 'full' );
                $title      = get_the_title();
            $date1       = get_the_date('M');
            $date2       = get_the_date('n');
            $date       = get_the_date('l,m/d/Y');
                 $time = get_the_time();
                $categories = get_the_terms( $id, 'category' );
                $cat        = $categories[0]->name;
                $excerpt    = get_the_excerpt(); ?>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="press_item">
                        <a href="<?php echo $permalink; ?>" class="press_item_img">
                            <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                        </a>
                        <div class="div_date"> <p class="time_head"><?php echo $date1;?></p>
                            <p class="time_head_bottom"><?php echo $date2 ; ?></p>
                        </div>
                        <div class="press_item_wrapper">
                            <a class="press_item_title" href="<?php echo $permalink; ?>">
                                <h5><?php echo $title; ?></h5>
                            </a>
                            <p class="date_text"><?php echo $date; ?></p>
                            <p class="time_text"><?php echo $time; ?></p>
                            <p class="press_item_excerpt"><?php echo $excerpt; ?></p>
                            <a class="home_news_btn" href="<?php echo $permalink; ?>">
                                MORE
                            </a>
                        </div>
                    </div>
                </div>

            <?php
            }

        die();
    }
    ?>
    <?php
}
add_action('wp_ajax_load_posts', 'load_posts');
add_action('wp_ajax_nopriv_load_posts', 'load_posts');



// TODO: Short code snazzy map
//Snazzy Map
function func_show_map_contact($attr) {
    $lt=$lg=$address=$ret=$lang='';
    $snazzymaps='no';
    if (isset($attr['lt'])) $lt=$attr['lt'];
    if (isset($attr['lg'])) $lg=$attr['lg'];
    if (isset($attr['address'])) $address=$attr['address'];
    if (isset($attr['language'])) $lang='&language='.$attr['language'].'';
    if (isset($attr['snazzymaps'])) $snazzymaps=$attr['snazzymaps'];
    if ($lt!='' AND $lg!='') {
        $json='';
        if ($snazzymaps=='yes') {
            $SnazzyMapStyles = get_option( 'SnazzyMapStyles' );
            if (isset($SnazzyMapStyles[0]['json']))$json=$SnazzyMapStyles[0]['json'];
        }

        $ret='
<div class="out_acf-map marg_bottom" >
    <div class="acf-map" >
        <div class="marker" data-lat="'.$lt.'" data-lng="'.$lg.'"></div>
    </div>
    <div class="overlay" onclick="style.pointerEvents='."'none'".'"></div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQMQZvc0kLUzOZg8-1f3TVGb3Hs1_S4c'.$lang.'"></script>
<script>
    const zooms=15;
	let snazzystyles='.$json.';
	const pinImage="'.get_template_directory_uri() .'/image/Vector.png";
    (function($) {
        let map = null;
        $(document).ready(function(){
            $(".acf-map").each(function(){
                map = new_map( $(this) ,snazzystyles);
            });
        });
    })(jQuery);
</script>';

    }
    return $ret;
}
add_shortcode('show_map_contact','func_show_map_contact');


function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


// TODO: file connection
//File connection


// TODO: Short code for posts
//Short code for  posts on different pages





//Short code youtube
function youtube_func($atts)
{
    $params = shortcode_atts(array(
        'youtube_link' => 'https://www.youtube.com/watch?v=PkkV1vLHUvQ',
        'img_link' => '/wp-content/uploads/2021/04/privte-pilot-female-1.png'),
        $atts);
    $vid = '<div class="video_container">';

    $vid .= '
    <div class="video_wrapper">
    <a data-fancybox href="' . $params['youtube_link'] . '">
    <div class="video_btn"><img src="/wp-content/uploads/2021/04/Group-3790.png" alt="btn"></div>
    <img class="img_link_v" src="' . $params['img_link'] . '" alt="video">
    </a>
    </div>
    ';

    $vid .= '</div>';
    return $vid;
}

add_shortcode('youtube_video', 'youtube_func');


function add_post_type_menus() {
    $post_type_labels = array(
        'name'              => __( 'Our Menus', 'themename' ),
        'singular_name'     => __( 'Our Menus', 'themename' ),
        'add_new'           => __( 'New', 'themename' ),
        'add_new_item'      => __( 'New', 'themename' ),
        'edit_item'         => __( 'Review', 'themename' ),
        'new_item'          => __( 'New', 'themename' ),
        'view_item'         => __( 'View', 'themename' ),
        'search_items'      => __( 'Search', 'themename' ),
        'not_found'         => __( 'Not Found', 'themename' ),
        'parent_item_colon' => '',
    );
    $description      = get_option( 'theme_custom_description' );

    $post_type_args = array(
        'labels'             => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'query_var'          => true,
        'has_archive'        => true,
        'capability_type'    => 'post',
        'hierarchical'       => true,
        'menu_icon'          => 'dashicons-clipboard',
        'menu_position'      => 5,
        'description'        => $description,
        'supports'           => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
        'rewrite'            => array( 'slug' => 'menus_foods', 'with_front' => false )
    );
    register_post_type( 'our_menus', $post_type_args );

}
add_action( 'init', 'add_post_type_menus' );