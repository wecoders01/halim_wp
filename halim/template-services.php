<?php
    /*
    Template Name: Services Template
     */
    get_header();
?>

<?php get_template_part( 'content/breadcrumb' );?>
<!-- Services Area Start -->
<section class="services-area pt-100 pb-50" id="services">
   <div class="container">
      <div class="row">
         <?php get_template_part( 'content/services' );?>
      </div>
   </div>
</section>
<!-- Services Area End -->

<?php get_footer();?>