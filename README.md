# WP Snippet: InPost Metabox WooCommerce

Extends WooCommerce InPost plugin functionality by adding dedicated metabox on order edit page. Displays selected parcel locker information in easy-to-copy format for store managers.

## Features

- Dedicated metabox on WooCommerce order edit page
- Displays selected InPost parcel locker information
- Easy-to-copy format for store managers
- Automatic detection of parcel locker selection
- Support for WooCommerce HPOS (High-Performance Order Storage)
- Lightweight jQuery-based implementation

## Requirements

- WordPress 5.0 or higher
- WooCommerce 9.0 or higher
- WooCommerce InPost plugin (By WP Desk) 4.5+ 
- PHP 7.4 or higher

## Installation

### Method 1: functions.php

1. Open your theme's functions.php file
2. Copy the entire content from inpost-metabox-woocommerce.php
3. Paste at the end of your functions.php
4. Save the file

### Method 2: Code Snippets Plugin

1. Install and activate the Code Snippets plugin
2. Go to Snippets - Add New
3. Copy content from inpost-metabox-woocommerce.php WITHOUT the opening php tag
4. Paste into the Code field
5. Activate the snippet

## Usage

After installation:
1. Edit any WooCommerce order that uses InPost shipping
2. Find InPost Parcel Locker Information metabox
3. Metabox will display selected parcel locker details
4. Information is in easy-to-copy format

### Possible metabox states:
- Parcel locker code and name (e.g., KRA01M)
- "No parcel locker selected" (if customer did not select)
- "This order does not use parcel locker" (if different shipping method)

## Technical Details

### Metabox
- Metabox ID: torwald45_inpost_metabox
- Title: InPost Parcel Locker Information
- Context: normal
- Priority: default

### HTML Elements
- Container class: torwald45-inpost-metabox-content
- Output span ID: torwald45_inpost_selected_{order_id}

### Functions
- torwald45_inpost_add_metabox() - registers metabox for order screens
- torwald45_inpost_render_metabox() - renders metabox HTML and jQuery
- torwald45_inpost_add_metabox_styles() - adds CSS styles
- torwald45_inpost_add_screen_id() - adds WooCommerce screen ID compatibility

### Hooks Used
- add_meta_boxes (register metabox)
- admin_head (add CSS styles)
- woocommerce_screen_ids (add screen compatibility)

### Integration
- Reads data from WooCommerce InPost plugin select fields
- Uses jQuery to detect selected parcel locker
- Works with Select2 dropdown (used by InPost plugin)

## Debugging

The snippet includes error_log() for debugging:
- Log message: "InPost metabox added to order"
- Location: Line 23 in code

To disable logging, comment out line 23:
// error_log('InPost metabox added to order');

## Tested With

- WooCommerce 9.2.3
- WooCommerce InPost 4.5.7 (By WP Desk)
- WordPress 6.0+

## Migration from v1.0.0

No migration needed - this is display-only functionality. Old metabox will be replaced automatically after code update.

## Changelog

See CHANGELOG.md for version history.

## License

GPL v2 or later

## Author

Torwald45
