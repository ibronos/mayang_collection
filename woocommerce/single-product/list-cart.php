<?php if( !empty( WC()->cart->get_cart() ) ) : ?>

<?php
foreach ( WC()->cart->get_cart() as $cart_item ) {
   $item_name = $cart_item['data']->get_title();
   $quantity = $cart_item['quantity'];
   $price = $cart_item['data']->get_price();
   $image_id = $cart_item['data']->get_image_id();
   $image_url = wp_get_attachment_url($image_id, 'small');
?>

		  <div class="row">
		    <div class="col-md-6">
		      <a href="#">
		        <img class="img-fluid rounded mb-3 mb-md-0" src="<?= $image_url; ?>" alt="">
		      </a>
		    </div>
		    <div class="col-md-6">
				<table class="table border-0">
					<tr class="border-0">
						<td class="border-0 p-0"> <b>Nama Produk</b> </td>
						<td class="border-0 p-0"> <p>: <?= $item_name; ?></p> </td>
					</tr>
					<tr class="border-0">
						<td class="border-0 p-0"> <b>Jumlah</b> </td>
						<td class="border-0 p-0"> <p>: <?= $quantity; ?></p> </td>
					</tr>
					<tr class="border-0">
						<td class="border-0 p-0"> <b>Harga</b> </td>
						<td class="border-0 p-0"> <p>: Rp. <?= $price; ?></p> </td>
					</tr>
				</table>
		    </div>
		  </div>
		<hr>
<?php } ?>

<?php endif; ?>
