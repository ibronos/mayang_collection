<?php

foreach ( WC()->cart->get_cart() as $cart_item ) {
   $item_name = $cart_item['data']->get_title();
   $quantity = $cart_item['quantity'];
   $price = $cart_item['data']->get_price();

   echo $item_name;
  }
