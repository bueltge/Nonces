<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\Nonce;

/**
 * Validates a given nonce for a given action.
 *
 * @package Inpsyde\Nonces\Validator
 */
class NonceValidator implements Validator {

	/**
	 * @var string
	 */
	private $action;

	/**
	 * @var string
	 */
	private $nonce;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @param Nonce|string $nonce  Nonce object or value.
	 * @param string       $action The action which the nonce is for.
	 */
	public function __construct( $nonce, $action ) {

		$this->nonce = (string) $nonce;

		$this->action = (string) $action;
	}

	/**
	 * Creates and returns a new nonce validator instance for the given nonce object or value, and nonce context.
	 *
	 * @param Nonce|string $nonce   Nonce object or value.
	 * @param Context      $context Nonce context object.
	 *
	 * @return static Nonce validator instance.
	 */
	public static function from_context( $nonce, Context $context ) {

		return new static( $nonce, $context->get_action() );
	}

	/**
	 * Validates a given nonce for a given action.
	 *
	 * @return bool Whether or not the nonce is valid.
	 */
	public function validate() {

		return (bool) wp_verify_nonce( $this->nonce, $this->action );
	}
}
