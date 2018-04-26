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
    $is_page_paquetes = is_page('paquetes') ? "1" : "0";
    wp_localize_script( 'bct_functions', 'isPagePaquetes', $is_page_paquetes );    
	
	// $is_archive = is_archive() ? "1" : "0";
	// wp_localize_script( 'ri_functions', 'isArchive', $is_archive );
	// $is_author = is_author() ? "1" : "0";
	// wp_localize_script( 'ri_functions', 'isAuthor', $is_author );
 
});

/**
* Configuraciones WP
*/

// Agregar css y js al administrador
function load_custom_files_wp_admin() {
        wp_register_style( 'bct_wp_admin_css', THEMEPATH . '/admin/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'bct_wp_admin_css' );

        wp_register_script( 'bct_wp_admin_js', THEMEPATH . 'admin/admin-script.js', false, '1.0.0' );
        wp_enqueue_script( 'bct_wp_admin_js' );        
}
add_action( 'admin_enqueue_scripts', 'load_custom_files_wp_admin' );

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
* CUSTOM FUNCTIONS
*/

/**
 * Obtener la taxonomía opcion (de lo que incluye el paquete) 
 */
function custom_taxonomies_opciones() {

    //Get post ID (En single funciona sin esta linea)
    global $post;
    //echo $post->ID;

    $taxonomyName = "opcion";
    $parent_terms = wp_get_object_terms( $post->ID, $taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));   
    foreach ($parent_terms as $pterm) {
        echo '<p><i class="material-icons tiny color-primary-dark align-middle">grade</i> ' . $pterm->name . '</p>'; 
        $terms = wp_get_object_terms( $post->ID, $taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => true));
        foreach ($terms as $term) {
            echo '<p>' . $term->name . '</p>';  
        }
    }
    echo '</ul>';
}

/**
 * Obtener la taxonomía variedad con padres e hijos en dropdown 
 */
function custom_taxonomies_variedad() {

    //Get post ID (En single funciona sin esta linea)
    global $post;

    $taxonomyName = "variedad";
    $parent_terms = wp_get_object_terms( $post->ID, $taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));   
    echo '<ul class="collapsible">';
    foreach ($parent_terms as $pterm) {
        echo '<li><div class="collapsible-header">
            <i class="material-icons tiny color-primary icon-open">arrow_drop_down</i>
            <i class="material-icons tiny color-primary icon-close hide">arrow_drop_up</i>
            <span>' . $pterm->name . '</span></div>';
        echo '<div class="collapsible-body"><ul class="list-variedades">';
        $terms = wp_get_object_terms( $post->ID, $taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => true));
        foreach ($terms as $term) {
            echo '<li>' . $term->name . '</li>';  
        }
        echo '</ul></div></li>';
    }
    echo '</ul>';
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


//Paquete single
add_action( 'add_meta_boxes', 'paquete_custom_metabox' );

function paquete_custom_metabox(){
    add_meta_box( 'paquete_meta', 'Información para paquete', 'display_paquete_atributos', 'paquete', 'advanced', 'default');
}

