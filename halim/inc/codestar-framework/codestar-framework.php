<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.
/**
 *
 * @package   Codestar Framework - WordPress Options Framework
 * @author    Codestar <info@codestarthemes.com>
 * @link      http://codestarframework.com
 * @copyright 2015-2021 Codestar
 *
 *
 * Plugin Name: Codestar Framework
 * Plugin URI: http://codestarframework.com/
 * Author: Codestar
 * Author URI: http://codestarthemes.com/
 * Version: 2.2.1
 * Description: A Simple and Lightweight WordPress Option Framework for Themes and Plugins
 * Text Domain: csf
 * Domain Path: /languages
 *
 */
require_once plugin_dir_path( __FILE__ ) . 'classes/setup.class.php';

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'halim_options';

    // ----------------------------------------
    // Halim Theme Options
    // ----------------------------------------
    CSF::createOptions( $prefix, array(
        'menu_title'      => __( 'Theme Options', 'halim' ),
        'menu_type'       => 'submenu',
        'menu_parent'     => 'themes.php',
        'menu_slug'       => 'halim-theme-options',
        'framework_title' => 'Halim Theme <small>by iTanvir</small>',
    ) );

    // ----------------------------------------
    // Header Theme Options
    // ----------------------------------------
    CSF::createSection( $prefix, array(
        'id'    => 'header_options',
        'title' => __( 'Header Options', 'halim' ),
        'icon'  => 'fas fa-bars',
    ) ); // end: Header Theme Option

    // Header Top Options
    CSF::createSection( $prefix, array(
        'parent' => 'header_options',
        'title'  => __( 'Header Top', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // begin: Top_Header Enabling Area
            array(
                'id'       => 'enable_top_header_area',
                'type'     => 'switcher',
                'title'    => __( 'Enable Header Top Area?', 'halim' ),
                'label'    => __( 'You want to Enable this section?', 'halim' ),
                'subtitle' => __( 'If you want to enable this area, switch ON', 'halim' ),
                'default'  => true,
            ), // end: Top_Header Enabling Area

            // begin: Header top left area
            array(
                'id'           => 'header_links',
                'type'         => 'group',
                'title'        => __( 'Header Left Links', 'halim' ),
                'button_title' => __( 'Add New Link', 'halim' ),
                'subtitle'     => __( 'Add New Header Left Link', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'link_text',
                        'type'  => 'text',
                        'title' => __( 'Link Text', 'halim' ),
                    ),
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => __( 'Link Icon', 'halim' ),
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => __( 'Link', 'halim' ),
                    ),
                    array(
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'title'   => __( 'Link Target', 'halim' ),
                        'default' => '_blank',
                        'options' => array(
                            '_self'  => __( 'Open in Same Tab', 'halim' ),
                            '_blank' => __( 'Open in New Tab', 'halim' ),
                        ),
                    ),
                ),
                'dependency'   => array( 'enable_top_header_area', '==', 'true' ),
                'default'      => array(
                    array(
                        'link_text' => __( 'info@website.com', 'halim' ),
                        'icon'      => 'fas fa-envelope',
                        'link'      => 'mailto: info@website.com',
                    ),
                    array(
                        'link_text' => __( '+111 222 3333', 'halim' ),
                        'icon'      => 'fas fa-phone',
                        'link'      => '',
                    ),
                ),
            ), // end: Header Left Area

            // begin: Social Enabling Area
            array(
                'id'         => 'enable_social_area',
                'type'       => 'switcher',
                'title'      => __( 'Enable Top Social Area?', 'halim' ),
                'label'      => __( 'You want to Enable this section?', 'halim' ),
                'subtitle'   => __( 'If you want to enable this area, switch ON', 'halim' ),
                'default'    => true,
                'dependency' => array( 'enable_top_header_area', '==', 'true' ),
            ), // end: Social Enabling Area
        ), // end: fields
    ) ); // end: Header top options

    //  Header Social Options
    CSF::createSection( $prefix, array(
        'parent' => 'header_options',
        'title'  => __( 'Header Social Links', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // begin: Social group
            array(
                'id'           => 'socials',
                'type'         => 'group',
                'title'        => __( 'Social Links', 'halim' ),
                'button_title' => __( 'Add New Link', 'halim' ),
                'subtitle'     => __( 'Add New Social Link', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'social_text',
                        'type'  => 'text',
                        'title' => __( 'Social Text', 'halim' ),
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => __( 'Link', 'halim' ),
                    ),
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => __( 'Link Icon', 'halim' ),
                    ),
                    array(
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'title'   => __( 'Link Target', 'halim' ),
                        'default' => '_blank',
                        'options' => array(
                            '_self'  => __( 'Open in Same Tab', 'halim' ),
                            '_blank' => __( 'Open in New Tab', 'halim' ),
                        ),
                    ),
                ),
                'default'      => array(
                    array(
                        'social_text' => __( 'Facebook', 'halim' ),
                        'link'        => '#',
                        'icon'        => 'fab fa-facebook-f',
                    ),
                    array(
                        'social_text' => __( 'Instagram', 'halim' ),
                        'link'        => '#',
                        'icon'        => 'fab fa-instagram',
                    ),
                    array(
                        'social_text' => __( 'Twitter', 'halim' ),
                        'link'        => '#',
                        'icon'        => 'fab fa-twitter',
                    ),
                    array(
                        'social_text' => __( 'Linkedin', 'halim' ),
                        'link'        => '#',
                        'icon'        => 'fab fa-linkedin-in',
                    ),
                    array(
                        'social_text' => __( 'Google+', 'halim' ),
                        'link'        => '#',
                        'icon'        => 'fab fa-google-plus-g',
                    ),
                ),
            ), // end: Social Group
        ), // end: Fields
    ) ); // end: Social Options

    // Header Style Options
    CSF::createSection( $prefix, array(
        'parent' => 'header_options',
        'title'  => __( 'Header Style', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // begin: Top Header Color
            array(
                'id'                    => 'top_header_bg',
                'type'                  => 'background',
                'background_image'      => false,
                'background_position'   => false,
                'background_repeat'     => false,
                'background_attachment' => false,
                'background_size'       => false,
                'title'                 => __( 'Top Header Background Color', 'halim' ),
                'desc'                  => __( 'Choice Background Color.', 'halim' ),
                'default'               => array( 'background-color' => '#635cdb' ),
                'output'                => array( '.header-top' ),
            ),
            array(
                'id'       => 'top_header_text',
                'type'     => 'typography',
                'title'    => __( 'Top Header Text Style.', 'halim' ),
                'subtitle' => __( 'Style Top Header Text.', 'halim' ),
                'output'   => array( '.header-top', '.header-top a' ),
                'default'  => array(
                    'color'       => '#ffffff',
                    'font-family' => 'Poppins',
                    'font-size'   => '14',
                    'type'        => 'google',
                    'unit'        => 'px',
                ),
            ),
            array(
                'id'                    => 'menu_header',
                'type'                  => 'background',
                'background_image'      => false,
                'background_position'   => false,
                'background_repeat'     => false,
                'background_attachment' => false,
                'background_size'       => false,
                'title'                 => __( 'Menu Header Background Color', 'halim' ),
                'desc'                  => __( 'Choice Background Color.', 'halim' ),
                'default'               => array( 'background-color' => '#ffffff' ),
                'output'                => array( '.header' ),
            ),
            array(
                'id'                    => 'menu_header_sticky',
                'type'                  => 'background',
                'background_image'      => false,
                'background_position'   => false,
                'background_repeat'     => false,
                'background_attachment' => false,
                'background_size'       => false,
                'title'                 => __( 'Sticky Menu Header Background Color', 'halim' ),
                'desc'                  => __( 'Choice Background Color When Menu Sticky.', 'halim' ),
                'default'               => array( 'background-color' => '#ffffff' ),
                'output'                => array( '.header.header-fixed.sticky' ),
            ),

        ), // end: Fields
    ) ); // end: Header Style Options

    // ----------------------------------------
    // Section Heading Options
    // ----------------------------------------
    CSF::createSection( $prefix, array(
        'id'    => 'section_heading',
        'title' => __( 'Section Heading', 'halim' ),
        'icon'  => 'fas fa-heading',
    ) ); // end: Section Heading Option

    // About Section Heading
    CSF::createSection( $prefix, array(
        'parent' => 'section_heading',
        'title'  => __( 'About Section Heading', 'halim' ),
        'icon'   => 'fas fa-address-card',

        // begin: Fields
        'fields' => array(

            // begin: About Section
            array(
                'id'      => 'about_sec_title',
                'type'    => 'text',
                'title'   => __( 'About Section Title', 'halim' ),
                'desc'    => __( 'Write Section Title Here.', 'halim' ),
                'default' => __( 'about us', 'halim' ),
            ),
            array(
                'id'      => 'about_sec_subtitle',
                'type'    => 'text',
                'title'   => __( 'About Section Subtitle', 'halim' ),
                'desc'    => __( 'Write Section Subtitle Here.', 'halim' ),
                'default' => __( 'who we are?', 'halim' ),
            ),
            array(
                'id'      => 'about_sec_desc',
                'type'    => 'textarea',
                'title'   => __( 'About Section Description', 'halim' ),
                'before'  => __( 'Write Section Description Here.', 'halim' ),
                'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.', 'halim' ),
            ), // end: About Section
        ), // end: Fields
    ) ); // end: About Section Heading

    // Service Section Heading
    CSF::createSection( $prefix, array(
        'parent' => 'section_heading',
        'title'  => __( 'Service Section', 'halim' ),
        'icon'   => 'fas fa-truck-moving',

        // begin: Fields
        'fields' => array(

            // begin: Service Section
            array(
                'id'      => 'service_sec_title',
                'type'    => 'text',
                'title'   => __( 'Service Section Title', 'halim' ),
                'desc'    => __( 'Write Section Title Here.', 'halim' ),
                'default' => __( 'our service', 'halim' ),
            ),
            array(
                'id'      => 'service_sec_subtitle',
                'type'    => 'text',
                'title'   => __( 'Service Section Subtitle', 'halim' ),
                'desc'    => __( 'Write Section Subtitle Here.', 'halim' ),
                'default' => __( 'who we are?', 'halim' ),
            ),
            array(
                'id'      => 'service_sec_desc',
                'type'    => 'textarea',
                'title'   => __( 'Service Section Description', 'halim' ),
                'before'  => __( 'Write Section Description Here.', 'halim' ),
                'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.', 'halim' ),
            ), // end: Service Section
        ), // end: Fields
    ) ); // end: Service Section Heading

    // Team Section Heading
    CSF::createSection( $prefix, array(
        'parent' => 'section_heading',
        'title'  => __( 'Team Section', 'halim' ),
        'icon'   => 'fas fa-users',

        // begin: Fields
        'fields' => array(

            // begin: Team Section
            array(
                'id'      => 'team_sec_title',
                'type'    => 'text',
                'title'   => __( 'Team Section Title', 'halim' ),
                'desc'    => __( 'Write Section Title Here.', 'halim' ),
                'default' => __( 'creative team', 'halim' ),
            ),
            array(
                'id'      => 'team_sec_subtitle',
                'type'    => 'text',
                'title'   => __( 'Team Section Subtitle', 'halim' ),
                'desc'    => __( 'Write Section Subtitle Here.', 'halim' ),
                'default' => __( 'who we are?', 'halim' ),
            ),
            array(
                'id'      => 'team_sec_desc',
                'type'    => 'textarea',
                'title'   => __( 'Team Section Description', 'halim' ),
                'before'  => __( 'Write Section Description Here.', 'halim' ),
                'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.', 'halim' ),
            ), // end: Team Section
        ), // end: Fields
    ) ); // end: Team Section Heading

    // Testimonial Section Heading
    CSF::createSection( $prefix, array(
        'parent' => 'section_heading',
        'title'  => __( 'Testimonial Section', 'halim' ),
        'icon'   => 'fas fa-star-half-alt',

        // begin: Fields
        'fields' => array(

            // begin: Testimonial Section
            array(
                'id'      => 'testi_sec_title',
                'type'    => 'text',
                'title'   => __( 'Testimonial Section Title', 'halim' ),
                'desc'    => __( 'Write Section Title Here.', 'halim' ),
                'default' => __( 'what client say', 'halim' ),
            ),
            array(
                'id'      => 'testi_sec_subtitle',
                'type'    => 'text',
                'title'   => __( 'Testimonial Section Subtitle', 'halim' ),
                'desc'    => __( 'Write Section Subtitle Here.', 'halim' ),
                'default' => __( 'who we are?', 'halim' ),
            ),
            array(
                'id'      => 'testi_sec_desc',
                'type'    => 'textarea',
                'title'   => __( 'Testimonial Section Description', 'halim' ),
                'before'  => __( 'Write Section Description Here.', 'halim' ),
                'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.', 'halim' ),
            ), // end: Testimonial Section
        ), // end: Fields
    ) ); // end: Testimonial Section Heading

    // Blog Section Heading
    CSF::createSection( $prefix, array(
        'parent' => 'section_heading',
        'title'  => __( 'Blog Section', 'halim' ),
        'icon'   => 'fas fa-blog',

        // begin: Fields
        'fields' => array(

            // begin: Blog Section
            array(
                'id'      => 'blog_sec_title',
                'type'    => 'text',
                'title'   => __( 'Blog Section Title', 'halim' ),
                'desc'    => __( 'Write Section Title Here.', 'halim' ),
                'default' => __( 'latest news', 'halim' ),
            ),
            array(
                'id'      => 'blog_sec_subtitle',
                'type'    => 'text',
                'title'   => __( 'Blog Section Subtitle', 'halim' ),
                'desc'    => __( 'Write Section Subtitle Here.', 'halim' ),
                'default' => __( 'who we are?', 'halim' ),
            ),
            array(
                'id'      => 'blog_sec_desc',
                'type'    => 'textarea',
                'title'   => __( 'Blog Section Description', 'halim' ),
                'before'  => __( 'Write Section Description Here.', 'halim' ),
                'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.', 'halim' ),
            ), // end: Blog Section
        ), // end: Fields
    ) ); // end: Blog Section Heading

    // ----------------------------------------
    // About Options
    // ----------------------------------------
    CSF::createSection( $prefix, array(
        'id'    => 'about_options',
        'title' => __( 'About Options', 'halim' ),
        'icon'  => 'fas fa-address-card',
    ) ); // end: About Option

    // About Content
    CSF::createSection( $prefix, array(
        'parent' => 'about_options',
        'title'  => __( 'About Content', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // begin: About Section
            array(
                'id'      => 'about_content_title',
                'type'    => 'text',
                'title'   => __( 'About Content Title', 'halim' ),
                'desc'    => __( 'Write Content Title Here.', 'halim' ),
                'default' => __( 'Welcome To Halim', 'halim' ),
            ),
            array(
                'id'       => 'about_content_text',
                'type'     => 'textarea',
                'title'    => __( 'About Content Text', 'halim' ),
                'subtitle' => __( 'Write About Content Text Here.', 'halim' ),
                'default'  => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda distinctio maxime laborum delectus aliquam ipsum itaque voluptatem non reiciendis aliquid totam facere, tempora iure iusto adipisci doloremque in, amet, alias nostrum.', 'halim' ),
            ),
            array(
                'id'           => 'about_content_btn',
                'type'         => 'group',
                'title'        => __( 'About Content Button', 'halim' ),
                'desc'         => __( 'Add About Content Button Here.', 'halim' ),
                'button_title' => __( 'Add New Button', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'button_text',
                        'type'  => 'text',
                        'title' => __( 'Button Text', 'halim' ),
                    ),
                    array(
                        'id'    => 'button_link',
                        'type'  => 'text',
                        'title' => __( 'Button Link', 'halim' ),
                    ),
                ),
                'default'      => array(
                    array(
                        'button_text' => __( 'read more', 'halim' ),
                        'button_link' => '#',
                    ),
                ),
            ), // end: About Section
        ), // end: Fields
    ) ); // end: About Content

    // About Features
    CSF::createSection( $prefix, array(
        'parent' => 'about_options',
        'title'  => __( 'About Features', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // begin: About Feature
            array(
                'id'           => 'about_features',
                'type'         => 'group',
                'title'        => __( 'About Feature', 'halim' ),
                'subtitle'     => __( 'Add About Feature Here.', 'halim' ),
                'button_title' => __( 'Add New Feature', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'feature_title',
                        'type'  => 'text',
                        'title' => __( 'Feature Title', 'halim' ),
                    ),
                    array(
                        'id'    => 'feature_desc',
                        'type'  => 'textarea',
                        'title' => __( 'Feature Description', 'halim' ),
                    ),
                    array(
                        'id'    => 'feature_icon',
                        'type'  => 'icon',
                        'title' => __( 'Feature Icon', 'halim' ),
                    ),
                ),
                'default'      => array(
                    array(
                        'feature_title' => __( 'Our Mission', 'halim' ),
                        'feature_icon'  => 'fas fa-laptop',
                        'feature_desc'  => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry', 'halim' ),
                    ),
                    array(
                        'feature_title' => __( 'Our Vission', 'halim' ),
                        'feature_icon'  => 'fas fa-user',
                        'feature_desc'  => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry', 'halim' ),
                    ),
                    array(
                        'feature_title' => __( 'Our History', 'halim' ),
                        'feature_icon'  => 'fas fa-pencil-alt',
                        'feature_desc'  => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry', 'halim' ),
                    ),
                ),
            ), // end: About Feature
        ), // end: Fields
    ) ); // end: About Features

    // Accordions
    CSF::createSection( $prefix, array(
        'parent' => 'about_options',
        'title'  => __( 'Accordions', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // begin: Accordion
            array(
                'id'      => 'accordion_title',
                'type'    => 'text',
                'title'   => __( 'Accordion Title', 'halim' ),
                'desc'    => __( 'Accordion Title Here.', 'halim' ),
                'default' => __( 'FAQs', 'halim' ),
            ),
            array(
                'id'           => 'accordion_list',
                'type'         => 'group',
                'title'        => __( 'Accordion List', 'halim' ),
                'subtitle'     => __( 'Add Accordion Here.', 'halim' ),
                'button_title' => __( 'Add New FAQ', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'faq_title',
                        'type'  => 'text',
                        'title' => __( 'FAQ Title', 'halim' ),
                    ),
                    array(
                        'id'    => 'faq_desc',
                        'type'  => 'textarea',
                        'title' => __( 'FAQ Description', 'halim' ),
                    ),
                ),
                'default'      => array(
                    array(
                        'faq_title' => __( 'FAQ Title 1', 'halim' ),
                        'faq_desc'  => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry', 'halim' ),
                    ),
                    array(
                        'faq_title' => __( 'FAQ Title 2', 'halim' ),
                        'faq_desc'  => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry', 'halim' ),
                    ),
                    array(
                        'faq_title' => __( 'FAQ Title 3', 'halim' ),
                        'faq_desc'  => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry', 'halim' ),
                    ),
                    array(
                        'faq_title' => __( 'FAQ Title 4', 'halim' ),
                        'faq_desc'  => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry', 'halim' ),
                    ),
                    array(
                        'faq_title' => __( 'FAQ Title 4', 'halim' ),
                        'faq_desc'  => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry', 'halim' ),
                    ),
                ),
            ), // end: Accordion
        ), // end: Fields
    ) ); // end: Accordions

    // Skills
    CSF::createSection( $prefix, array(
        'parent' => 'about_options',
        'title'  => __( 'Skills', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // begin: Accordion
            array(
                'id'      => 'skills_title',
                'type'    => 'text',
                'title'   => __( 'Skills Title', 'halim' ),
                'desc'    => __( 'Skills Title Here.', 'halim' ),
                'default' => __( 'Our Skills', 'halim' ),
            ),
            array(
                'id'           => 'skills_list',
                'type'         => 'group',
                'title'        => __( 'Skills List', 'halim' ),
                'subtitle'     => __( 'Add Skills Here.', 'halim' ),
                'button_title' => __( 'Add New Skill', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'skill_title',
                        'type'  => 'text',
                        'title' => __( 'Skill Title', 'halim' ),
                    ),
                    array(
                        'id'    => 'skill_progress',
                        'type'  => 'text',
                        'title' => __( 'Skill Progress', 'halim' ),
                    ),
                ),
                'default'      => array(
                    array(
                        'skill_title'    => __( 'Html', 'halim' ),
                        'skill_progress' => __( '90', 'halim' ),
                    ),
                    array(
                        'skill_title'    => __( 'Css', 'halim' ),
                        'skill_progress' => __( '80', 'halim' ),
                    ),
                    array(
                        'skill_title'    => __( 'WordPress', 'halim' ),
                        'skill_progress' => __( '85', 'halim' ),
                    ),
                    array(
                        'skill_title'    => __( 'Photoshop', 'halim' ),
                        'skill_progress' => __( '70', 'halim' ),
                    ),
                ),
            ), // end: Accordion
        ), // end: Fields
    ) ); // end: Skills

    // ----------------------------------------
    // Contact Theme Options
    // ----------------------------------------
    CSF::createSection( $prefix, array(
        'id'    => 'contact_options',
        'title' => __( 'Contact Options', 'halim' ),
        'icon'  => 'fas fa-id-card',
    ) ); // end: Contact Theme Option

    // Contact Info Area
    CSF::createSection( $prefix, array(
        'parent' => 'contact_options',
        'title'  => __( 'Contact Information', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // Contact Info
            array(
                'id'           => 'contact_info',
                'type'         => 'group',
                'title'        => __( 'Contact Info', 'halim' ),
                'subtitle'     => __( 'Add Contact Info Here.', 'halim' ),
                'button_title' => __( 'Add New Contact', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'info_title',
                        'type'  => 'text',
                        'title' => __( 'Info Title', 'halim' ),
                    ),
                    array(
                        'id'    => 'info_icon',
                        'type'  => 'icon',
                        'title' => __( 'Info Icon', 'halim' ),
                    ),
                    array(
                        'id'    => 'info_details',
                        'type'  => 'text',
                        'title' => __( 'Info Details', 'halim' ),
                    ),
                ),
                'default'      => array(
                    array(
                        'info_title'   => __( 'Address', 'halim' ),
                        'info_icon'    => 'fas fa-map-marker-alt',
                        'info_details' => __( '451/2 Rampura, Dhaka-1219', 'halim' ),
                    ),
                    array(
                        'info_title'   => __( 'Phone', 'halim' ),
                        'info_icon'    => 'fas fa-phone',
                        'info_details' => __( '+8801 2345 6789', 'halim' ),
                    ),
                    array(
                        'info_title'   => __( 'Email', 'halim' ),
                        'info_icon'    => 'fas fa-envelope',
                        'info_details' => __( 'Info@Website.Com', 'halim' ),
                    ),
                ),
            ), // end: contact info
        ), // end: Fields
    ) ); // end: Contact Info Area

    // Contact Map
    CSF::createSection( $prefix, array(
        'parent' => 'contact_options',
        'title'  => __( 'Contact Map', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // being: Fields
        'fields' => array(

            // Contact Map
            array(
                'id'       => 'contact_map',
                'type'     => 'map',
                'title'    => __( 'Contact Map', 'halim' ),
                'subtitle' => __( 'Search and save the location.', 'halim' ),
                'default'  => array(
                    'latitude'  => '23.768518049999997',
                    'longitude' => '90.42564111722365',
                    'zoom'      => '16',
                ),
            ),
        ),

    ) ); // end: Contact Map

    // ----------------------------------------
    // Counter Theme Options
    // ----------------------------------------
    CSF::createSection( $prefix, array(
        'id'    => 'counter_options',
        'title' => __( 'Counter Options', 'halim' ),
        'icon'  => 'fas fa-bars',
    ) ); // end: Counter Theme Option

    // Counter Area
    CSF::createSection( $prefix, array(
        'parent' => 'counter_options',
        'title'  => __( 'Counter Section', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // Single Counter
            array(
                'id'           => 'counter_lists',
                'type'         => 'group',
                'title'        => __( 'Counter List', 'halim' ),
                'subtitle'     => __( 'Add Skills Counter.', 'halim' ),
                'button_title' => __( 'Add New Counter', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'counter_title',
                        'type'  => 'text',
                        'title' => __( 'Counter Title', 'halim' ),
                    ),
                    array(
                        'id'    => 'counter_number',
                        'type'  => 'number',
                        'title' => __( 'Counter Number', 'halim' ),
                    ),
                    array(
                        'id'    => 'counter_icon',
                        'type'  => 'icon',
                        'title' => __( 'Counter Icon', 'halim' ),
                    ),
                ),
                'default'      => array(
                    array(
                        'counter_title'  => __( 'Customers', 'halim' ),
                        'counter_number' => __( '567', 'halim' ),
                        'counter_icon'   => 'fas fa-user-alt',
                    ),
                    array(
                        'counter_title'  => __( 'Line Of Code', 'halim' ),
                        'counter_number' => __( '236', 'halim' ),
                        'counter_icon'   => 'fas fa-code',
                    ),
                    array(
                        'counter_title'  => __( 'Users', 'halim' ),
                        'counter_number' => __( '789', 'halim' ),
                        'counter_icon'   => 'fas fa-users',
                    ),
                    array(
                        'counter_title'  => __( 'Cup Of Coffees', 'halim' ),
                        'counter_number' => __( '1389', 'halim' ),
                        'counter_icon'   => 'fas fa-coffee',
                    ),
                ),
            ), // end: Single Counter
        ), // end: Fields
    ) ); // end: Counter Area

    // ----------------------------------------
    // CTA Theme Options
    // ----------------------------------------
    CSF::createSection( $prefix, array(
        'id'    => 'cta_options',
        'title' => __( 'CTA Options', 'halim' ),
        'icon'  => 'fas fa-bars',
    ) ); // end: CTA Theme Option

    // CTA Section
    CSF::createSection( $prefix, array(
        'parent' => 'cta_options',
        'title'  => __( 'CTA Section', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // begin: CTA Section
            array(
                'id'      => 'cta_title',
                'type'    => 'text',
                'title'   => __( 'CTA Section Title', 'halim' ),
                'desc'    => __( 'Write Section Title Here.', 'halim' ),
                'default' => __( 'Best Solution For Your Business', 'halim' ),
            ),
            array(
                'id'      => 'cta_subtitle',
                'type'    => 'textarea',
                'title'   => __( 'CTA Section Subtitle', 'halim' ),
                'desc'    => __( 'Write Section Subtitle Here.', 'halim' ),
                'default' => __( 'The Can Be Used On Larger Scale Projectss As Well As Small Scale Projectss', 'halim' ),
            ),
            array(
                'id'           => 'cta_btn',
                'type'         => 'group',
                'button_title' => __( 'Add New Button', 'halim' ),
                'title'        => __( 'CTA Button', 'halim' ),
                'desc'         => __( 'Add CTA button here.', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'btn_text',
                        'type'  => 'text',
                        'title' => __( 'Button Text', 'halim' ),
                    ),
                    array(
                        'id'    => 'btn_link',
                        'type'  => 'text',
                        'title' => __( 'Button Link', 'halim' ),
                    ),
                ),
                'default'      => array(
                    array(
                        'btn_text' => 'contact us',
                        'btn_link' => '#',
                    ),
                ),
            ), // end: CTA Section
        ), // end: Fields
    ) ); // end: CTA Section

    // ----------------------------------------
    // Footer Theme Options
    // ----------------------------------------
    CSF::createSection( $prefix, array(
        'id'    => 'footer_options',
        'title' => __( 'Footer Options', 'halim' ),
        'icon'  => 'fas fa-bars',
    ) ); // end: Footer Theme Option

    // Footer Section
    CSF::createSection( $prefix, array(
        'parent' => 'footer_options',
        'title'  => __( 'Footer Section', 'halim' ),
        'icon'   => 'fas fa-arrow-circle-right',

        // begin: Fields
        'fields' => array(

            // begin: Footer Section
            array(
                'id'      => 'copyright_text',
                'type'    => 'text',
                'title'   => __( 'Copyright Text', 'halim' ),
                'desc'    => __( 'Write Copyright Text Here.', 'halim' ),
                'default' => __( 'All Rights Reserved 2020', 'halim' ),
            ),
            array(
                'id'           => 'footer_socials',
                'type'         => 'group',
                'button_title' => __( 'Add New Link', 'halim' ),
                'title'        => __( 'Footer Social Link', 'halim' ),
                'desc'         => __( 'Add Social Link here.', 'halim' ),
                'fields'       => array(
                    array(
                        'id'    => 'fsocial_text',
                        'type'  => 'text',
                        'title' => __( 'Social Text', 'halim' ),
                    ),
                    array(
                        'id'    => 'fsocial_icon',
                        'type'  => 'icon',
                        'title' => __( 'Social Icon', 'halim' ),
                    ),
                    array(
                        'id'    => 'fsocial_link',
                        'type'  => 'text',
                        'title' => __( 'Social Link', 'halim' ),
                    ),
                    array(
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'title'   => __( 'Link Target', 'halim' ),
                        'default' => '_blank',
                        'options' => array(
                            '_self'  => __( 'Open in Same Tab', 'halim' ),
                            '_blank' => __( 'Open in New Tab', 'halim' ),
                        ),
                    ),
                ),
                'default'      => array(
                    array(
                        'fsocial_text' => __( 'Facebook', 'halim' ),
                        'fsocial_link' => '#',
                        'fsocial_icon' => 'fab fa-facebook-f',
                    ),
                    array(
                        'fsocial_text' => __( 'Instagram', 'halim' ),
                        'fsocial_link' => '#',
                        'fsocial_icon' => 'fab fa-instagram',
                    ),
                    array(
                        'fsocial_text' => __( 'Twitter', 'halim' ),
                        'fsocial_link' => '#',
                        'fsocial_icon' => 'fab fa-twitter',
                    ),
                    array(
                        'fsocial_text' => __( 'Linkedin', 'halim' ),
                        'fsocial_link' => '#',
                        'fsocial_icon' => 'fab fa-linkedin-in',
                    ),
                    array(
                        'fsocial_text' => __( 'Google+', 'halim' ),
                        'fsocial_link' => '#',
                        'fsocial_icon' => 'fab fa-google-plus-g',
                    ),
                ),
            ), // end: Footer Section
        ), // end: Fields
    ) ); // end: Footer Section

}