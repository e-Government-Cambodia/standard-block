<?php
/**
 * Plugin Name:       Cambodia WP Blocks
 * Plugin URI:        https://mptc.gov.kh/
 * Description:       WordPress Block ecosystem for Cambodia Government website based on Gov Web design standard
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.2
 * Author:            e-Government-Cambodia, Chetra Chann, Thaily Chann, Sokmean Ngorn
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       standard-blocks
 * Domain Path:       standard-blocks
 * Update URI:        https://github.com/e-Government-Cambodia/standard-blocks
 *
 * @package           kmstdblocks
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function kmstdblocks_standard_blocks_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'kmstdblocks_standard_blocks_block_init' );

require 'plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/e-Government-Cambodia/standard-blocks/',
	__FILE__,
	'standard-blocks'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('your-token-here');