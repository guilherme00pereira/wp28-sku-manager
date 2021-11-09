<?php

if (!defined('ABSPATH')) exit;


?>

<div x-data="previewProducts" class="flex flex-col">
	<div class="card bordered">
        <div class="card-bory">
            <span x-text="message"></span>
        </div>
		<div class="card-actions justify-end">
			<button type="button" @click="getProducts()" class="btn btn-primary btn-sm">Start</button>
		</div>
	</div>
    <div class="flex flex-row pt-5">
        <div class="flex-1" x-show="showProgressBar">
            <progress class="progress progress-info" :value="barCounter" max="100"></progress>
        </div>
        <table class="table w-full table-compact" x-show="showTableGenProducts" x-transition>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>SKU</th>
            </tr>
            <template x-for="product in products">
                <tr>
                    <td x-text="product.id"></td>
                    <td x-text="product.name"></td>
                    <td x-text="product.sku"></td>
                </tr>
            </template>
        </table>
    </div>
</div>
