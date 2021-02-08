<section class="breadcumb-area">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="breadcumb">

					<?php while ( have_posts() ): the_post();?>

								<h4><?php the_title();?></h4>

								<ul>

									<li><a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'home', 'halim' )?></a></li> /

									<li><?php the_title();?></li>

								</ul>

							<?php endwhile;?>

				</div>
			</div>
		</div>
	</div>
</section>