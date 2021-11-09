<?php

namespace WP28\SKUMANAGER\Objects;

class SettingsDTO {

	private array $options;
	private array $products;

	public function __construct(array $options, array $products)
	{
		$this->options      = $options;
		$this->products     = $products;
	}

	/**
	 * @return array
	 */
	public function getSelectOptions(): array {
		return array(
			'bocp' => 'Based on category/product',
			'rndm' => 'Random',
			'cstm' => 'Custom template'
		);
	}

	/**
	 * @return string
	 */
	public function getGenerateOptionsSelected(): string {
		if(array_key_exists('generateOnAddProducts', $this->options)) {
			return $this->options['generateOptionsSelected'];
		}
		return 'bocp';
	}

	/**
	 * @return string
	 */
	public function getGenerateOnAddProducts(): string {
		if(array_key_exists('generateOnAddProducts', $this->options)){
			return "1";
		}
		return "0";
	}

	/**
	 * @return array
	 */
	public function getProducts(): array {
		return $this->products;
	}
}