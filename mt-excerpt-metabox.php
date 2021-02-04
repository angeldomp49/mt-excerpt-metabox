<?php

add_action( 'add_meta_boxes', 'mtEmCreateMetabox' );

function mtEmCreateMetabox(){
    $idSelector = 'mtEmExcerptMetabox';
    $title = 'Custom Excerpt';
    $textAreaFunc = 'mtEmCreateTextArea';
    $pageType = 'post';
    $priority = 'normal';
    $paramsForCallback = 'nothing';

    add_meta_box( $idSelector, $title, $textAreaFunc, $pageType, $priority, $paramsForCallback );
}

function mtEmCreateTextArea( $post ){
    $excerpt = get_post_meta( $post->ID, 'excerpt', true );
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
        $post = get_post( $postID );
        $post->excerpt = $_POST['mtEmExcerptContent'];
        wp_update_post( $post );
    }
}
