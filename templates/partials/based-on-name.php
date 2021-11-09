<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div x-show="showBasedOnName" class="grid grid-cols-2 gap-4">
	<div class="form-control">
		<label class="label">
			<span class="label-text">Name Size: </span>
            <div class="badge badge-neutral text-l" x-ref="bopnNameBadge">3</div>
		</label>
		<input type="range" min="2" max="4" step="1" value="4" @change="rangeChange($refs.bopnNameBadge, $event.target.value)" class="range range-primary">
	</div>
    <div class="form-control">
        <label class="label">
            <span class="label-text">Number Size</span>
            <div class="badge badge-neutral text-l" x-ref="bopnNumberBadge">6</div>
        </label>
        <input type="range" min="4" max="10" step="1" @change="rangeChange($refs.bopnNumberBadge, $event.target.value)" class="range range-primary">
    </div>
</div>
