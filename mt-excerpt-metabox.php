<?php
include( 'Excerpt.php' );
include( 'Metabox.php' );

use MakechTec\ExcerptMetabox\Metabox;
use MakechTec\ExcerptMetabox\Excerpt;

/*
Plugin Name: Excerpt Metabox
Plugin URI: https://makechtecnology.com/excerpt-metabox
Description: Create a text area for put the post extract, useful only if your
theme does not do this.
Author: Makech Tecnology
Version: 1.0.0
Author URI:https://makechtecnology.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/
Metabox::addToMetaboxes();
Excerpt::addToSavePost();