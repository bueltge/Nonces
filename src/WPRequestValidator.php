<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Request-based nonce validator implementation.
 *
 * @package Inpsyde\Nonces
 * @since   1.0.0
 */
final class RequestValidator {

	/**
	 * @var string
	 */
	private $action;

	/**
	 * @var Validator
	 */
	private $validator;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @since 1.0.0
	 *
	 * @param Nonce     $nonce     Nonce object.
	 * @param Validator $validator Optional. A nonce validator object. Defaults to null.
	 */
	public function __construct( Nonce $nonce, Validator $validator = null ) {

		$this->action = $nonce->action();

		$this->validator = $validator ?: new WPValidator();
	}

	/**
	 * Validates the nonce given in the current request.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether or not the nonce is valid.
	 */
	public function validate() {

		if ( empty( $_SERVER['REQUEST_METHOD'] ) ) {
			return false;
		}

		$superglobal = "_{$_SERVER['REQUEST_METHOD']}";
		if ( empty( ${$superglobal}[ $this->action ] ) ) {
			return false;
		}

		return $this->validator->validate( ${$superglobal}[ $this->action ], $this->action );
	}
}
