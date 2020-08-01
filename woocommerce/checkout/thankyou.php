<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
$myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );
?>

<div class="woocommerce-order d-flex justify-content-center">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed">
				<?php 
				esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); 
				?>
			</p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay">
						<?php esc_html_e( 'My account', 'woocommerce' ); ?>		
					</a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<div class="card border-0">
				<div class="card-body text-center">
					<h1 class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
						<?php 
						echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank You', 'woocommerce' ), $order ); 
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
					</h1>
					<br>
					<h5 class="text-muted"> FOR SHOPPING AT MAYANG COLLECTION </h5>
					<h5 class="text-muted">	WE HOPE YOU LIKEAND BE OUR LOYAL CUSTOMER </h5>
					<h6 class="text-muted"> No. Transaksi #<?php echo $order->get_order_number(); ?> </h6>
					<h6 class="text-muted"> Anda akan menerima konfirmasi pembelian di email </h6>
					<br>
					<h6 class="text-muted"> Mohon Lakukan Pembayaran ke </h6>
					<h6 class="text-muted"> 
						<?php
							if ( $order->get_payment_method_title() ) {
								echo wp_kses_post( $order->get_payment_method_title() );
							} 
						?> 
						a/n Mayang Collection
					</h6>

					<br>
					<h6 class="text-muted">Konfirmasikan pembayaran anda dengan mengunggah bukti transfer disini</h6>

					<a href="<?= $myaccount; ?>" class="btn btn-lg btn-primary">Akun Saya</a>
				</div>
			</div>




		<?php endif; ?>

		<?php // do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php // do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
			<?php 
				echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you..', 'woocommerce' ), null );
			?>		
		</p>

	<?php endif; ?>

</div>