<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
get_header();

$attr_warna = get_terms( 'pa_warna' );

function check_order( $val ) {
	$order = '';
	if ( $val == $_GET['orderby'] ) {
		$order = 'checked';	
	}
	echo $order;
}

function check_warna( $val ) {
	$warna = '';
	if ( $val == $_GET['filter_warna'] ) {
		$warna = 'button-shadow';	
	}
	echo $warna;
}

function check_range( $min, $max ) {
	$range = '';
	if ( $min == $_GET['min_price'] && $max == $_GET['max_price'] ) {
		$range = 'checked';	
	}
	echo $range;
}
 
?>
<div class="container" style="margin-top: 8%;">
    <div class="row">

	      <div class="col-lg-3">

	      	<form class="woocommerce-ordering" action="" method="get">
		      	<div class="card border-0">
		      		<div class="card-body">
		      			<div class="card-title">Sort By :</div>
						  <input type="radio" name="orderby" value="price" <?php check_order( 'price' ); ?> onchange="this.form.submit()" checked> Harga Terendah <br>
						  <input type="radio" name="orderby" value="price-desc" <?php check_order( 'price-desc' ); ?> onchange="this.form.submit()" > Harga Tertinggi <br>
						  <input type="radio" name="orderby" value="date" <?php check_order( 'date' ); ?> onchange="this.form.submit()" > New Arrival
		      		</div>
		      	</div>

		      	<div class="card mt-2 border-0">
		      		<div class="card-body">
			      		  <!-- <input type="radio" name="filter_warna" value="" checked> Semua <br> -->
			      		  <div class="card-title">Warna</div>
		  				   <div class="btn-group btn-group-toggle" data-toggle="buttons">
			    			<?php
			    			if ( $attr_warna && !empty($attr_warna) ) {	
				    			foreach ( $attr_warna as $key ) {
									$hex = get_field("kode_warna", $key->taxonomy . '_' . $key->term_id );
			    			?>
							  <label class="btn btn-lg <?php check_warna( $key->slug ); ?>" style="background-color: <?= $hex; ?> ;"  >
						    		<input type="radio" name="filter_warna" value="<?= $key->slug; ?>" id="filter_warna<?= $key->term_id; ?>" onchange="this.form.submit()">
						  	  </label>
							<?php } } ?>
						</div>

		      		</div>
		      	</div>
        		<input type="hidden" id="min_price" name="min_price" value="0">
			  	<input type="hidden" id="max_price" name="max_price" value="999999999999">
		      	<button type="submit" id="filter-submit" style="display:none;">Submit</button>
      		</form>

	      	<div class="card mt-2 border-0">
	      		<div class="card-body">
	      			<div class="card-title">Harga</div>
	      			<div class="price-range">
						<input type="radio" name="range" id="all" <?php check_range('0', '9999999999'); ?> > Tampilkan semua <br>
						<input type="radio" name="range" id="min_0" <?php check_range('0', '100000'); ?> > Dibawah 100.000 <br>
						<input type="radio" name="range" id="min_100" <?php check_range('100000', '149000'); ?> > 100.000 - 149.000 <br>
						<input type="radio" name="range" id="min_150" <?php check_range('150000', '199000'); ?> > 150.000 - 199.000 <br>
						<input type="radio" name="range" id="min_200" <?php check_range('200000', '249000'); ?> > 200.000 - 249.000 <br>
						<input type="radio" name="range" id="min_250" <?php check_range('250000', '349000'); ?> > 250.000 - 349.000 <br>
						<input type="radio" name="range" id="min_350" <?php check_range('350000', '499000'); ?> > 350.000 - 499.000 <br>
						<input type="radio" name="range" id="min_450" <?php check_range('450000', '999000'); ?> > 450.000 - 999.000 <br>
						<input type="radio" name="range" id="min_1000" <?php check_range('1000000', '9999999999999'); ?> > 1.000.000 Ke Atas <br>
	      			</div>
	      		</div>
	      	</div>

	        <?php // dynamic_sidebar( 'sidebar-woo' ); ?>

	      </div>
	      <!-- /.col-lg-3 -->

	      <div class="col-lg-9">
	        <div class="row">
				<?php
				if ( woocommerce_product_loop() ) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					// do_action( 'woocommerce_before_shop_loop' );

					// woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					// woocommerce_product_loop_end();

				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
			?>

	        </div>
	        <?php 
					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					if ( woocommerce_product_loop() ) {
						do_action( 'woocommerce_after_shop_loop' );
					}

	        ?>
	        <!-- /.row -->
	      </div>
		  <!-- /.col-lg-9 -->


    </div>
    <!-- /.row -->
</div>


<?php get_footer();