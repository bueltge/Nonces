<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

use Inpsyde\Nonces\Context;

/**
 * Validates the nonce given in a request for the given action.
 *
 * @package Inpsyde\Nonces\Validator
 */
class NonceRequestValidator extends NonceValidator {

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
	private $name = '';

	/**
	 * @var string
	 */
	private $request_method = '';

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @param array $properties Validator properties (i.e., request method and nonce context).
	 */
	public function __construct( array $properties = [] ) {

		if ( isset( $properties['request_method'] ) ) {
			$this->request_method = $properties['request_method'];
		}

		if ( isset( $properties['context'] ) && $properties['context'] instanceof Context ) {
			/** @var Context $context */
			$context = $properties['context'];

			$this->name = $context->get_name();

			parent::__construct( [ 'context' => $context ] );
		}
	}

	/**
	 * Validates the nonce given in a request for the given action.
	 *
	 * @return bool
	 */
	public function validate() {

		if ( ! isset( $_SERVER['REQUEST_METHOD'] ) || $_SERVER['REQUEST_METHOD'] !== $this->request_method ) {
			return false;
		}

		if ( ! isset( $this->allowed_request_methods[ $this->request_method ] ) ) {
			return false;
		}

		$this->nonce = filter_input( $this->allowed_request_methods[ $this->request_method ], $this->name );

		return parent::validate();
	}
}
