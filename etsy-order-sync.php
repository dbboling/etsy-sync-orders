<?php

/**
 * The Etsy Order Sync page.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'admin_menu', 'etsy_order_sync_add_menu_page' );

function etsy_order_sync_add_menu_page() {
    add_submenu_page(
        'options-general.php',
        'Etsy Order Sync',
        'Etsy Order Sync',
        'manage_options',
        'etsy-order-sync',
        'etsy_order_sync_settings_page'
    );
}

function etsy_order_sync_settings_page() {
    ?>

    <div class="wrap">
        <h1>Etsy Order Sync</h1>

        <p>This page shows a list of all of the orders that have been synced along with their status.</p>

        <table class="wp-list-table widefat">
            <thead>
                <tr>
                    <th>Etsy Order ID</th>
                    <th>WooCommerce Order ID</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Get the list of synced orders.
                $synced_orders = get_option( 'etsy_order_sync_orders', [] );

                // Loop through the synced orders and output them in the table.
                foreach ( $synced_orders as $synced_order ) {
                    ?>
                    <tr>
                        <td><?php echo $synced_order['etsy_order_id']; ?></td>
                        <td><?php echo $synced_order['woocommerce_order_id']; ?></td>
                        <td><?php echo $synced_order['status']; ?></td>
                        <td><?php echo $synced_order['total']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <form action="" method="post">
            <input type="text" name="etsy_client_id" placeholder="Etsy Client ID">
            <input type="text" name="etsy_client_secret" placeholder="Etsy Client Secret">
            <input type="submit" value="Save">
        </form>
    </div>

    <?php
}

