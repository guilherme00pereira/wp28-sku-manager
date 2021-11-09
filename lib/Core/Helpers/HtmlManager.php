<?php

namespace WP28\SKUMANAGER\Lib\Core\Helpers;

class HtmlManager {

	public static function get_view($view, $model = null)
	{
		ob_start();
		include PluginConstants::getTemplateDir() . $view . '.php';
		echo ob_get_clean();
	}

	public static function get_partial($partial, $model = null)
	{
		ob_start();
		include PluginConstants::getTemplateDir() . 'partials/' . $partial . '.php';
		echo ob_get_clean();
	}
}