<?php

namespace WP28\SKUMANAGER\Objects;

class DAO {

	public static function getProductsWithSkuEmpty(): array
	{
		$result = [];
		global $wpdb;
		$sql = "SELECT p.id, p.post_title, p.post_type, m.meta_value FROM {$wpdb->prefix}posts p
				LEFT JOIN {$wpdb->prefix}postmeta m ON m.post_id = p.id AND m.meta_key = '_sku'
				WHERE p.post_type = 'product' AND (m.meta_value = '' OR m.meta_value IS NULL)";
		$products = $wpdb->get_results($sql, ARRAY_A);
		foreach ( $products as $product ) {
			array_push( $result, [
				'id'   => $product['id'],
				'name' => $product['post_title'],
				'sku'  => $product['meta_value'],
			] );
		}
		return $result;
	}

	public static function getRecentProducts()
	{
		$result = [];
		global $wpdb;
		$sql = "SELECT id, post_title FROM {$wpdb->prefix}posts
				WHERE post_type = 'product' AND post_status = 'publish'
				ORDER BY RAND() DESC limit 5";
		$products = $wpdb->get_results($sql, ARRAY_A);
		foreach ( $products as $product ) {
			array_push( $result, [
				'id'    => $product['id'],
				'name'  => $product['post_title'],
			] );
		}
		return $result;
	}

}