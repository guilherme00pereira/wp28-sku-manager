<?php
/*
Plugin Name: WP28 SKU Manager
Plugin URI: https://www.wp28.dev/our-plugins/sku-manager
Description: Define rules for generating SKU for WooCommerce products.
Version: 1.0.0
Requires at least: 5.8
Requires PHP: 7.4
Author: WP28
Author URI: https://www.wp28.dev/
Text Domain: wp28-sku-manager
Domain Path: /languages
WC tested up to: 5.1.0
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit;

require "vendor/autoload.php";

use WP28\SKUMANAGER\Lib\Core\Helpers\Startup;
use WP28\SKUMANAGER\SkuManager;

SkuManager::getInstance()
	->setup(
	'1.0.0',
	__FILE__,
	'wp28-sku-manager',
	'WP28 Sku Manager',
	'wp28skumgr'
);

if(Startup::hasEnvironmentRequirements( '7.4.0', ['woocommerce/woocommerce.php']))
	Startup::run(SkuManager::class);