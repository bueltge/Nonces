<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

/**
 * Validates a given nonce for a given action.
 *
 * @package Inpsyde\Nonces\Validator
 */
class NonceValidator implements Validator {

	/**
	 * @var string
	 */
	protected $action = '';

	/**
	 * @var string
	 */
	protected $nonce = '';

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @param array $data Validator data (i.e., action and nonce value).
	 */
	public function __construct( array $data = [] ) {

		if ( isset( $data['action'] ) ) {
			$this->action = (string) $data['action'];
		}

		if ( isset( $data['nonce'] ) ) {
			$this->nonce = (string) $data['nonce'];
		}
	}

	/**
	 * Validates a given nonce for a given action.
	 *
	 * @return bool
	 */
	public function validate() {

		return (bool) wp_verify_nonce( $this->nonce, $this->action );
	}
}
