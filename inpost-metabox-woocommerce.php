<?php
/**
 * InPost Metabox WooCommerce
 * 
 * Extends WooCommerce InPost plugin functionality by adding dedicated metabox
 * on order edit page in WooCommerce admin panel. Displays selected parcel locker
 * information in easy-to-copy format for store managers.
 * 
 * @author      Torwald45
 * @link        https://github.com/Torwald45/wp-snippet-inpost-metabox-woocommerce
 * @license     GPL-2.0-or-later
 * @version     2.0.0
 */

// Add metabox to WooCommerce orders
add_action('add_meta_boxes', 'torwald45_inpost_add_metabox', 10, 2);

function torwald45_inpost_add_metabox($post_type, $post) {
    if ($post_type === 'woocommerce_page_wc-orders' || $post_type === 'shop_order') {
        add_meta_box(
            'torwald45_inpost_metabox',
            'InPost Parcel Locker Information',
            'torwald45_inpost_render_metabox',
            $post_type,
            'normal',
            'default'
        );
        // Debug log - can be commented out in production
        error_log('InPost metabox added to order');
    }
}

// Render metabox content
function torwald45_inpost_render_metabox($post) {
    $order_id = $post->ID;
    
    echo '<div class="torwald45-inpost-metabox-content">';
    echo '<p>Order ID: ' . esc_html($order_id) . '</p>';
    echo '<p>Selected parcel locker: <span id="torwald45_inpost_selected_' . esc_attr($order_id) . '">Loading...</span></p>';
    echo '</div>';
    
    echo "<script type=\"text/javascript\">
    jQuery(document).ready(function($) {
        var paczkomatId = '';
        var paczkomatText = '';
        
        // Find select element with ID starting with 'paczkomat_id_'
        $('select[id^=\"paczkomat_id_\"]').each(function() {
            paczkomatId = $(this).val();
            var selectId = this.id;
            paczkomatText = $('#select2-' + selectId + '-container').text();
            return false; // Break loop after first element
        });
        
        if (paczkomatText && paczkomatText !== '-- wybierz --') {
            $('#torwald45_inpost_selected_" . $order_id . "').text(paczkomatText);
        } else if (paczkomatId) {
            $('#torwald45_inpost_selected_" . $order_id . "').text(paczkomatId);
        } else {
            // Additional check for orders without parcel locker
            var shippingMethod = $('.shipping_method_0').text();
            if (shippingMethod && shippingMethod.toLowerCase().indexOf('paczkomat') === -1) {
                $('#torwald45_inpost_selected_" . $order_id . "').text('This order does not use parcel locker');
            } else {
                $('#torwald45_inpost_selected_" . $order_id . "').text('No parcel locker selected');
            }
        }
    });
    </script>";
}

// Add metabox styles
add_action('admin_head', 'torwald45_inpost_add_metabox_styles');

function torwald45_inpost_add_metabox_styles() {
    echo '<style>
    .torwald45-inpost-metabox-content {
        background: #fff;
        padding: 10px;
        margin: 10px 0;
    }
    </style>';
}

// Add screen ID for metabox compatibility
add_filter('woocommerce_screen_ids', 'torwald45_inpost_add_screen_id');

function torwald45_inpost_add_screen_id($screen_ids) {
    $screen_ids[] = 'woocommerce_page_wc-orders';
    return $screen_ids;
}
