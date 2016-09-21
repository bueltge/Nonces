<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

use Inpsyde\Nonces\NonceValidator;

/**
 * Request validator implementation.
 *
 * @package Inpsyde\Nonces\Validator
 * @since   1.0.0
 */
class RequestValidator {

	/**
	 * @var string
	 */
	private $action;

	/**
	 * @var NonceValidator
	 */
	private $nonce_validator;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @since 1.0.0
	 *
	 * @param string         $action          Optional. Nonce action. Defaults to empty string.
	 * @param NonceValidator $nonce_validator Optional. A nonce validator object. Defaults to null.
	 */
	public function __construct( $action = '', NonceValidator $nonce_validator = null ) {

		$this->action = (string) $action;

		$this->nonce_validator = $nonce_validator ?: new WPNonceValidator();
	}

	/**
	 * Validates the nonce given in the current request.
	 *
	 * @since 1.0.0
	 *
	 * @param string         $action          Optional. Nonce action. Defaults to empty string.
	 * @param NonceValidator $nonce_validator Optional. A nonce nonce_validator object. Defaults to null.
	 *
	 * @return bool Whether or not the nonce in the current request is valid.
	 */
	public function validate( $action = '', NonceValidator $nonce_validator = null ) {

		$nonce_validator = $nonce_validator ?: $this->nonce_validator;

		$action = $action ? (string) $action : $this->action;

		return $nonce_validator->validate( $this->get_nonce( $action ), $action );
	}

	/**
	 * Returns the nonce given in the current request, if found.
	 *
	 * @param string $action Nonce action.
	 *
	 * @return string Nonce value.
	 */
	private function get_nonce( $action ) {

		$nonce = array_key_exists( $action, $_GET ) ? (string) $_GET[ $action ] : '';

		if ( empty( $_SERVER['REQUEST_METHOD'] ) || 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
			return $nonce;
		}

		if ( ! array_key_exists( $action, $_POST ) ) {
			return $nonce;
		}

		return (string) $_POST[ $action ];
	}
}
