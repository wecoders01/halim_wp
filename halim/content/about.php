<?php
    $options        = get_option( 'halim_options' );
    $about_btn      = $options['about_content_btn'];
    $about_features = $options['about_features'];
?>

<div class="row">
   <div class="col-md-7">
      <div class="about">
         <div class="page-title">
            <h4><?php echo $options['about_content_title']; ?></h4>
         </div>
         <p><?php echo $options['about_content_text']; ?></p>
         <?php if ( $about_btn ): foreach ( $about_btn as $btn ): ?>
			               <a href="<?php echo esc_url( $btn['button_link'] ); ?>" class="box-btn"><?php echo $btn['button_text']; ?> <i class="fa fa-angle-double-right"></i></a>
			         <?php endforeach;
                     endif;?>
      </div>
   </div>
   <div class="col-md-5">
      <?php if ( $about_features ): foreach ( $about_features as $feature ): ?>
			            <div class="single_about">
			               <i class="<?php echo esc_attr( $feature['feature_icon'] ); ?>"></i>
			               <h4><?php echo $feature['feature_title']; ?></h4>
			               <p><?php echo $feature['feature_desc']; ?></p>
			            </div>
			      <?php endforeach;
                  endif;?>
   </div>
</div>