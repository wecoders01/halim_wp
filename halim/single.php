<?php get_header();?>



<?php get_template_part( 'content/breadcrumb' );?>

<section class="blog-single pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-xl-8">
				<?php while ( have_posts() ): the_post();?>
<?php get_template_part( 'content/content' );?>
<?php endwhile;?>
<?php wp_link_pages();?>
				<div class="comments">
					<?php
                        if (  ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) {
                            comments_template();
                        }
                    ?>
				</div>
			</div>
			<div class="col-xl-4">
				<?php dynamic_sidebar( 'main_sidebar' );?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();?>