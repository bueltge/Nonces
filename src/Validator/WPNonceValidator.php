<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

use Inpsyde\Nonces\NonceValidator;

/**
 * WordPress-specific nonce validator implementation.
 *
 * @package Inpsyde\Nonces\Validator
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
	 * Validates the given nonce for the given action.
	 *
	 * @since 1.0.0
	 *
	 * @param string $nonce  Nonce value.
	 * @param string $action Optional. Nonce action. Defaults to empty string.
	 *
	 * @return bool Whether or not the nonce is valid for the given action.
	 */
	public function validate( $nonce, $action = '' ) {

		return (bool) wp_verify_nonce( (string) $nonce, $action ? (string) $action : $this->action );
	}
}
