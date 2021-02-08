<!DOCTYPE html>
<html                     <?php language_attributes();?>>

<head>

   <meta charset="<?php bloginfo( 'charset' );?>" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="profile" href="https://gmpg.org/xfn/11" />
   <?php wp_head();?>
</head>

<?php
    $options                = get_option( 'halim_options' );
    $enable_top_header_area = $options['enable_top_header_area'];
    $enable_social_area     = $options['enable_social_area'];
    $header_links           = $options['header_links'];
    $socials                = $options['socials'];
?>

<body                     <?php body_class();?>>
   <?php wp_body_open();?>
<?php if ( $enable_top_header_area == true ): ?>
      <section class="header-top">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-12">
                  <div class="header-left">
                     <?php if ( !empty( $header_links ) ): foreach ( $header_links as $link ): ?>
<?php if ( !empty( $link['link'] ) ): ?>
				                              <a href="<?php echo esc_url( $link['link'] ); ?>" target="<?php echo esc_attr( $link['link_target'] ); ?>">
				                              <?php endif;?>
                              <i class="<?php echo esc_attr( $link['icon'] ); ?>"></i>
                              <?php echo $link['link_text']; ?></a>
                        <?php endforeach;
                        endif;?>
                  </div>
               </div>
               <div class="col-md-6 col-sm-12 text-right">
                  <?php if ( $enable_social_area == true ): ?>
                     <div class="header-social">
                        <?php if ( !empty( $socials ) ): foreach ( $socials as $social ): ?>
				                              <a href="<?php echo esc_url( $social['link'] ); ?>" target="<?php echo esc_attr( $social['link_target'] ); ?>">
				                                 <i class="<?php echo esc_attr( $social['icon'] ) ?>"></i></a>
				                        <?php endforeach;
                                        endif;?>
                     </div>
                  <?php endif;?>
               </div>
            </div>
         </div>
      </section>
   <?php endif;?>
   <!-- Header Area Start -->
   <header class="header header-fixed">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <nav class="navbar navbar-expand-md navbar-light">

                  <?php
                      $custom_logo_id = get_theme_mod( 'custom_logo' );
                      $image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                  ?>

                  <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?> ">
                     <?php if ( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url( $image[0] ); ?>" alt="">
                        <?php else: ?><?php esc_html_e( 'Halim', 'halim' )?>
<?php endif;?>
</a>

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse ml-auto mainmenu justify-content-end" id="navbarNav">
                     <?php
                         wp_nav_menu(
                             array(
                                 'theme_location' => 'main-menu',
                                 'menu_class'     => 'navbar-nav ml-auto',
                             )
                         );
                     ?>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </header>
   <!-- Header Area Start -->