<?php

namespace WP28\SKUMANAGER;

use WP28\SKUMANAGER\Lib\Core\Helpers\Plugin;

final class SkuManager extends Plugin {

	protected static ?SkuManager $_instance = null;

	public function __construct()
	{
		parent::__construct(
			array(
				'generateOptionsSelected'   => 'bocp',
				'generateOnAddProducts'     => 1,
			)
		);
	}

	public function init(): void
	{
		new ApiController();
		new AdminController( self::getOptions() );
	}

	public static function getInstance( ): ?SkuManager
	{
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

}