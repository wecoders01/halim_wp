<?php
    /*
    Template Name: About Template
     */
    get_header();
?>
<?php get_template_part( 'content/breadcrumb' );?>

<!-- About Area Start -->
<section class="about-area pt-100 pb-100" id="about">
   <div class="container">
      <?php get_template_part( 'content/about' );?>
   </div>
</section>
<!-- About Area End -->

<?php get_footer();?>