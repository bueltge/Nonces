<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

/**
 * Context object for a nonce.
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
	 * @param string $name   Optional. The name reference for the nonce (e.g., for output). Defaults to empty string.
	 */
	public function __construct( $action, $name = '' ) {

		$this->action = (string) $action;

		$name = (string) $name;
		if ( '' === $name ) {
			$name = "{$this->action}_nonce";
		}
		$this->name = sanitize_title_with_dashes( $name );
	}

	/**
	 * Returns the nonce action.
	 *
	 * @return string Nonce action
	 */
	public function get_action() {

		return $this->action;
	}

	/**
	 * Returns the name reference for the nonce.
	 *
	 * @return string Name reference.
	 */
	public function get_name() {

		return $this->name;
	}
}
