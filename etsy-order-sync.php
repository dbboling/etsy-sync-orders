<?php

/**
 * WordPress plugin that uses Etsy API to sync Etsy orders with WooCommerce.
 *
 * @package Etsy_Orders
 */

class Etsy_Orders {

    /**
     * The Etsy API client.
     *
     * @var \Etsy\Client
     */
    private $client;

    /**
     * The WooCommerce order object.
     *
     * @var \WC_Order
     */
    private $order;

    /**
     * Constructor.
     *
     * @param \Etsy\Client $client The Etsy API client.
     * @param \WC_Order $order The WooCommerce order object.
     */
    public function __construct($client, $order) {
        $this->client = $client;
        $this->order = $order;

        /**
         * Your Etsy API key.
         */
        $this->etsy_api_key = 'is6jxupwyy9x67520mlf7k4s';

        /**
         * Your WooCommerce order ID.
         */
        $this->woocommerce_order_id = $this->order->get_id();

    }

    /**
     * Sync the Etsy order with WooCommerce.
     *
     * @return void
     */
    public function sync() {
        // Get the Etsy order details.
        $etsy_order = $this->client->getOrder($this->order->get_id());

        // Update the WooCommerce order with the Etsy order details.
        $this->order->set_order_number($etsy_order['order_number']);
        $this->order->set_status($etsy_order['status']);
        $this->order->set_shipping_address($etsy_order['shipping_address']);
        $this->order->set_total($etsy_order['total']);

        // Save the WooCommerce order.
        $this->order->save();

        // Check if the Etsy order status has changed.
        if ($etsy_order['status'] !== $this->order->get_status()) {
            // Update the WooCommerce order status.
            $this->order->update_status($etsy_order['status']);
        }
    }
}
