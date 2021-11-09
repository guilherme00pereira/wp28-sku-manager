<?php


namespace WP28\SKUMANAGER\Lib\Core\Helpers;

use Exception;

/**
 * Class Loader
 * @package WP28\SKUMANAGER\Lib\Core\Core\
 */
class Loader
{
	/**
	 * @param $hook
	 * @param $component
	 * @param $callback
	 * @param int $priority
	 * @param int $accepted_args
	 */
	public static function add_action($hook, $component, $callback, int $priority = 10, int $accepted_args = 1)
	{
		if (!method_exists($component, $callback)) {
			return;
		}
		add_action($hook, ($component === null ? $callback : array($component, $callback)), $priority, $accepted_args);
	}


	/**
	 * @param $hook
	 * @param $component
	 * @param $callback
	 * @param int $priority
	 * @param int $accepted_args
	 */
	public static function add_filter($hook, $component, $callback, int $priority = 10, int $accepted_args = 1)
	{
		if (!method_exists($component, $callback)) {
			return;
		}
		add_filter($hook, ($component === null ? $callback : array($component, $callback)), $priority, $accepted_args);
	}

}