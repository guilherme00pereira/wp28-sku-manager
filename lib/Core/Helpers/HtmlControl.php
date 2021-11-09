<?php

namespace WP28\SKUMANAGER\Lib\Core\Helpers;

abstract class HtmlControl {

	protected string $id;
	protected string $label;
	protected string $value;

	/**
	 * @param string $id
	 * @param string $label
	 * @param string $value
	 */
	public function __construct( string $id, string $label, string $value ) {
		$this->id    = $id;
		$this->label = $label;
		$this->value = $value;
	}


	public abstract function render_html();
}