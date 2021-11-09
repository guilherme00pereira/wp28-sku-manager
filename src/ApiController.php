<?php

namespace WP28\SKUMANAGER;


use PHPMailer\PHPMailer\Exception;
use WP28\SKUMANAGER\Lib\Core\Helpers\Loader;
use WP28\SKUMANAGER\Objects\DAO;

class ApiController {

	public function __construct()
	{
		Loader::add_action('wp_ajax_getProductsWithNoSku_action', $this, 'getProductsWithNoSku');
	}

	public function getProductsWithNoSku()
	{
		try {
			wp_send_json_success(
				array(
					'products' => DAO::getProductsWithSkuEmpty(),
				)
			);
		} catch (Exception $e){
			wp_send_json_error($e);
		}
	}

}