<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Nonce model.
 *
 * @package Inpsyde\Nonces
 */
class Nonce {

	/**
	 * @var string
	 */
	private $nonce;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @param string $nonce Nonce value.
	 */
	public function __construct( $nonce ) {

		$this->nonce = (string) $nonce;
	}

	/**
	 * Returns the nonce value.
	 *
	 * @return string
	 */
	public function get() {

		return $this->nonce;
	}
}
