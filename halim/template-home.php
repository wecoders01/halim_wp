<?php
    /*
    Template Name: Home Template
     */
    get_header();
    $options = get_option( 'halim_options' );
?>
<!-- Slider Area Start -->
<section class="slider-area" id="home">
   <div class="slider owl-carousel">

      <!--
   Setup query to show the ‘slide’ post type with ‘3’ posts.
   Output the title with an excerpt.
-->
      <?php
          $args = array(
              'post_type'      => 'slide',
              'posts_per_page' => 3,
              'orderby'        => 'menu_order',
              'order'          => 'ASC',
          );
          $loop = new WP_Query( $args );

          while ( $loop->have_posts() ): $loop->the_post();
          ?>

			         <?php
                             $btn_link  = get_field( 'button_link' );
                             $btn_text  = get_field( 'button_text' );
                             $sub_title = get_field( 'sub_title' );
                         ?>
			         <div class="single-slide" style="background-image:url(<?php the_post_thumbnail_url( 'large' );?>)">
			            <div class="container">
			               <div class="row">
			                  <div class="col-xl-12">
			                     <div class="slide-table">
			                        <div class="slide-tablecell">
			                           <h4><?php echo $sub_title; ?></h4>
			                           <h2><?php the_title();?></h2>
			                           <?php the_content();?>
<?php if ( $btn_text ): ?>
			                              <a href="<?php echo esc_url( $btn_link ); ?>" class="box-btn"><?php echo $btn_text; ?> <i class="fa fa-angle-double-right"></i></a>
			                           <?php endif;?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <?php endwhile;
      wp_reset_postdata();?>
   </div>
</section>
<!-- Slider Area Start -->

<!-- About Area Start -->
<section class="about-area pt-100 pb-100" id="about">
   <div class="container">
      <?php if ( $options['about_sec_title'] ): ?>
         <div class="row section-title">
            <div class="col-md-6 text-right">
               <h3><span><?php echo $options['about_sec_subtitle']; ?></span><?php echo $options['about_sec_title']; ?></h3>
            </div>
            <div class="col-md-6">
               <p><?php echo $options['about_sec_desc']; ?></p>
            </div>
         </div>
      <?php endif;?>
<?php get_template_part( 'content/about' );?>
   </div>
</section>
<!-- About Area End -->
<!-- Choose Area End -->
<section class="choose">
   <div class="container">
      <div class="row pt-100 pb-100">
         <div class="col-md-6">
            <div class="faq">
               <div class="page-title">
                  <h4><?php echo $options['accordion_title']; ?></h4>
               </div>
               <div class="accordion" id="accordionExample">

                  <?php
                      $accordions = $options['accordion_list'];
                      $i          = 0;
                      if ( $accordions ):
                          foreach ( $accordions as $accordion ):
                              $i++;
                          ?>
						                        <div class="card">
						                           <div class="card-header" id="heading-<?php echo $i; ?>">
						                              <h5 class="mb-0">
						                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $i; ?>">
						                                    <?php echo $accordion['faq_title']; ?>
						                                 </button>
						                              </h5>
						                           </div>
						                           <div id="collapse-<?php echo $i; ?>" class="collapse<?php if ( $i == 1 ): echo ' show'?><?php endif;?>" aria-labelledby="heading-<?php echo $i; ?>" data-parent="#accordionExample">
						                              <div class="card-body">
						                                 <?php echo $accordion['faq_desc']; ?>
						                              </div>
						                           </div>
						                        </div>
						                  <?php endforeach;
                                          endif;?>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="skills">
               <div class="page-title">
                  <h4><?php echo $options['skills_title']; ?></h4>
               </div>
               <?php
                   $skills_list = $options['skills_list'];
                   if ( $skills_list ):
                       foreach ( $skills_list as $skill ):
                   ?>
			                     <div class="single-skill">
			                        <h4><?php echo $skill['skill_title']; ?></h4>
			                        <div class="progress-bar" role="progressbar" style="width:			                                                                                  		                                                                                  	                                                                                  						                                                                                  					                                                                                  				                                                                                  			                                                                                  		                                                                                  	                                                                                  	                                                                                  		                                                                                  	                                                                                  	                                                                                  	                                                                                  	                                                                                  			                                                                                  		                                                                                  	                                                                                  	                                                                                   <?php echo $skill['skill_progress'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $skill['skill_progress'] ?>%</div>
			                     </div>
			               <?php endforeach;
                           endif;?>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Choose Area End -->
<!-- Services Area Start -->
<section class="services-area pt-100 pb-50" id="services">
   <div class="container">
      <?php if ( $options['service_sec_title'] ): ?>
         <div class="row section-title">
            <div class="col-md-6 text-right">
               <h3><span><?php echo $options['service_sec_subtitle']; ?></span><?php echo $options['service_sec_title']; ?></h3>
            </div>
            <div class="col-md-6">
               <p><?php echo $options['service_sec_desc']; ?></p>
            </div>
         </div>
      <?php endif;?>
      <div class="row">
         <?php get_template_part( 'content/services' );?>
      </div>
   </div>
</section>
<!-- Services Area End -->

<!-- Counter Area End -->
<section class="counter-area">
   <div class="container-fluid">
      <div class="row">
         <?php
             $counter_lists = $options['counter_lists'];
             if ( $counter_lists ):
                 foreach ( $counter_lists as $counter_list ):
             ?>
			               <div class="col-md-3">
			                  <div class="single-counter">
			                     <h4><i class="<?php echo esc_attr( $counter_list['counter_icon'] ); ?>"></i><span class="counter"><?php echo $counter_list['counter_number']; ?></span><?php echo $counter_list['counter_title']; ?></span></h4>
			                  </div>
			               </div>
			         <?php endforeach;
                     endif;?>

      </div>
   </div>
