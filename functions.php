<?php

/**
 * The plugin functions file.
 */

require_once 'etsy-order-sync.php';

/**
 * Sync the Etsy order with WooCommerce.
 *
 * @param int $woocommerce_order_id The WooCommerce order ID.
 *
 * @return void
 */
function etsy_order_sync( $woocommerce_order_id ) {
    // Get the Etsy order details.
    $etsy_order = etsy_get_order( $woocommerce_order_id );

    // Update the WooCommerce order with the Etsy order details.
    wc_update_order( $woocommerce_order_id, [
        'order_number' => $etsy_order['order_number'],
        'status'       => $etsy_order['status'],
        'shipping_address' => $etsy_order['shipping_address'],
        'total'        => $etsy_order['total'],
    ]);
}
