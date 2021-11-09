<?php

namespace WP28\SKUMANAGER\Lib\Core\Exceptions;

class WP28ExceptionFactory {

	public static function getException( string $plugin ): WP28Exception {
		switch ( $plugin ) {
			case "woocommerce/woocommerce.php":
				return WooCommerceNotActiveException();
			default:
				return new WP28Exception();
		}
	}
}