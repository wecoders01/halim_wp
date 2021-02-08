<?php
    /*
    Template Name: Contact Template
     */
    get_header();
    $options       = get_option( 'halim_options' );
    $contact_infos = $options['contact_info'];
    $contact_map   = $options['contact_map'];
?>
<?php get_template_part( 'content/breadcrumb' );?>

<!-- Contact Us Area End -->
<section class="contact-area pb-100 pt-100" id="contact">
   <div class="container">
      <div class="row">
         <div class="col-md-10 mx-auto">
            <div class="row text-center">
               <?php
                   if ( $contact_infos ):
                       foreach ( $contact_infos as $contact_info ):
                   ?>
	               <div class="col-md-4">
	                  <div class="contact-address">
	                     <i class="<?php echo esc_attr( $contact_info['info_icon'] ); ?>"></i>
	                     <h4><?php echo $contact_info['info_title']; ?> <span><?php echo $contact_info['info_details']; ?></span></h4>
	                  </div>
	               </div>
	         <?php endforeach;
             endif;?>

            </div>
            <div class="row">
               <div class="col-md-7">
                  <div class="contact-form">
                     <?php the_content();?>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="google-map">
                     <iframe src="https://maps.google.com/maps?q=<?php echo $contact_map['latitude']; ?>,<?php echo $contact_map['longitude']; ?>&hl=es;z=<?php echo $contact_map['zoom']; ?>&amp;output=embed"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Contact Us Area End -->
<?php get_footer();?>