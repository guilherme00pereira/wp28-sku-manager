<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WP28\SKUMANAGER\Lib\WP28Core\Plugin;

/**
 * @var WP28\SKUMANAGER\Objects\SettingsDTO $viewModel;
 */

?>

<form action="admin-post.php" method='post'>
    <input type="hidden" name="action" value="wp28skumgr_save_options">
	<?php wp_nonce_field( 'wp28skumgr_save_options_nonce' ); ?>

    <div x-data="settingsForm" x-data="init()" x-cloak class="flex flex-row justify-evenly">

        <div class="flex flex-col flex-auto">
            <div class="p-6 card bordered">
                <div class="form-control py-5">
                    <label class="cursor-pointer label">
                        <span class="label-text">Generate SKU when adding new products </span>
                        <input type="checkbox" name="wp28-sku-manager_options[generateOnAddProducts]"
                               @click="$event.target.value = $event.target.checked ? 1 : 0"
                               value="<?php echo $viewModel->getGenerateOnAddProducts()  ?>"
                               <?php checked(1 == $viewModel->getGenerateOnAddProducts()) ?>
                               class="checkbox checkbox-primary">
                        <div data-tip="hello" class="tooltip">
                            <div class="badge badge-sm">?</div>
                        </div>
                    </label>
                </div>
                <div class="divider"></div>
                <div class="form-control py-5">
                    <label class="label">
                        <span class="label-text">Choose how to generate SKU</span>
                        <div data-tip="hello" class="tooltip">
                            <div class="badge badge-sm">?</div>
                        </div>
                    </label>
                    <select name="wp28-sku-manager_options[generateOptionsSelected]" class="select select-bordered select-info w-full"
                            @change="selectHowToGenerate($event.target.value)">
                        <?php foreach ($viewModel->getSelectOptions() as $key=>$option) { ?>
                            <option value="<?php echo esc_attr($key); ?>"
                                <?php if($key == $viewModel->getGenerateOptionsSelected()) echo 'selected="selected"' ?>>
                                <?php echo $option ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="py-5">
                    <?php include_once('based-on-name.php'); ?>
                    <?php include_once('random.php'); ?>
                </div>
            </div>
        </div>

        <div class="flex flex-col flex-auto">
            <div class="p-6 card bordered">
                <div class="card-title">Preview SKU</div>
                <div class="card-body">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Select a product</span>
                        </label>
                        <select class="select select-bordered select-info w-full">
                            <?php foreach ($viewModel->getProducts() as $product) { ?>
                                <option value="<?php echo esc_attr($product['id']); ?>">
                                    <?php echo $product['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="flex flex-row flex-auto justify-center">
        <div class="form-control py-5">
            <button type="submit" class="btn btn-primary btn-sm">Save Configuration</button>
        </div>
    </div>

</form>
