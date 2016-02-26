<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Factor for nonce objects.
 *
 * @package Inpsyde\Nonces
 */
class NonceFactory {

	/**
	 * Creates and returns a new nonce for the given nonce context.
	 *
	 * @param Context $context Nonce context object.
	 *
	 * @return Nonce
	 */
	public function create( Context $context ) {

		$action = $context->get_action();

		$nonce = wp_create_nonce( $action );

		return new Nonce( $nonce );
	}
}
