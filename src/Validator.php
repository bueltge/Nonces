<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Interface for all nonce validator implementations.
 *
 * @package Inpsyde\Nonces
 * @since   1.0.0
 */
interface Validator {

	/**
	 * Validates the given nonce in the given context.
	 *
	 * @since 1.0.0
	 *
	 * @param string $nonce   Nonce value.
	 * @param mixed  $context Optional. Validation context. Defaults to null.
	 *
	 * @return bool Whether or not the nonce is valid.
	 */
	public function validate( $nonce, $context = null );
}
