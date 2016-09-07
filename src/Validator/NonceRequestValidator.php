<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

use Inpsyde\Nonces\Context;

/**
 * Validates the nonce given in a request for the given action.
 *
 * @package Inpsyde\Nonces\Validator
 */
class NonceRequestValidator implements Validator {

	/**
	 * @var int[]
	 */
	private $allowed_request_methods = [
		'POST' => INPUT_POST,
		'GET'  => INPUT_GET,
	];

	/**
	 * @var string
	 */
	private $nonce_action;

	/**
	 * @var string
	 */
	private $nonce_name;

	/**
	 * @var string
	 */
	private $request_method = '';

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @param string         $request_method          The request method the validator is designed for.
	 * @param Context|string $nonce_context_or_action Nonce context object, or nonce action.
	 * @param string         $nonce_name              Optional. The name reference for the nonce (e.g., for output).
	 *                                                Defaults to empty string.
	 */
	public function __construct( $request_method, $nonce_context_or_action, $nonce_name = '' ) {

		$this->request_method = (string) $request_method;

		$context = $nonce_context_or_action instanceof Context
			? $nonce_context_or_action
			: new Context( $nonce_context_or_action, $nonce_name );

		$this->nonce_action = $context->get_action();

		$this->nonce_name = $nonce_name
			? (string) $nonce_name
			: $context->get_name();
	}

	/**
	 * Creates and returns a new nonce request validator instance for the given request method and nonce context.
	 *
	 * @param string  $request_method The request method the validator is designed for.
	 * @param Context $context        Nonce context object.
	 *
	 * @return static Nonce instance.
	 */
	public static function from_context( $request_method, Context $context ) {

		return new static( $request_method, $context );
	}

	/**
	 * Validates a nonce given in the current request.
	 *
	 * @return bool Whether or not the nonce is valid.
	 */
	public function validate() {

		if ( ! isset( $_SERVER['REQUEST_METHOD'] ) || $_SERVER['REQUEST_METHOD'] !== $this->request_method ) {
			return false;
		}

		if ( ! isset( $this->allowed_request_methods[ $this->request_method ] ) ) {
			return false;
		}

		$nonce = filter_input( $this->allowed_request_methods[ $this->request_method ], $this->nonce_name );

		return (bool) wp_verify_nonce( $nonce, $this->nonce_action );
	}
}
