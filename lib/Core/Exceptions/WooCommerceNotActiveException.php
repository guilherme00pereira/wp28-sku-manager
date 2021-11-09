<?php

namespace WP28\SKUMANAGER\Lib\Core\Exceptions;

use Exception;
use WP28\SKUMANAGER\Lib\Core\Helpers\Plugin;

class WooCommerceNotActiveException extends WP28Exception {

	public function __construct() {
		parent::__construct("");
	}

	public function render(  ) {

	    parent::render();

		$is_installed = false;

		if ( function_exists( 'get_plugins' ) ) {
			$all_plugins  = get_plugins();
			$is_installed = ! empty( $all_plugins['woocommerce/woocommerce.php'] );
		}

		?>

		<div class="error">
			<p>
				<strong><?php esc_html_e( Plugin::getName(), Plugin::getTextDomain() ); ?></strong>
				<?php esc_html_e( 'depends on the last version of WooCommerce to work!', Plugin::getTextDomain() ); ?>
			</p>

			<?php if ( $is_installed && current_user_can( 'install_plugins' ) ) : ?>
				<p>
					<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=woocommerce/woocommerce.php&plugin_status=active' ), 'activate-plugin_woocommerce/woocommerce.php' ) ); ?>" class="button button-primary">
						<?php esc_html_e( 'Activate WooCommerce', Plugin::getTextDomain() ); ?>
					</a>
				</p>
			<?php else :
				if ( current_user_can( 'install_plugins' ) ) {
					$url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' );
				} else {
					$url = 'https://wordpress.org/plugins/woocommerce/';
				}
				?>
				<p><a href="<?= esc_url( $url ); ?>"><?php esc_html_e( 'Install WooCommerce', Plugin::getTextDomain() ); ?></a></p>
			<?php endif; ?>
		</div>

		<?php

	}
}