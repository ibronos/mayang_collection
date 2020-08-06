<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
// do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$data = $product->get_data();
$image_id = $product->get_image_id();
$gallery_ids = $product->get_gallery_image_ids();
$frontpage_id = get_option( 'page_on_front' );
$soc_med = get_field("social_media", $frontpage_id);
$wishlist = get_permalink(get_the_ID()).'?add_to_wishlist='.get_the_ID();
$cart = get_permalink(get_the_ID()).'?add-to-cart='.get_the_ID();
$perawatan = $data['short_description'];
$stock_status = $data['stock_status'];

$attr_warna = get_the_terms( get_the_ID() , 'pa_warna' );
$attr_ukuran =  get_the_terms( get_the_ID() , "pa_ukuran");
$attr_outlet =  get_the_terms( get_the_ID() , "pa_outlet");

$related_args = array(
	'post_status' => 'publish',
    'posts_per_page' => 4, 
    'order' => 'DESC', 
    'post__not_in' => array( get_the_ID() )
);
$related = wc_get_products( $product_args );
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?> style="margin-top: 8%;">
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					// do_action( 'woocommerce_before_single_product_summary' );

					?>
					<ul class="list-group">

						  <?php if( !empty($image_id ) ) { ?>
						  <li class="list-group-item">
						  	<img class="img-fluid" src="<?= wp_get_attachment_url($image_id, 'full'); ?>">
						  </li>
						  <?php }  ?>

  						  <?php 
  						  if( !empty( $gallery_ids ) ) {
  						  	foreach ($gallery_ids as $key) {
  						  ?>
							  <li class="list-group-item">
							  	<img class="img-fluid" src="<?= wp_get_attachment_url($key, 'full'); ?>">
							  </li>
						  <?php } }  ?>

					</ul>


					</div>
					<div class="col-md-6">
						<div class="summary entry-summary" id="single-product-summary">
							<?php
							/**
							 * Hook: woocommerce_single_product_summary.
							 *
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked woocommerce_template_single_rating - 10
							 * @hooked woocommerce_template_single_price - 10
							 * @hooked woocommerce_template_single_excerpt - 20
							 * @hooked woocommerce_template_single_add_to_cart - 30
							 * @hooked woocommerce_template_single_meta - 40
							 * @hooked woocommerce_template_single_sharing - 50
							 * @hooked WC_Structured_Data::generate_product_data() - 60
							 */
							// do_action( 'woocommerce_single_product_summary' );

							?>
							<div class="card">
							  <div class="card-body">

							    <h5 class="card-title"><?= $data['name']; ?></h5>
							    <div class="d-flex justify-content-end">
			    		    		<?php if( !empty( $data['sale_price'] ) ) { ?>
						 				<s style=" position:absolute; bottom:90%; font-size: 10px; "> Rp. <?= $data['regular_price'] ; ?> </s>
									<?php } ?>
							    	<h5> Rp. <?= $data['price']; ?></h5>
							    </div>

							    <div class="card border-0" id="single-product-warna">
							    	<div class="card-header bg-white border-0 pt-0 pb-0">
							    		Warna
							    	</div>
							    	<div class="card-body pt-0 pb-0">
							    		<div class="btn-group btn-group-toggle" data-toggle="buttons">
							    			<?php
							    			if ( $attr_warna && !empty($attr_warna) ) {	
								    			foreach ( $attr_warna as $key ) {
													$hex = get_field("kode_warna", $key->taxonomy . '_' . $key->term_id );
													$checked = $key == 0 ? 'checked' : '';
							    			?>
											  <label class="btn btn-lg" style="background-color: <?= $hex; ?> ;">
										    		<input type="radio" name="kode_warna" id="kode_warna_<?= $key->term_id; ?>" autocomplete="off" <?= $checked; ?>>
										  	  </label>
											<?php } } ?>
										</div>
							    	</div>
							    </div>

							    <div class="card border-0" id="single-product-size">
							    	<div class="card-header bg-white collapsed" data-toggle="collapse" data-target="#single-product-size-body" aria-expanded="false" aria-controls="single-product-size-body">
							    		<div class="d-flex justify-content-between">
										    <div class="">Size</div>
										    <div class=""><i class="fa fa-caret-down" aria-hidden="true"></i></div>
										  </div>
							    	</div>
							    	<div class="card-body collapse" id="single-product-size-body">
							    		
						    			<?php
						    			if ( $attr_ukuran && !empty( $attr_ukuran ) ) {	
							    			foreach ( $attr_ukuran as $key ) {
						    			?>
						    			<div class="form-check">
										  <label class="form-check-label">
										    <input type="radio" class="form-check-input" name="size" value="<?= $key->term_id; ?>">
										    <?= $key->name; ?>
										  </label>
										</div>
										<?php } } ?>
										
							    	</div>
							    </div>

							    <div class="card border-0" id="single-product-ukuran">
							    	<div class="card-header bg-white collapsed" data-toggle="collapse" data-target="#single-product-ukuran-body" aria-expanded="false" aria-controls="single-product-ukuran-body">
							    		<div class="d-flex justify-content-between">
										    <div class="">Detail Ukuran</div>
										    <div class=""><i class="fa fa-caret-down" aria-hidden="true"></i></div>
										  </div>
							    	</div>
							    	<div class="card-body collapse" id="single-product-ukuran-body">
							    		<ul class="">
							    		   <?php
							    			if ( $attr_ukuran && !empty( $attr_ukuran ) ) {	
								    			foreach ( $attr_ukuran as $key ) {
							    		   ?>
										  <li class="">
										  	<p>
										  		<?php 
										  			echo $key->name;
										  			if (!empty($key->description)) {
										  				echo ' - '.$key->description;
										  			}
										  		?> 										  			
										  	</p>
										  </li>
										  <?php } } ?>
										</ul>
							    	</div>
							    </div>

							    <div class="card border-0" id="single-product-perawatan">
							    	<div class="card-header bg-white collapsed" data-toggle="collapse" data-target="#single-product-perawatan-body" aria-expanded="false" aria-controls="collapseExample">
							    		<div class="d-flex justify-content-between">
										    <div class="">Perawatan</div>
										    <div class=""><i class="fa fa-caret-down" aria-hidden="true"></i></div>
										  </div>
							    	</div>
							    	<div class="card-body collapse" id="single-product-perawatan-body">
							    		<p> <?= $perawatan; ?> </p>
							    	</div>
							    </div>

							    <div class="card border-0" id="single-product-outlet">
							    	<div class="card-header bg-white collapsed" data-toggle="collapse" data-target="#single-product-outlet-body" aria-expanded="false" aria-controls="collapseExample">
							    		<div class="d-flex justify-content-between">
										    <div class="">Tersedia di Outlet</div>
										    <div class=""><i class="fa fa-caret-down" aria-hidden="true"></i></div>
										  </div>
							    	</div>
							    	<div class="card-body collapse" id="single-product-outlet-body">
							    		<ul class="">
							    		   <?php
							    			if ( $attr_outlet && !empty( $attr_outlet ) ) {	
								    			foreach ( $attr_outlet as $key ) {
							    		   ?>
										  <li class="">
										  	<p><?= $key->name; ?></p>
										  </li>
										  <?php } } ?>
										</ul>
							    	</div>
							    </div>
							    	
							    <div class="d-flex justify-content-center mt-2">
							    	<?php if( $stock_status == 'outofstock') { ?>
								    	<button class="btn btn-secondary btn-sm btn-block"> Out of Stock </button>
									<?php } else { ?>
										<a href="<?= $cart; ?>" class="btn btn-primary btn-sm btn-block" id="single-product-cart">Beli Sekarang</a>
									<?php } ?>
						<!-- 		    <form class="cart w-100" action="<?= get_permalink(get_the_ID()); ?>" method="post" enctype="multipart/form-data">
										<button type="submit" name="add-to-cart" value="<?= get_the_ID(); ?>" class="btn btn-primary btn-sm btn-block single_add_to_cart_button button alt">
											Beli Sekarang
										</button>
									</form> -->
								</div>

							    <div class="d-flex justify-content-center mt-1">
								    <a href="<?= $wishlist; ?>">Add to Wishlist</a>
								</div>

								<button id="openNav" style="display: none;">Open</button>


							    <div class="card border-0" id="single-product-share">
							    	<div class="card-header bg-white border-0 p-0">
							    		Share
							    	</div>
							    	<div class="card-body p-0">
	    					            <ul class="list-unstyled text-small">
								              <li>
								              	<ul class="list-inline">
				   			              		 <?php if( !empty($soc_med['facebook']) ) {  ?>
												  <li class="list-inline-item">
												  	<a class="text-muted" href="<?= $soc_med['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i> </a>
												  </li>
												  <?php } ?>

												  <?php if( !empty($soc_med['twitter']) ) {  ?>
												  <li class="list-inline-item">
												  	<a class="text-muted" href="<?= $soc_med['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i> </a>
												  </li>
												   <?php } ?>

			   									  <?php if( !empty($soc_med['instagram']) ) {  ?>
												  <li class="list-inline-item">
												  	<a class="text-muted" href="<?= $soc_med['instagram']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i> </a>
												  </li>
												   <?php } ?>

			  									  <?php if( !empty($soc_med['youtube']) ) {  ?>
												  <li class="list-inline-item">
												  	<a class="text-muted" href="<?= $soc_med['youtube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i> </a>
												  </li>
												   <?php } ?>
												</ul>
								              </li>
						            	</ul>
							    	</div>
							    </div>
							  
							  </div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- related product -->
		<div class="card mt-5 border-0">
			<div id="carousel-katalog">
				<div class="card-body">
					<div class="row">
						<?php foreach($related as $key => $value) { 
							$data = $value->get_data();
							$image_id = $value->get_image_id();
							$image_url = wp_get_attachment_url($image_id, 'small');
						?>
						<?php if( $key <= 3 ) { ?>
						<div class="col-md-3">
							<a href="<?= $value->get_permalink(); ?>">
							  <div class="card img-fluid" style="width:500px">
							    <img class="card-img-top" src="<?= $image_url; ?>" alt="Card image" style="width:100%">
							    <div class="card-footer text-center">
							    	<?php echo $value->get_title(); ?>		
							    </div>
							  </div> 
							</a>
						</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>
		

		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		// do_action( 'woocommerce_after_single_product_summary' );
		?>

	</div>
</div>
<?php //do_action( 'woocommerce_after_single_product' ); ?>


<!-- sidenav -->
<div id="mySidenav" class="sidenav showSideNav">
  
  <div class="container">
	  <a href="javascript:void(0)" class="closebtn" id="closeNav">&times;</a>
	  <div class="card mt-5">
	  	<div class="card-header">
	  		Keranjang Belanja Anda
	  	</div>
	  	<div class="card-body">
	  		<?php wc_get_template( 'checkout/list-barang.php' ); ?>
	  	</div>
	  	<div class="card-footer">
	  		<a href="" class="btn btn-info">Pembayaran</a>
	  	</div>
	  </div>
  </div>
</div>