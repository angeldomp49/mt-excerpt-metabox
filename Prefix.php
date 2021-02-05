<?php
namespace MakechTec\ExcerptMetabox;

class Prefix{
    public const prefix = __NAMESPACE__ . __CLASS__;

    public static function withPrefix( $function ){
        return self::prefix . '::' . $function;
    }
}