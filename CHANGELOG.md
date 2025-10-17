# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

## [2.0.0] - 2025-10-17

### Changed
- **BREAKING CHANGE:** Complete code rewrite with unique two-level prefixes
- All function names now use torwald45_inpost_ prefix
- All HTML element IDs now use torwald45_inpost_ prefix
- Metabox ID changed to torwald45_inpost_metabox
- CSS class changed to torwald45-inpost-metabox-content
- All code comments translated to English
- Function names translated to English

### Added
- Function torwald45_inpost_add_metabox() - registers metabox
- Function torwald45_inpost_render_metabox() - renders metabox HTML
- Function torwald45_inpost_add_metabox_styles() - adds CSS styles
- Function torwald45_inpost_add_screen_id() - adds WooCommerce screen ID
- New file inpost-metabox-woocommerce.php with clean code structure
- CHANGELOG.md for version tracking
- LICENSE file (GPL v2 or later)
- .gitignore file

### Removed
- Unused AJAX function get_order_meta_ajax() (dead code)
- Polish language from code (comments and function names)
- Old file WP-Metabox-Woo-Numer-Paczkomatu.php (replaced)

### Technical
- No database changes (display-only functionality)
- No migration needed (metabox reads data from WooCommerce InPost plugin)
- error_log() kept for debugging (can be commented out if not needed)

## [1.0.0] - 2024-09-03

### Added
- Initial version with Polish code
- Metabox display for InPost parcel locker information
- Integration with WooCommerce InPost plugin (By WP Desk)
- jQuery-based parcel locker detection
- Support for WooCommerce HPOS orders
- CSS styling for metabox
