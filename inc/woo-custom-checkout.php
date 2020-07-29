<?php
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
 {

	 $fields['billing']['billing_first_name']['placeholder'] = 'Nama'; 
	 $fields['billing']['billing_first_name']['label'] = 'Nama'; 
	 unset( $fields['billing']['billing_company'] );
	 unset( $fields['billing']['billing_last_name'] );
	 unset( $fields['billing']['billing_country'] );

	 return $fields;
 }