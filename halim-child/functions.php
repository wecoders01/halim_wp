<?php

add_action( 'wp_enqueue_scripts', 'halim_child_styles' );
function halim_child_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}