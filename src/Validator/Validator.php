<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Validator;

/**
 * Interface for all validator implementations.
 *
 * @package Inpsyde\Nonces\Validator
 */
interface Validator {

	/**
	 * Validates a given nonce for a given action.
	 *
	 * @return bool Whether or not the nonce is valid.
	 */
	public function validate();
}
