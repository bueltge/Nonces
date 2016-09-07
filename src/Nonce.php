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
	 * Creates and returns a new nonce instance for the given nonce context.
	 *
	 * @param Context $context Nonce context object.
	 *
	 * @return static Nonce instance.
	 */
	public static function from_context( Context $context ) {

		return new static( wp_create_nonce( $context->get_action() ) );
	}

	/**
	 * Returns the string representation of the nonce (i.ee, its value).
	 *
	 * @return string Nonce value.
	 */
	public function __toString() {

		return $this->nonce;
	}
}
