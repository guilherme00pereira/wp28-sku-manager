<?php

namespace WP28\SKUMANAGER;

use WP28\SKUMANAGER\Lib\Core\Helpers\Loader;
use WP28\SKUMANAGER\Lib\Core\Helpers\Plugin;
use WP28\SKUMANAGER\Objects\DAO;
use WP28\SKUMANAGER\Objects\SettingsDTO;

class AdminController {

	private SettingsDTO $dto;

	public function __construct($options)
	{
		$this->dto = new SettingsDTO($options, DAO::getRecentProducts());
		Loader::add_action('admin_menu', $this, 'add_menu');
		Loader::add_action('admin_enqueue_scripts', $this, 'register_scripts_and_styles');
		Loader::add_action('admin_post_wp28skumgr_save_options', $this, 'wp28skumgr_save_options');
		Loader::add_action('plugin_action_links_' . Plugin::getPluginBase(), $this, 'plugin_action_links');
	}

	public function add_menu(  )
	{
		add_submenu_page(
			'woocommerce',
			__('Sku Manager', Plugin::getTextDomain()),
			__('Sku Manager', Plugin::getTextDomain()),
			'manage_options',
			Plugin::getSlug(),
			array($this, 'display_settings_page'),
			99
		);
	}

	public function display_settings_page(  )
	{
		$viewModel = $this->dto;
		ob_start();
		include Plugin::getTemplateDir() . 'settings-page.php';
		echo ob_get_clean();
	}

	public function wp28skumgr_save_options(  )
	{
		if (!current_user_can('manage_options')) {
			wp_die(__('You are not allowed to do this action.', Plugin::getTextDomain()));
		}
		check_admin_referer('wp28skumgr_save_options_nonce');

		update_option(Plugin::getOptionsName(), $_POST['wp28-sku-manager_options']);
		wp_redirect(admin_url('admin.php?page=' . Plugin::getSlug() . '&status=1'));
	}

	public function plugin_action_links($links): array
	{
		$plugin_links = array();
		$plugin_links[] = '<a href="' . esc_url(admin_url('admin.php?page=' . Plugin::getSlug())) . '">Configuração</a>';
		return array_merge($plugin_links, $links);
	}

	public function verify_post_data($data, $value_if_not_present)
	{
		if (isset($data) && !empty($data)) {
			return array_map(function ($item){
				var_dump($item);die;
			}, $data);
		} else {
			return $value_if_not_present;
		}
	}

	public function register_scripts_and_styles( $hook_suffix )
	{
		if(strpos($hook_suffix, Plugin::getSlug()))
		{
			wp_enqueue_style(Plugin::getPrefix() . '_maincss', Plugin::getAssetsUrl() . 'css/main.css');
			wp_enqueue_script(Plugin::getPrefix() . '_mainjs', Plugin::getAssetsUrl() . 'js/bundle.js', '', null, true);
			wp_localize_script(Plugin::getPrefix() . '_mainjs', 'plugin', array(
				'ajax_url'              => admin_url('admin-ajax.php'),
				'action_prodNoSku'      => 'getProductsWithNoSku_action',
				'selectedSkuGenerate'   => $this->dto->getGenerateOptionsSelected()
			));
		}
	}

}