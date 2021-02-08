<?php get_header();?>
<section class="breadcumb-area">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="breadcumb">
					<h4><?php esc_html_e( '404 Not Found', 'halim' );?></h4>
					<ul>
						<li><a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'halim' );?></a></li> /
						<li><?php esc_html_e( '404 Page', 'halim' );?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="page-404 pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-xl-8">
				<div class="page-404-content">
					<h4><?php esc_html_e( 'Page Not Found', 'halim' );?></h4>
					<p><?php esc_html_e( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, voluptates.', 'halim' );?></p>
				</div>
			</div>
			<div class="col-xl-4">
				<?php dynamic_sidebar( 'main_sidebar' );?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();?>