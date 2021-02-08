<?php
    $options = get_option( 'halim_options' );
    $cta_btn = $options['cta_btn'];
    if ( $options['cta_title'] ):
        if ( !is_page( 19 ) ):

    ?>

	      <!-- CTA Area Start -->
	      <section class="cta">
	         <div class="container">
	            <div class="row">
	               <div class="col-md-6">
	                  <h4><?php echo $options['cta_title']; ?> <span><?php echo $options['cta_subtitle']; ?></span></h4>
	               </div>
	               <?php if ( $cta_btn ): foreach ( $cta_btn as $btn ): ?>
		                     <div class="col-md-6 text-center">
		                        <a href="<?php echo esc_url( $btn['btn_link'] ); ?>" class="box-btn"><?php echo $btn['btn_text']; ?> <i class="fa fa-angle-double-right"></i></a>
		                     </div>
		               <?php endforeach;
                       endif;?>
            </div>
         </div>
      </section>
<?php endif;
endif;?>
<!-- CTA Area End -->

<!-- Footer Area End -->
<footer class="footer-area pt-50 pb-50">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <div class="single-footer footer-logo">
               <?php dynamic_sidebar( 'footer_one' );?>
            </div>
         </div>
         <div class="col-lg-2 col-md-6">
            <?php dynamic_sidebar( 'footer_two' );?>
         </div>
         <div class="col-lg-4 col-md-6">
            <?php dynamic_sidebar( 'footer_three' );?>
         </div>
         <div class="col-lg-3 col-md-6">
            <?php dynamic_sidebar( 'footer_four' );?>
         </div>
      </div>
      <div class="row copyright">
         <div class="col-md-6">
            <p>&copy;                      <?php echo $options['copyright_text']; ?> </p>
         </div>
         <div class="col-md-6 text-right">
            <ul>
               <?php
                   $footer_socials = $options['footer_socials'];
                   if ( $footer_socials ):
                       foreach ( $footer_socials as $footer_social ):
                   ?>
	                     <li>
	                        <?php if ( $footer_social['fsocial_link'] ): ?>
	                           <a href="<?php echo esc_url( $footer_social['fsocial_link'] ); ?>" target="<?php echo esc_attr( $footer_social['link_target'] ); ?>">
	                           <?php endif;?>
                           <i class="<?php echo esc_attr( $footer_social['fsocial_icon'] ); ?>"></i></a>
                     </li>
               <?php endforeach;
               endif;?>
            </ul>
         </div>
      </div>
   </div>
</footer>
<!-- Footer Area End -->
<?php wp_footer();?>
</body>

</html>