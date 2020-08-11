<?php

add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 
function woo_custom_order_button_text() {
    return __( 'Pesan', 'woocommerce' ); 
}

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



// add_filter('woocommerce_checkout_fields', 'custom_woocommerce_billing_fields');
function custom_woocommerce_billing_fields($fields)
{
    $fields['billing']['billing_options'] = array(
        'label' => __('NIF', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Your NIF here....', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('my-css')   // add class name
    );
    return $fields;
}


add_action('woocommerce_after_order_notes', 'ambilOutlet');
function ambilOutlet($checkout)
{
?>
	<div class="card mt-2" id="ambil-outlet">
		<div class="card-header"> 
			<h5>Ambil di Outlet</h5>
		</div>

		<div class="card-body">	
			<?php
				woocommerce_form_field( 'ambilOutlet_nama', array(
					'type' => 'text',
					'class' => array(
							'd-flex justify-content-between form-row form-row-wide'
						),
					'label' => __('Nama') ,
				),
				$checkout->get_value('ambilOutlet_nama') );

				woocommerce_form_field( 'ambilOutlet_alamat', array(
					'type' => 'text',
					'class' => array(
							'd-flex justify-content-between form-row form-row-wide'
						),
					'label' => __('Alamat') ,
				),
				$checkout->get_value('ambilOutlet_alamat') );

				woocommerce_form_field( 'ambilOutlet_telp', array(
					'type' => 'text',
					'class' => array(
							'd-flex justify-content-between form-row form-row-wide'
						),
					'label' => __('Telp') ,
				),
				$checkout->get_value('ambilOutlet_telp') );
			?>
		</div>
	</div>
<?php
}