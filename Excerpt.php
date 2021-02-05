<?php

namespace MakechTec\ExcerptMetabox\Excerpt;
use MakechTec\ExcerptMetabox\Prefix;

class Excerpt extends Prefix{

    public static function addToSavePost(){
        add_action( 'save_post', self::withPrefix( 'save' ) );
    }

    function save( $postID ){
        if( isset( $_POST['mtEmExcerptContent'] ) ){
            $currentPost = [
                'ID' => $postID,
                'post_excerpt' => $_POST['mtEmExcerptContent']
            ]; 
            wp_update_post( $currentPost );
        }
    }
}