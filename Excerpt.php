<?php
namespace MakechTec\ExcerptMetabox;
use MakechTec\ExcerptMetabox\Prefix;


include_once( 'Prefix.php' );

class Excerpt implements Prefix{

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

    public static function withPrefix( $func ){
        return __CLASS__ . '::' . $func;
    }
}