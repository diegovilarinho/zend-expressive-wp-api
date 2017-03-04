<?php  


function wc_get_customer_orders() {
    
    // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => wc_get_order_types(),
        'post_status' => array_keys( wc_get_order_statuses() ),
    ) );
    
    $customer = wp_get_current_user();

    $customerOrders = count( $customer_orders );

    return $customerOrders;
}
add_action( 'woocommerce_before_my_account', 'wc_get_customer_orders' );
  
?>