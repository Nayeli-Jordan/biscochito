<?php 

/**
* Define paths to javascript, styles, theme and site.
**/
define( 'JSPATH', get_stylesheet_directory_uri() . '/js/' );
define( 'THEMEPATH', get_stylesheet_directory_uri() . '/' );
define( 'SITEURL', get_site_url() . '/' );


/*------------------------------------*\
	#SNIPPETS
\*------------------------------------*/
// require_once( 'inc/pages.php' );
require_once( 'inc/pages.php' );
require_once( 'inc/post-types.php' );
require_once( 'inc/taxonomies.php' );

/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

/**
* Enqueue frontend scripts and styles
**/
add_action( 'wp_enqueue_scripts', function(){
 
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array(''), '2.1.1', true );
	wp_enqueue_script( 'materialize_js', JSPATH.'bin/materialize.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'imagesloaded_js', JSPATH.'imagesloaded.pkgd.min.js', array(), '', true );
	wp_enqueue_script( 'masonry_js', JSPATH.'packery.pkgd.min.js', array(), '', true );
	wp_enqueue_script( 'bct_functions', JSPATH.'functions.js', array('materialize_js'), '1.0', true );
 
	wp_localize_script( 'bct_functions', 'siteUrl', SITEURL );
	wp_localize_script( 'bct_functions', 'theme_path', THEMEPATH );
	
	//wp_localize_script( 'dw_functions', 'isHome', (string)is_front_page() );
	// wp_localize_script( 'dw_functions', 'isSingular', (string)is_singular() );
	
	$is_home = is_front_page() ? "1" : "0";
	wp_localize_script( 'bct_functions', 'isHome', $is_home );
    $is_singular = is_singular() ? "1" : "0";
    wp_localize_script( 'bct_functions', 'isSingular', $is_singular );
    $is_page_gallery = is_page('gallery') ? "1" : "0";
    wp_localize_script( 'bct_functions', 'isPageGallery', $is_page_gallery );
	
	// $is_archive = is_archive() ? "1" : "0";
	// wp_localize_script( 'ri_functions', 'isArchive', $is_archive );
	// $is_author = is_author() ? "1" : "0";
	// wp_localize_script( 'ri_functions', 'isAuthor', $is_author );
 
});

/**
* Configuraciones WP
*/

//Habilitar thumbnail en post
add_theme_support( 'post-thumbnails' ); 

//Habilitar menú (aparece en personalizar)
add_action('after_setup_theme', 'add_top_menu');
function add_top_menu(){
	register_nav_menu('top_menu',__('Top menu'));
}

//Delimitar número palabras excerpt
function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
* Optimización
*/

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/**
* SEO y Analitics
**/

//Código Analitics
function add_google_analytics() {
    echo '<script src="https://www.google-analytics.com/ga.js" type="text/javascript"></script>';
    echo '<script type="text/javascript">';
    echo 'var pageTracker = _gat._getTracker("UA-117075138-1");';
    echo 'pageTracker._trackPageview();';
    echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');

/* Aplaza el análisis de JavaScript para una carga más rápida */
if(!is_admin()) {
    // Move all JS from header to footer
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}


/**
* CUSTOM POST TYPE
*/

//Costo de entrega
add_action( 'add_meta_boxes', 'zona_custom_metabox' );

function zona_custom_metabox(){
    add_meta_box( 'zona_meta', 'Información para zona de entrega', 'display_zona_atributos', 'zona', 'advanced', 'default');
}

function display_zona_atributos( $zona ){
    $id         = esc_html( get_post_meta( $zona->ID, 'zona_id', true ) );
    $path       = esc_html( get_post_meta( $zona->ID, 'zona_path', true ) );    
?>

<table style="width:100%; text-align: left;">
    <tr>
        <th style="padding-bottom:10px">
            <div style="width: 100%;">
                <label>ID zona</label></br>
                <input style="width:100%" type="text" name="zona_id" value="<?php echo $id; ?>" disabled>                
            </div>
            <!-- <div style="width: 48%; display: inline-block; float: left;">
                <label>Precio zona</label></br>
                <select name="zona_precio" style="width: 100%">
                    <option name="bajo_precio" value="bajo" <?php selected($precio, 'bajo'); ?>>Bajo</option>
                    <option name="medio_precio" value="medio" <?php selected($precio, 'medio'); ?>>Medio</option>
                    <option name="alto_precio" value="alto" <?php selected($precio, 'alto'); ?>>Alto</option>
                    <option name="cotizar_precio" value="cotizar" <?php selected($precio, 'cotizar'); ?>>A cotizar</option>
                </select>
            </div> -->
        </th>
    </tr>
    <tr>
        <th style="padding-bottom:10px">
            <label>PATH (svg) zona</label></br>
            <textarea rows="9" style="width:100%" name="zona_path" disabled><?php echo $path; ?></textarea>
        </th>
    </tr>    
    <tr>
        <th style="text-align: center;">
            <img style="max-width: 100%; width: 350px;" src="<?php echo THEMEPATH; ?>images/delegaciones.png" alt="">
        </th>
    </tr>
</table>
<?php

}

add_action( 'save_post', 'zona_save_metas', 10, 2 );
function zona_save_metas( $idzona, $zona ){
    //Comprobamos que es del tipo que nos interesa
    if ( $zona->post_type == 'zona' ){
    //Guardamos los datos que vienen en el POST
        if ( isset( $_POST['zona_id'] ) ){
            update_post_meta( $idzona, 'zona_id', $_POST['zona_id'] );
        } 
        if ( isset( $_POST['zona_path'] ) ){
            update_post_meta( $idzona, 'zona_path', $_POST['zona_path'] );
        }
    }
}