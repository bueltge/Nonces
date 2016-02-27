<?php

namespace Inpsyde\Nonces\Validator;

use Inpsyde\Nonces\Exception\InvalidArgumentException;
use Inpsyde\Nonces\Context;

/**
 * Class NonceRequestValidator
 *
 * @package Inpsyde\Nonces\Validator
 */
class NonceRequestValidator implements Validator {

	/**
	 * @var Context
	 */
	private $context;

	/**
	 * @var string
	 */
	private $method;

	/**
	 * @var array
	 */
	private $allowed_methods = [
		'POST' => INPUT_POST,
		'GET'  => INPUT_GET
	];

	/**
	 * NonceRequestValidator constructor.
	 *
	 * @param Context $context
	 * @param string  $method
	 */
	public function __construct( Context $context, $method ) {

		$method = strtoupper( (string) $method );
		if ( ! array_key_exists( $method, $this->allowed_methods ) ) {
			$msg = sprintf(
				'Invalid argument type method. <code>%s</code> given. Allowed types are: %s',
				$method,
				implode( ', ', $this->allowed_methods )
			);
			throw new InvalidArgumentException( $msg );
		}

		$this->context = $context;
		$this->method  = $method;
	}

	/**
	 * Validates a given context and returns true on success or false on failure.
	 *
	 * @return bool true|false
	 */
	public function validate() {

		if ( ! isset( $_SERVER[ 'REQUEST_METHOD' ] ) || $_SERVER[ 'REQUEST_METHOD' ] !== $this->method ) {
			return FALSE;
		}

		$input_type = $this->allowed_methods[ $this->method ];
		$nonce      = filter_input( $input_type, $this->context->get_name() );

		// wp_verify_nonce returns 1 or 2 on success and FALSE on failure.
		return ! ! wp_verify_nonce( $nonce, $this->context->get_action() );
	}
}