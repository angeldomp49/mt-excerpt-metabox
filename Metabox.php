<?php

namespace MakechTec\ExcerptMetabox\Metabox;
use MakechTec\Excerpt\Prefix;

class Metabox extends Prefix{
    public const idSelector = 'mtEmExcerptMetabox';
    public const title = 'Custom Excerpt';
    public const pageType = 'post';
    public const priority = 'normal';
    public const paramsForCallback = 'high';

    public static function addToMetaboxes(){
        add_action( 'add_meta_boxes', self::withPrefix( 'createMetabox' ) );
    }

    public static function createMetabox(){
    
        add_meta_box( 
            self::idSelector, 
            self::title, 
            self::withPrefix( 'createTextArea' ), 
            self::pageType, 
            self::priority, 
            self::paramsForCallback 
        );
    }

    public static function createTextArea( $post ){
        $excerpt = get_the_excerpt( $post );
        ?>
            <p>Put your custom excerpt</p>
            <textarea name="mtEmExcerptContent" id="mtEmExcerptContent" cols="30" rows="10">
                <?php self::showSanitizedString( $excerpt ); ?>
            </textarea>
        <?php
    }

    public static function showSanitizedString( $str ){
        echo( esc_attr( $str ) );
    }

}