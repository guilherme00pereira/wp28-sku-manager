<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div x-show="showRandom" class="grid grid-cols-3 gap-4">
	<div class="form-control">
		<label class="label">
			<span class="label-text">Sku Size: </span>
            <div class="badge badge-neutral text-l">4</div>
		</label>
		<input type="range" min="8" max="20" step="1" class="range range-primary">
	</div>
    <div class="form-control col-span-2">
        <label class="label">
            <span class="label-text">Username</span>
        </label>
        <input type="text" placeholder="username" class="input input-bordered">
    </div>
</div>
