<?php
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
 {

	 $fields['billing']['billing_first_name']['label'] = 'Nama'; 
	 $fields['billing']['billing_address_1']['label'] = 'Alamat'; 
 	 $fields['billing']['billing_state']['label'] = 'Provinsi'; 
 	 $fields['billing']['billing_city']['label'] = 'Kabupaten'; 
 	 $fields['billing']['billing_address_2']['label'] = 'Kecamatan'; 

	 unset( $fields['billing']['billing_company'] );
	 unset( $fields['billing']['billing_last_name'] );
	 // unset( $fields['billing']['billing_country'] );
	 unset( $fields['billing']['billing_address_3'] );

	 return $fields;
 }