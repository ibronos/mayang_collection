<?php 

defined( 'ABSPATH' ) || exit;


if ( ! is_ajax() ) {
	 do_action( 'woocommerce_review_order_before_payment' );
}

if ( WC()->cart->needs_payment() ) : 
	$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
?>
	<ul class="wc_payment_methods payment_methods methods" style="list-style: none; padding-left: 0;">
		<?php
		if ( ! empty( $available_gateways ) ) {

			foreach ( $available_gateways as $gateway ) {
				wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
			}
		} else {
			echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
		}
		?>
	</ul>
<?php 
endif; 

if ( ! is_ajax() ) {
	 do_action( 'woocommerce_review_order_after_payment' );
}

?>