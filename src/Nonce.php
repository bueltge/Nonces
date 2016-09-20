<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Interface for all nonce implementations.
 *
 * @package Inpsyde\Nonces
 * @since   1.0.0
 */
interface Nonce {

	/**
	 * Returns the nonce action.
	 *
	 * @since 1.0.0
	 *
	 * @return string Nonce action.
	 */
	public function action();

	/**
	 * Returns the nonce value.
	 *
	 * @since 1.0.0
	 *
	 * @return string Nonce value.
	 */
	public function __toString();
}
