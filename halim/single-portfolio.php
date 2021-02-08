<?php
    get_header();
    get_template_part( 'content/breadcrumb' );
?>

<section class="portfolio-single pt-100 pb-100">
   <div class="container">
      <div class="row">
         <?php while ( have_posts() ): the_post();?>
				            <div class="col-xl-8">
				               <h2><?php the_title();?></h2>
				               <?php the_post_thumbnail();?>
<?php the_content();?>
				            </div>
				         <?php endwhile;?>
         <div class="col-xl-4">
            <div class="portfolio-sidebar">
               <?php
                   $technology_lists = get_field( 'technology_used' );
               ?>
<?php if ( $technology_lists ): ?>
                  <h4><?php esc_html_e( 'technology used', 'halim' )?></h4>
                  <ul>
                     <?php foreach ( $technology_lists as $technology_list ): ?>
                        <li><i class="fa fa-arrow-right"></i><?php echo $technology_list; ?></li>
                     <?php endforeach;?>
                  </ul>
               <?php endif;?>
            </div>
            <div class="portfolio-sidebar">
               <?php
                   $project_features = get_field( 'project_features' );
               ?>
<?php if ( $project_features ): ?>
                  <h4><?php esc_html_e( 'project features', 'halim' )?></h4>
                  <ul>
                     <?php foreach ( $project_features as $project_feature ): ?>
                        <li><i class="fa fa-arrow-right"></i><?php echo $project_feature; ?></li>
                     <?php endforeach;?>
                  </ul>
               <?php endif;?>
            </div>
         </div>
      </div>
   </div>
</section>
<?php get_footer();?>