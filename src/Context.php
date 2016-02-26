<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Context data object for a nonce.
 *
 * @package Inpsyde\Nonces
 */
class Context {

	/**
	 * @var string
	 */
	private $action;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @param string $action The action which the nonce is for.
	 * @param string $name   The name reference for the nonce (e.g., for the individual output classes).
	 */
	public function __construct( $action, $name = '' ) {

		$this->action = (string) $action;

		$name = (string) $name;
		if ( '' === $name ) {
			$name = $this->action . '_nonce';
		}
		$this->name = sanitize_title_with_dashes( $name );
	}

	/**
	 * Returns the nonce action.
	 *
	 * @return string
	 */
	public function get_action() {

		return $this->action;
	}

	/**
	 * Returns the name reference for the nonce.
	 *
	 * @return string
	 */
	public function get_name() {

		return $this->name;
	}
}
