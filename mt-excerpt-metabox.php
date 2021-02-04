<?php
/*
Plugin Name: Excerpt Metabox
Plugin URI: https://makechtecnology.com/excerpt-metabox
Description: para el extracto
Author: Makech Tecnology
Version: 1.0.0
Author URI:https://makechtecnology.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/
add_action( 'add_meta_boxes', 'mtEmCreateMetabox' );

function mtEmCreateMetabox(){
    $idSelector = 'mtEmExcerptMetabox';
    $title = 'Custom Excerpt';
    $textAreaFunc = 'mtEmCreateTextArea';
    $pageType = 'post';
    $priority = 'normal';
    $paramsForCallback = 'high';

    add_meta_box( $idSelector, $title, $textAreaFunc, $pageType, $priority, $paramsForCallback );
}

function mtEmCreateTestMetabox(){
    echo( 'hi there im here!!!!' );
}

function mtEmCreateTextArea( $post ){
    $excerpt = get_the_excerpt( $post );
    ?>
        <p>Put your custom excerpt</p>
        <textarea name="mtEmExcerptContent" id="mtEmExcerptContent" cols="30" rows="10">
            <?php echo( esc_attr ( $excerpt ) );?>
        </textarea>
    <?php
}

add_action( 'save_post', 'mtEmSaveExcerpt' );

function mtEmSaveExcerpt( $postID ){
    if( isset( $_POST['mtEmExcerptContent'] ) ){
        $mtEmPost = [
            'ID' => $postID,
            'post_excerpt' => $_POST['mtEmExcerptContent']
        ]; 
        wp_update_post( $mtEmPost );
    }
}
