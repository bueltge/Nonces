<?php

namespace Inpsyde\Nonces\Validator;

interface Validator {

	/**
	 * Validates a given context and returns true on success or false on failure.
	 *
	 * @return bool true|false
	 */
	public function validate();
}