function display_paquete_atributos( $paquete ){
    $image     = esc_html( get_post_meta( $paquete->ID, 'paquete_image', true ) );    
    $image1    = esc_html( get_post_meta( $paquete->ID, 'paquete_image1', true ) );    
    $image2    = esc_html( get_post_meta( $paquete->ID, 'paquete_image2', true ) );    
    $image3    = esc_html( get_post_meta( $paquete->ID, 'paquete_image3', true ) );    
    $image4    = esc_html( get_post_meta( $paquete->ID, 'paquete_image4', true ) );    
    $image5    = esc_html( get_post_meta( $paquete->ID, 'paquete_image5', true ) );
    $precio50  = esc_html( get_post_meta( $paquete->ID, 'paquete_precio50', true ) );    
    $precio100 = esc_html( get_post_meta( $paquete->ID, 'paquete_precio100', true ) );    
    $precio150 = esc_html( get_post_meta( $paquete->ID, 'paquete_precio150', true ) );    
    $precio200 = esc_html( get_post_meta( $paquete->ID, 'paquete_precio200', true ) );    
    $precio250 = esc_html( get_post_meta( $paquete->ID, 'paquete_precio250', true ) );    
?>

<table style="width:100%; text-align: left;">
    <tr>
        <th>
            <label for="paquete_image">Imagen paquete</label><br>
            <input type="text" name="paquete_image" id="paquete_image" class="meta-image regular-text" value="<?php echo $image; ?>">
            <input type="button" class="button image-upload" value="Browse">
        </th>
        <th>
            <div class="image-preview">
                <img src="<?php echo $image; ?>">
            </div>            
        </th>
    </tr>
    <tr>
        <th>
            <label for="paquete_image1">Imagen paquete</label><br>
            <input type="text" name="paquete_image1" id="paquete_image1" class="meta-image regular-text" value="<?php echo $image1; ?>">
            <input type="button" class="button image-upload" value="Browse">
        </th>
        <th>
            <div class="image-preview">
                <img src="<?php echo $image1; ?>">
            </div>
        </th>
    </tr>
    <tr>        
        <th>
            <label for="paquete_image2">Imagen paquete</label><br>
            <input type="text" name="paquete_image2" id="paquete_image2" class="meta-image regular-text" value="<?php echo $image2; ?>">
            <input type="button" class="button image-upload" value="Browse">
        </th>
        <th>
            <div class="image-preview">
                <img src="<?php echo $image2; ?>">
            </div>
        </th>
    </tr>
    <tr>        
        <th>
            <label for="paquete_image3">Imagen paquete</label><br>
            <input type="text" name="paquete_image3" id="paquete_image3" class="meta-image regular-text" value="<?php echo $image3; ?>">
            <input type="button" class="button image-upload" value="Browse">
        </th>
        <th>
            <div class="image-preview">
                <img src="<?php echo $image3; ?>">
            </div>
        </th>
    </tr>
    <tr>        
        <th>
                <label for="paquete_image4">Imagen paquete</label><br>
                <input type="text" name="paquete_image4" id="paquete_image4" class="meta-image regular-text" value="<?php echo $image4; ?>">
                <input type="button" class="button image-upload" value="Browse">
        </th>
        <th>
            <div class="image-preview">
                <img src="<?php echo $image4; ?>">
            </div>
        </th>
    </tr>
    <tr>        
        <th>
                <label for="paquete_image5">Imagen paquete</label><br>
                <input type="text" name="paquete_image5" id="paquete_image5" class="meta-image regular-text" value="<?php echo $image5; ?>">
                <input type="button" class="button image-upload" value="Browse">
        </th>
        <th>
            <div class="image-preview">
                <img src="<?php echo $image5; ?>">
            </div>
        </th>
    </tr> 
</table>
<hr>
<table class="[ margin-bottom ]">
    <thead>
        <tr>
            <th>Personas</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>50</td>
            <td><input type="text" name="paquete_precio50" value="<?php echo $precio50; ?>"></td>
        </tr>
        <tr>
            <td>100</td>
            <td><input type="text" name="paquete_precio100" value="<?php echo $precio100; ?>"></td>
        </tr>
        <tr>
            <td>150</td>
            <td><input type="text" name="paquete_precio150" value="<?php echo $precio150; ?>"></td>
        </tr>
        <tr>
            <td>200</td>
            <td><input type="text" name="paquete_precio200" value="<?php echo $precio200; ?>"></td>
        </tr>
        <tr>
            <td>250</td>
            <td><input type="text" name="paquete_precio250" value="<?php echo $precio250; ?>"></td>
        </tr>
        <tr>
            <td>Más</td>
            <td>A cotizar</td>
        </tr>
    </tbody>
</table>
<?php

}

add_action( 'save_post', 'paquete_save_metas', 10, 2 );
function paquete_save_metas( $idpaquete, $paquete ){
    //Comprobamos que es del tipo que nos interesa
    if ( $paquete->post_type == 'paquete' ){
    //Guardamos los datos que vienen en el POST
        if ( isset( $_POST['paquete_image'] ) ){
            update_post_meta( $idpaquete, 'paquete_image', $_POST['paquete_image'] );
        }
        if ( isset( $_POST['paquete_image1'] ) ){
            update_post_meta( $idpaquete, 'paquete_image1', $_POST['paquete_image1'] );
        }
        if ( isset( $_POST['paquete_image2'] ) ){
            update_post_meta( $idpaquete, 'paquete_image2', $_POST['paquete_image2'] );
        }
        if ( isset( $_POST['paquete_image3'] ) ){
            update_post_meta( $idpaquete, 'paquete_image3', $_POST['paquete_image3'] );
        }
        if ( isset( $_POST['paquete_image4'] ) ){
            update_post_meta( $idpaquete, 'paquete_image4', $_POST['paquete_image4'] );
        }
        if ( isset( $_POST['paquete_image5'] ) ){
            update_post_meta( $idpaquete, 'paquete_image5', $_POST['paquete_image5'] );
        }
        if ( isset( $_POST['paquete_precio50'] ) ){
            update_post_meta( $idpaquete, 'paquete_precio50', $_POST['paquete_precio50'] );
        }
        if ( isset( $_POST['paquete_precio100'] ) ){
            update_post_meta( $idpaquete, 'paquete_precio100', $_POST['paquete_precio100'] );
        }
        if ( isset( $_POST['paquete_precio150'] ) ){
            update_post_meta( $idpaquete, 'paquete_precio150', $_POST['paquete_precio150'] );
        }
        if ( isset( $_POST['paquete_precio200'] ) ){
            update_post_meta( $idpaquete, 'paquete_precio200', $_POST['paquete_precio200'] );
        }
        if ( isset( $_POST['paquete_precio250'] ) ){
            update_post_meta( $idpaquete, 'paquete_precio250', $_POST['paquete_precio250'] );
        }
    }
}