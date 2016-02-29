<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Factor for nonce objects.
 *
 * @package Inpsyde\Nonces
 */
class NonceFactory {

	/**
	 * Creates and returns a new nonce instance for the given nonce context.
	 *
	 * @param Context $context Nonce context object.
	 *
	 * @return Nonce
	 */
	public function create( Context $context ) {

		$nonce = wp_create_nonce( $context->get_action() );

		return new Nonce( $nonce );
	}
}
