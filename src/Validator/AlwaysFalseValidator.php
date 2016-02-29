<?php

namespace Inpsyde\Nonces\Validator;

/**
 * Returns always false on validation.
 *
 * @package Inpsyde\Nonces
 */
class AlwaysFalseValidator implements Validator {

	/**
	 * Validates a given nonce for a given action.
	 *
	 * @return bool
	 */
	public function validate() {

		return FALSE;
	}
}