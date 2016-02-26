<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\Nonce;

/**
 * Class NonceArgumentValidator
 *
 * @package Inpsyde\Nonces\Validator
 */
class NonceArgumentValidator implements Validator {

	/***
	 * @var Context
	 */
	private $context;

	/**
	 * @var Nonce
	 */
	private $nonce;

	/**
	 * NonceArgumentValidator constructor.
	 *
	 * @param Context $context Contains the Context for validating the action.
	 * @param Nonce   $nonce   Contains the nonce-value which has to be validated.
	 */
	public function __construct( Context $context, Nonce $nonce ) {

		$this->context = $context;
		$this->nonce   = $nonce;
	}

	/**
	 * Validates a given context and returns true on success or false on failure.
	 *
	 * @return bool true|false
	 */
	public function validate() {

		// wp_verify_nonce returns 1 or 2 on success and FALSE on failure.
		return ! ! wp_verify_nonce( $this->nonce->get(), $this->context->get_action() );
	}
}
