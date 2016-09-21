<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * WordPress-specific nonce validator implementation.
 *
 * @package Inpsyde\Nonces
 * @since   1.0.0
 */
final class WPNonceValidator implements NonceValidator {

	/**
	 * @var string
	 */
	private $action;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @since 1.0.0
	 *
	 * @param string $action Optional. Nonce action. Defaults to empty string.
	 */
	public function __construct( $action = '' ) {

		$this->action = (string) $action;
	}

	/**
	 * Validates the given nonce in the given context.
	 *
	 * @since 1.0.0
	 *
	 * @param string $nonce  Nonce value.
	 * @param string $action Optional. Nonce action. Defaults to empty string.
	 *
	 * @return bool Whether or not the nonce is valid.
	 */
	public function validate_nonce( $nonce, $action = '' ) {

		return (bool) wp_verify_nonce( $nonce, $action ?: $this->action );
	}
}
