<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

/**
 * Class NonceRequestValidator
 *
 * @package Inpsyde\Nonces\Validator
 */
class NonceRequestValidator extends NonceValidator implements Validator {

	/**
	 * @var string
	 */
	private $name = '';

	/**
	 * @var string
	 */
	private $request_method = '';

	/**
	 * @var array
	 */
	private $allowed_request_methods = [
		'POST' => INPUT_POST,
		'GET'  => INPUT_GET
	];

	/**
	 * NonceRequestValidator constructor.
	 *
	 * @param array $options    array(
	 *                              'request_method' => String,     // Contains the Method "POST" or "GET" for usage in
	 *                                                              // filter_input() and testing the REQUEST_METHOD-type.
	 *                              'context'        => Context,    // Instance of the Context-class for validating the the
	 *                                                              // nonce in request by the given name.
	 *                          )
	 */
	public function __construct( array $options ) {

		if ( isset( $options[ 'request_method' ] ) ) {
			$this->request_method = $options[ 'request_method' ];
		}

		if ( isset( $options[ 'context' ] ) && is_a( $options[ 'context' ], '\Inpsyde\Nonces\Context' ) ) {
			/** @var \Inpsyde\Nonces\Context $context */
			$context    = $options[ 'context' ];
			$this->name = $context->get_name();

			parent::__construct( [ 'action' => $context->get_action() ] );
		}

	}

	/**
	 * Validates a given context and returns true on success or false on failure.
	 *
	 * @return bool true|false
	 */
	public function validate() {

		if ( ! isset( $_SERVER[ 'REQUEST_METHOD' ] ) || $_SERVER[ 'REQUEST_METHOD' ] !== $this->request_method ) {
			return FALSE;
		}

		if ( ! isset( $this->allowed_request_methods[ $this->request_method ] ) ) {
			return FALSE;
		}

		$input_type = $this->allowed_request_methods[ $this->request_method ];
		// assign nonce for re-usage in parent-class NonceValidator.
		$this->nonce = filter_input( $input_type, $this->name );

		return parent::validate();
	}
}