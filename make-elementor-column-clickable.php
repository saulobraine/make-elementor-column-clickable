<?php
/**
 * Plugin Name:       Coluna Clicável | Braine
 * Description:       Plugin criado para tornar uma coluna do Elementor clicável
 * Version:           1.0
 * Requires at least: 5.2
 * Author:            Saulo Braine
 * Author URI:        https://braine.dev/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       coluna-clicavel-braine
 * Domain Path:       /languages
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

 /* ACTIVATION */
 register_activation_hook(__FILE__, function () {
     /* UPDATE PERMALINKS */
     flush_rewrite_rules();
 });

/* DEACTIVATION */
register_deactivation_hook(__FILE__, function () {
    /* UPDATE PERMALINKS */
    flush_rewrite_rules();
});

// Including widget file
require_once(__DIR__ . '/widgets/widgets.php');
