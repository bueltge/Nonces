<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

class Context {

	/**
	 * Contains the action of Context.
	 *
	 * @var string $action
	 */
	protected $action;

	/**
	 * Contains the name of Context.
	 *
	 * @var string $name
	 */
	protected $name;

	/**
	 * Context constructor.
	 *
	 * @param string $action
	 * @param string $name
	 */
	public function __construct( $action, $name = '' ) {

		$this->action = (string) $action;

		$name = (string) $name;
		if ( $name === '' ) {
			$name = $this->action . '_nonce';
		}
		$this->name = sanitize_title_with_dashes( $name );
	}

	/**
	 * @return string $action
	 */
	public function get_action() {

		return $this->action;
	}

	/**
	 * @return string $name
	 */
	public function get_name() {

		return $this->name;
	}

}
