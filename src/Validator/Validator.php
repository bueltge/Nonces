<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

/**
 * Interface for all concrete Validator objects.
 *
 * @package Inpsyde\Nonces\Validator
 */
interface Validator {

	/**
	 * Validates a given nonce for a given action.
	 *
	 * @return bool
	 */
	public function validate();
}
