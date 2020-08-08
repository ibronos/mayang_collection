<?php
/**
* Template Name: Outlet
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header();
$outlet = get_terms( [
    'taxonomy' => 'pa_outlet',
    'hide_empty' => false,
] );
// foreach ( $attr_warna as $key ) {
// $hex = get_field("kode_warna", $key->taxonomy . '_' . $key->term_id );
?>

<div class="outlet-page" style="margin-top: 8%; padding-bottom: 5%;">
	<div class="jumbotron bg-info">
		<div class="d-flex justify-content-center">
			<h3 class="text-white"><?php the_title(); ?></h3>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php 
			if( !empty($outlet) ) { 
				foreach ($outlet as $key) {
					$info = get_field("outlet_info", $key->taxonomy . '_' . $key->term_id );
			?>
			<div class="col-md-3">

			  <div class="card">
			    <img class="card-img-top img-responsive thumbnail" src="<?= $info['image']['sizes']['medium']; ?>" alt="Card image" style="width:100%">
			    <div class="card-body">
				      <p class="card-text" style="font-size: 14px;"><?= $info['alamat']; ?></p>
			    </div>
			    <div class="card-footer bg-white d-flex justify-content-center">
			    	<div class="btn-group">
			    		<a href="tel:<?= $info['nomor_hp']; ?>" target="_blank" type="button" class="btn btn-primary"> 
			    			<i class="fa fa-phone" aria-hidden="true"></i> Telepon
			    		</a>
			    		<a href="https://wa.me/<?= $info['whatsapp']; ?>" target="_blank" type="button" class="btn btn-primary"> 
			    			<i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp
			    		</a>
					</div>
			    </div>

			  </div>

			</div>
			<?php 
				}
			} 
			?>
		</div>
	</div>

</div>



<?php
get_footer();