</section>
<!-- Counter Area End -->
<!-- Team Area Start -->
<section class="team-area pb-100 pt-100" id="team">
   <div class="container">
      <?php if ( $options['team_sec_title'] ): ?>
         <div class="row section-title">
            <div class="col-md-6 text-right">
               <h3><span><?php echo $options['team_sec_subtitle']; ?></span><?php echo $options['team_sec_title']; ?></h3>
            </div>
            <div class="col-md-6">
               <p><?php echo $options['team_sec_desc']; ?></p>
            </div>
         </div>
      <?php endif;?>
      <div class="row">
         <?php
             $args = array(
                 'post_type'      => 'team',
                 'posts_per_page' => 3,
                 'orderby'        => 'menu_order',
                 'order'          => 'ASC',
             );
             $loop = new WP_Query( $args );

             while ( $loop->have_posts() ): $loop->the_post();
             ?>

			            <?php
                                $designation  = get_field( 'designation' );
                                $facebook_url = get_field( 'facebook_url' );
                                $twitter_url  = get_field( 'twitter_url' );
                                $linkedin_url = get_field( 'linkedin_url' );
                                $google_plus  = get_field( 'google_plus' );
                            ?>



			            <div class="col-md-4">
			               <div class="single-team">
			                  <?php the_post_thumbnail();?>
			                  <div class="team-hover">
			                     <div class="team-content">
			                        <h4><?php the_title();?> <span><?php echo $designation; ?></span></h4>
			                        <ul>
			                           <?php if ( $facebook_url ): ?>
			                              <li><a href="<?php echo esc_url( $facebook_url ) ?>"><i class="fab fa-facebook-f"></i></a></li>
			                           <?php endif;?>
<?php if ( $twitter_url ): ?>
                              <li><a href="<?php echo esc_url( $twitter_url ) ?>"><i class="fab fa-twitter"></i></a></li>
                           <?php endif;?>
<?php if ( $linkedin_url ): ?>
                              <li><a href="<?php echo esc_url( $linkedin_url ) ?>"><i class="fab fa-linkedin-in"></i></a></li>
                           <?php endif;?>
<?php if ( $google_plus ): ?>
                              <li><a href="<?php echo esc_url( $google_plus ) ?>"><i class="fab fa-google-plus-g"></i></a></li>
                           <?php endif;?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         <?php endwhile;
         wp_reset_postdata();?>

      </div>
   </div>
</section>
<!-- Team Area End -->

<!-- Testimonials Area Start -->
<section class="testimonial-area pb-100 pt-100" id="testimonials">
   <div class="container">
      <?php if ( $options['testi_sec_title'] ): ?>
         <div class="row section-title white-section">
            <div class="col-md-6 text-right">
               <h3><span><?php echo $options['testi_sec_subtitle']; ?></span><?php echo $options['testi_sec_title']; ?></h3>
            </div>
            <div class="col-md-6">
               <p><?php echo $options['testi_sec_desc']; ?></p>
            </div>
         </div>
      <?php endif;?>
   </div>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="testimonials owl-carousel">
               <?php
                   $args = array(
                       'post_type'      => 'testimonial',
                       'posts_per_page' => 6,
                       'orderby'        => 'menu_order',
                       'order'          => 'ASC',
                   );
                   $loop = new WP_Query( $args );

                   while ( $loop->have_posts() ): $loop->the_post();
                   ?>

			                  <?php
                                      $designation = get_field( 'designation' );
                                      $content     = get_field( 'content' );
                                  ?>


			                  <div class="single-testimonial">
			                     <div class="testi-img">
			                        <?php the_post_thumbnail();?>
			                     </div>
			                     <p>"<?php echo $content; ?>"</p>
			                     <h4><?php the_title();?><span><?php echo $designation; ?></span></h4>
			                  </div>
			               <?php endwhile;
                           wp_reset_postdata();?>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Testimonilas Area End -->
<!-- Latest News Area Start -->
<section class="blog-area pb-100 pt-100" id="blog">
   <div class="container">
      <?php if ( $options['blog_sec_title'] ): ?>
         <div class="row section-title">
            <div class="col-md-6 text-right">
               <h3><span><?php echo $options['blog_sec_subtitle']; ?></span><?php echo $options['blog_sec_title']; ?></h3>
            </div>
            <div class="col-md-6">
               <p><?php echo $options['blog_sec_desc']; ?></p>
            </div>
         </div>
      <?php endif;?>
      <div class="row">

         <?php
             $args = array(
                 'post_type'      => 'post',
                 'posts_per_page' => 3,
             );
             $loop = new WP_Query( $args );

             while ( $loop->have_posts() ): $loop->the_post();
             ?>

			            <div class="col-md-4">
			               <div class="single-blog">
			                  <?php the_post_thumbnail( 'large' );?>
			                  <div class="post-content">
			                     <div class="post-title">
			                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
			                     </div>
			                     <div class="pots-meta">
			                        <ul>
			                           <li><?php echo get_the_date(); ?></li>
			                           <li><?php echo get_the_author(); ?></li>
			                        </ul>
			                     </div>
			                     <?php echo get_excerpt( 150 ); ?>
			                     <a href="<?php the_permalink();?>" class="box-btn"><?php esc_html_e( 'read more', 'halim' )?> <i class="fa fa-angle-double-right"></i></a>
			                  </div>
			               </div>
			            </div>

			         <?php endwhile;
                     wp_reset_postdata();?>

      </div>
   </div>
</section>
<!-- Latest News Area End -->
<?php get_footer();?>