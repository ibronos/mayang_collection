<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}


$data = $product->get_data();
$image_id = $product->get_image_id();
$image_url = wp_get_attachment_url($image_id, 'small');
$wishlist = get_permalink( wc_get_page_id( 'shop' ) ).'?add_to_wishlist=';
$link = $product->get_permalink();
$terms = get_the_terms( get_the_ID(), 'product_cat' );

?>

<div <?php wc_product_class( 'col-lg-4 col-md-6 mb-4 shop-page', $product ); ?> >
	<div class="card h-85">
	  <a href="<?= $link; ?>">
	  	<img class="card-img-top" src="<?= $image_url; ?>" alt="">
	  	<div class="card-img-overlay" style="top: 60%; ">
	  		<?php 
	  		foreach( $terms as $key => $value ) { 
	  			if( $value->slug == 'new-arrival' ) {
	  		?>
		  	<span class="badge badge-secondary">New</span>
			<?php } } ?>
		  	<?php if( !empty( $data['sale_price'] ) ) { ?>
		  	<span class="badge badge-info"><?= sale_percent( $data['sale_price'], $data['regular_price'] ).'%'; ?></span>
			<?php } ?>
	  	</div>
	  </a>
	  <div class="card-body border-bottom-0">
	    <h4 class="card-title">
	      <a href="<?= $link; ?>"><?= $data['name']; ?></a>
	    </h4>
	  </div>
	  <div class="card-footer bg-white pt-0 pb-0 border-top-0">
	    <div class="row">
	    	<div class="col-md-6">
	    		<a href="<?= $wishlist.$data['id']; ?>"><i class="fa fa-heart" aria-hidden="true"></i></a>
	    	</div>
	    	<div class="col-md-6">
	    		<?php if( !empty( $data['sale_price'] ) ) { ?>
	 				<s style=" position:absolute; bottom:90%; font-size: 10px; "> Rp. <?= $data['regular_price'] ; ?> </s>
				<?php } ?>
	    		<p>		    		
	    			Rp. <?= $data['price'] ; ?>
	    		</p>
	    	</div>
	    </div>



	  </div>
	</div>
</div>

	
