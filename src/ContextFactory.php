<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Factory for nonce context objects.
 *
 * @package Inpsyde\Nonces
 */
class ContextFactory {

	/**
	 * Creates and returns a new Context instance.
	 *
	 * @param string $action The action which the nonce is for.
	 * @param string $name   The name reference for the nonce (e.g., for the individual output classes).
	 *
	 * @return Context
	 */
	public function create( $action, $name = '' ) {

		return new Context( $action, $name );
	}
}
