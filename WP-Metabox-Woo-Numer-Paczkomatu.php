// Początek funkcji dodaj_wlasny_metabox
add_action('add_meta_boxes', 'dodaj_wlasny_metabox', 10, 2);

function dodaj_wlasny_metabox($post_type, $post) {
    if ($post_type === 'woocommerce_page_wc-orders' || $post_type === 'shop_order') {
        add_meta_box(
            'wlasny_metabox_id',
            'Informacje o paczkomacie',
            'wyswietl_wlasny_metabox',
            $post_type,
            'normal',
            'default'
        );
        error_log('Metabox został dodany do zamówienia');
    }
}
// Koniec funkcji dodaj_wlasny_metabox

// Początek funkcji wyswietl_wlasny_metabox

function wyswietl_wlasny_metabox($post) {
    $order_id = $post->ID;
    
    echo '<div class="wlasny-metabox-content">';
    echo '<p>ID zamówienia: ' . $order_id . '</p>';
    echo '<p>Wybrany paczkomat: <span id="wybrany_paczkomat_' . $order_id . '">Ładowanie...</span></p>';
    echo '</div>';
    
    echo "<script type=\"text/javascript\">
    jQuery(document).ready(function($) {
        var paczkomatId = '';
        var paczkomatText = '';

        // Szukamy elementu select z ID zaczynającym się od 'paczkomat_id_'
        $('select[id^=\"paczkomat_id_\"]').each(function() {
            paczkomatId = $(this).val();
            var selectId = this.id;
            paczkomatText = $('#select2-' + selectId + '-container').text();
            return false; // Przerywamy pętlę po znalezieniu pierwszego elementu
        });

        if (paczkomatText && paczkomatText !== '-- wybierz --') {
            $('#wybrany_paczkomat_" . $order_id . "').text(paczkomatText);
        } else if (paczkomatId) {
            $('#wybrany_paczkomat_" . $order_id . "').text(paczkomatId);
        } else {
            // Dodatkowe sprawdzenie dla zamówień bez paczkomatu
            var shippingMethod = $('.shipping_method_0').text();
            if (shippingMethod && shippingMethod.toLowerCase().indexOf('paczkomat') === -1) {
                $('#wybrany_paczkomat_" . $order_id . "').text('To zamówienie nie korzysta z paczkomatu');
            } else {
                $('#wybrany_paczkomat_" . $order_id . "').text('Nie wybrano paczkomatu');
            }
        }
    });
    </script>";
}

// Koniec funkcji wyswietl_wlasny_metabox

// Początek funkcji dodaj_style_metaboxa
add_action('admin_head', 'dodaj_style_metaboxa');

function dodaj_style_metaboxa() {
    echo '<style>
    .wlasny-metabox-content {
        background: #fff;
        padding: 10px;
        margin: 10px 0;
    }
    </style>';
}
// Koniec funkcji dodaj_style_metaboxa

// Początek funkcji dodaj_screen_id_dla_metaboxa
add_filter('woocommerce_screen_ids', 'dodaj_screen_id_dla_metaboxa');

function dodaj_screen_id_dla_metaboxa($screen_ids) {
    $screen_ids[] = 'woocommerce_page_wc-orders';
    return $screen_ids;
}
// Koniec funkcji dodaj_screen_id_dla_metaboxa

// Początek funkcji get_order_meta_ajax
add_action('wp_ajax_get_order_meta', 'get_order_meta_ajax');

function get_order_meta_ajax() {
    $order_id = $_GET['order_id'];
    $meta = get_post_meta($order_id);
    wp_send_json($meta);
}
// Koniec funkcji get_order_meta_ajax
