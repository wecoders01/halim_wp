<?php

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function halim_theme_register_required_plugins() {

    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name'     => __( 'Advanced Custom Fields', 'halim' ), //plugin name
            'slug'     => 'advanced-custom-fields', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            // 'force_activation' => true,

        ),
        array(
            'name'     => __( 'Contact Form 7', 'halim' ), //plugin name
            'slug'     => 'contact-form-7', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            // 'force_activation' => true,

        ),
        array(
            'name'     => __( 'One Click Demo Import', 'halim' ), //plugin name
            'slug'     => 'one-click-demo-import', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            // 'force_activation' => true,

        ),
        // array(
        //     'name'             => __( 'Codestar Framework', 'halim' ), //plugin name
        //     'slug'             => 'codestar-framework', // The plugin slug (typically the folder name).
        //     'source'           => 'https://github.com/Codestar/codestar-framework/archive/master.zip', // The plugin source.
        //     'required'         => true, // If false, the plugin is only 'recommended' instead of required.
        //     'force_activation' => true,
        // ),
        array(
            'name'     => __( 'Halim Custom Posts Type', 'halim' ), //plugin name
            'slug'     => 'halim-custom-posts', // The plugin slug (typically the folder name).
            'source'   => 'https://github.com/wecoders01/halim-custom-post/archive/main.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            // 'force_activation' => true,
        ),
    );

    $config = array(
        'id'          => 'halim_plugins_activation', // Default absolute path to bundled plugins.
        'menu'        => 'hlim-plugins-activation', // Menu slug.
        'parent_slug' => 'themes.php', // Parent menu slug.
        'has_notices' => true, // Show admin notices or not.
    );
    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'halim_theme_register_required_plugins' );