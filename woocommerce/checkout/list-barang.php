<?php if( !empty( WC()->cart->get_cart() ) ) : ?>

<ul class="list-group list-group-flush">
<?php
foreach ( WC()->cart->get_cart() as $cart_item ) {
   $item_name = $cart_item['data']->get_title();
   $quantity = $cart_item['quantity'];
   $price = $cart_item['data']->get_price();
   $image_id = $cart_item['data']->get_image_id();
   $image_url = wp_get_attachment_url($image_id, 'small');
?>
	<li class="list-group-item">
		<div class="row">
			<div class="col-sm-3">
				<img src="<?= $image_url; ?>" class="image-fluid img-thumbnail" width="80px" height="100px">
			</div>

			<div class="col-sm-9">
				<div class="table-responsive-sm">
					<table class="table border-0">
						<tr class="border-0">
							<td class="border-0"> <b>Nama Produk</b> </td>
							<td class="border-0"> <p>: <?= $item_name; ?></p> </td>
						</tr>
						<tr class="border-0">
							<td class="border-0"> <b>Jumlah</b> </td>
							<td class="border-0"> <p>: <?= $quantity; ?></p> </td>
						</tr>
						<tr class="border-0">
							<td class="border-0"> <b>Harga</b> </td>
							<td class="border-0"> <p>: Rp. <?= $price; ?></p> </td>
						</tr>
					</table>
				</div>
			</div>

		</div>
	</li>
	<hr>
<?php } ?>
</ul>

<?php endif; ?>
