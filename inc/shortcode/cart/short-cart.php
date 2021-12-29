<?php


add_shortcode('short_cart', 'short_cart_func');

function short_cart_func()
{
    woocommerce_mini_cart(['list_class' => 'custom_cart_active']);

    wp_register_style('custom_woo_cart', plugins_url('custom_cart.css', __FILE__));
    wp_enqueue_style('custom_woo_cart');
}