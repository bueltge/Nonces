<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

use Inpsyde\Nonces\Context;

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
	 * @param array $properties Validator properties (i.e., context and nonce value).
	 */
	public function __construct( array $properties = [] ) {

		if ( isset( $properties['context'] ) && $properties['context'] instanceof Context ) {
			/** @var Context $context */
			$context = $properties['context'];

			$this->action = $context->get_action();
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
