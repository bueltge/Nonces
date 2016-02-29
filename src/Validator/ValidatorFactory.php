<?php

namespace Inpsyde\Nonces\Validator;

/**
 * Class ValidatorFactory
 *
 * @package Inpsyde\Nonces\Validator
 */
class ValidatorFactory {

	/**
	 * @param   string $class_name The name of the class. NonceValidator or NonceRequestValidator
	 * @param   array  $properties The properties for the constructor method of the class.
	 *
	 * @return Validator
	 */
	public function create( $class_name, array $properties = [ ] ) {

		$class_name = (string) $class_name;

		if ( $class_name === 'NonceValidator' || $class_name === 'NonceRequestValidator' ) {
			$class_name = __NAMESPACE__ . '\\' . $class_name;

			return new $class_name( $properties );
		}

		return new AlwaysFalseValidator();
	}
}