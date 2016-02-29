<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

/**
 * Factory for individual validator instances.
 *
 * @package Inpsyde\Nonces\Validator
 */
class ValidatorFactory {

	/**
	 * @var string[]
	 */
	private $classes = [
		'NonceValidator' => 'NonceValidator',
		'Nonce'          => 'NonceValidator',

		'NonceRequestValidator' => 'NonceRequestValidator',
		'NonceRequest'          => 'NonceRequestValidator',
		'RequestValidator'      => 'NonceRequestValidator',
		'Request'               => 'NonceRequestValidator',
	];

	/**
	 * Creates and returns a new validator instance of the given type.
	 *
	 * @param string $type       Validator type.
	 * @param array  $properties The validator's constructor arguments.
	 *
	 * @return Validator
	 */
	public function create( $type, array $properties = [] ) {

		if ( isset( $this->classes[ $type ] ) ) {
			$class = __NAMESPACE__ . '\\' . $this->classes[ $type ];

			return new $class( $properties );
		}

		return new NullValidator();
	}
}
