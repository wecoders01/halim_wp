<?php
    $args = array(
        'post_type'      => 'service',
        'posts_per_page' => 6,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );
    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ): $loop->the_post();
    ?>

	    <?php
                $service_icon = get_field( 'service_icon' );
            ?>
	    <div class="col-lg-4 col-md-6">
	        <!-- Single Service -->
	        <div class="single-service">
	            <i class="<?php echo esc_attr( $service_icon ); ?>"></i>
	            <h4><?php the_title();?></h4>
	            <?php the_content();?>
	        </div>
	    </div>
	<?php endwhile;
    wp_reset_postdata();?>