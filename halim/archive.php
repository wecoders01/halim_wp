<?php
    get_header();
?>
<section class="breadcumb-area">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="breadcumb">
					<h4><?php esc_html_e( the_archive_title(), 'halim' );?></h4>
					<ul>
						<li><a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'halim' )?></a></li> /
						<li><?php esc_html_e( the_archive_title(), 'halim' );?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog-area pb-100 pt-100" id="blog">
	<div class="container">
		<div class="row">

			<?php if ( have_posts() ): while ( have_posts() ): the_post();?>
											<div class="col-md-4">
												<div class="single-blog">
													<?php the_post_thumbnail( 'large' );?>
													<div class="post-content">
														<div class="post-title">
															<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
														</div>
														<div class="pots-meta">
															<ul>
																<li><?php the_category( ', ' );?></li>
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
                                        else: ?>

				<div class="col-md-12">
					<h3><?php esc_html_e( 'Post is Not Found', 'halim' )?></h3>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>
<!-- Latest News Area End -->

<?php
get_footer();
?>