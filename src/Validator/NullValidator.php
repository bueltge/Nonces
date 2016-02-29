<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

/**
 * Null representation of a validator object.
 *
 * @package Inpsyde\Nonces\Validator
 */
class NullValidator implements Validator {

	/**
	 * Validates a given nonce for a given action.
	 *
	 * @return bool
	 */
	public function validate() {

		return false;
	}
}
