<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Request-based nonce validator implementation.
 *
 * @package Inpsyde\Nonces
 * @since   1.0.0
 */
class RequestNonceValidator {

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
	public function validate_nonce( $action = '', NonceValidator $nonce_validator = null ) {

		$action = $action ? (string) $action : $this->action;

		$nonce = array_key_exists( $action, $_GET ) ? $_GET[ $action ] : '';

		if (
			array_key_exists( 'REQUEST_METHOD', $_SERVER ) && 'POST' === $_SERVER['REQUEST_METHOD']
			&& array_key_exists( $action, $_POST )
		) {
			$nonce = $_POST[ $action ];
		}

		$nonce_validator = $nonce_validator ?: $this->nonce_validator;

		return $nonce_validator->validate_nonce( $nonce, $action );
	}
}
