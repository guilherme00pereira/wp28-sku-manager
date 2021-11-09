<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WP28\SKUMANAGER\Lib\WP28Core\Plugin;

?>

<div class="wrap tailwindcss">
    <div class="container mx-auto max-h-full x-cloak">
        <div class="flex flex-row flex-initial p-5">
            <div>
                <img src="<?php echo Plugin::getAssetsUrl() .  'img/wp28_grey.png' ?>" width="120" height="36" alt="WP28">
            </div>
            <div class="ml-10">
                <h1>SKU Manager</h1>
            </div>
            <div class="mx-10">
                <h4>Manage your product SKU' easily.</h4>
            </div>
        </div>
        <div class="flex flex-row">
            <div x-data="{active: 1}" class="flex-auto">
                <div class="m4 tabs">
                    <button class="tab tab-lg tab-lifted" x-on:click.prevent="active=1"
                            x-bind:class="{'tab-active': active === 1}">Settings
                    </button>
                    <button class="tab tab-lg tab-lifted" x-on:click.prevent="active=2"
                            x-bind:class="{'tab-active': active === 2}">Generate
                    </button>
                    <button class="tab tab-lg tab-lifted" x-on:click.prevent="active=3"
                            x-bind:class="{'tab-active': active === 3}">Check Duplicate
                    </button>
                    <button class="flex-1 tab tab-lg tab-lifted cursor-default"></button>
                </div>
                <div x-show="active === 1">
                    <?php include_once('partials/settings-form.php'); ?>
                </div>
                <div x-show="active === 2">
                    <?php include_once('partials/sku-generator.php'); ?>
                </div>
                <div x-show="active === 3">
                    3
                </div>
            </div>
        </div>
    </div>
</div>

