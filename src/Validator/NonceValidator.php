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
	private $action = '';

	/**
	 * @var string
	 */
	private $nonce = '';

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @param array $properties Validator properties (i.e., action and nonce value).
	 */
	public function __construct( array $properties = [] ) {

		if ( isset( $properties['action'] ) ) {
			$this->action = (string) $properties['action'];
		}

		if ( isset( $properties['nonce'] ) ) {
			$this->nonce = (string) $properties['nonce'];
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
