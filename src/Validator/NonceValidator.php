<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

/**
 * Class NonceValidator
 *
 * @package Inpsyde\Nonces\Validator
 */
class NonceValidator implements Validator {

	/***
	 * @var string
	 */
	protected $action = '';

	/**
	 * @var string
	 */
	protected $nonce = '';

	/**
	 * NonceValidator constructor.
	 *
	 * @param array $options    array(
	 *                              'action' => String,     // Name of the action for re-use in wp_verify_nonce.
	 *                              'nonce'  => String      // The actual nonce-value which has to be validated.
	 *                          )
	 */
	public function __construct( array $options ) {

		if ( isset( $options[ 'action' ] ) ) {
			$this->action = (string) $options[ 'action' ];
		}

		if ( isset( $options[ 'nonce' ] ) ) {
			$this->nonce = (string) $options[ 'nonce' ];
		}
	}

	/**
	 * Validates a given context and returns true on success or false on failure.
	 *
	 * @return bool true|false
	 */
	public function validate() {

		// wp_verify_nonce returns 1 or 2 on success and FALSE on failure.
		return (bool) wp_verify_nonce( $this->nonce, $this->action );
	}
}
