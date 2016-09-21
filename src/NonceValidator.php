<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Interface for all nonce validator implementations.
 *
 * @package Inpsyde\Nonces
 * @since   1.0.0
 */
interface NonceValidator {

	/**
	 * Validates the given nonce for the given action.
	 *
	 * @since 1.0.0
	 *
	 * @param string $nonce  Nonce value.
	 * @param string $action Optional. Nonce action. Defaults to empty string.
	 *
	 * @return bool Whether or not the nonce is valid for the given action.
	 */
	public function validate( $nonce, $action = '' );
}
