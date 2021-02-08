<?php
    /*
    Template Name: Gallery Template
     */
    get_header();
?>
<?php get_template_part( 'content/breadcrumb' );?>

<section class="gallery-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <?php
                $args = array(
                    'post_type'      => 'gallery',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                );
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ): $loop->the_post();
                ?>

	                <?php
                            $gallery_thumbnail = get_field( 'gallery_thumbnail' );
                            $gallery_popup     = get_field( 'gallery_popup' );
                        ?>

	                <div class="col-xl-4">
	                    <div class="single-gallery">
	                        <img src="<?php echo esc_url( $gallery_thumbnail['url'] ); ?>" alt="Gallery">
	                        <div class="gallery-hover">
	                            <div class="gallery-content">
	                                <h3><a href="<?php echo esc_url( $gallery_popup['url'] ); ?>" class="gallery"><i class="fa fa-plus"></i><?php the_title();?></a></h3>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            <?php endwhile;
                wp_reset_postdata();?>

        </div>
    </div>
</section>
<?php get_footer();?>