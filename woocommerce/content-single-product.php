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
// var_dump($soc_med);
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
							    	<h5> Rp. <?= $data['price']; ?></h5>
							    </div>

							    <div class="card border-0" id="single-product-warna">
							    	<div class="card-header bg-white border-0 pt-0 pb-0">
							    		Warna
							    	</div>
							    	<div class="card-body pt-0 pb-0">
							    		<div class="btn-group" role="group" aria-label="Basic example">
										  <a type="button" class="btn btn-primary"></a>
										  <a type="button" class="btn btn-secondary"></a>
										  <a type="button" class="btn btn-danger"></a>
										  <a type="button" class="btn btn-secondary"></a>
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
							    		<ul>
							    			<li>asd</li>
							    			<li>asdas</li>
							    		</ul>
							    	</div>
							    </div>

							    <div class="card border-0" id="single-product-ukuran">
							    	<div class="card-header bg-white collapsed" data-toggle="collapse" data-target="#single-product-ukuran-body" aria-expanded="false" aria-controls="single-product-ukuran-body">
							    		<div class="d-flex justify-content-between">
										    <div class="">Ukuran</div>
										    <div class=""><i class="fa fa-caret-down" aria-hidden="true"></i></div>
										  </div>
							    	</div>
							    	<div class="card-body collapse" id="single-product-ukuran-body">
							    		<ul>
							    			<li>asd</li>
							    			<li>asdas</li>
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
							    		<ul>
							    			<li>asd</li>
							    			<li>asdas</li>
							    		</ul>
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
							    		<ul>
							    			<li>asd</li>
							    			<li>asdas</li>
							    		</ul>
							    	</div>
							    </div>
							    	
							    <div class="d-flex justify-content-center mt-2">
								    <button class="btn btn-secondary btn-sm btn-block">Beli Sekarang</button>
								</div>

							    <div class="d-flex justify-content-center mt-1">
								    <a href="">Add to Wishlist</a>
								</div>

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