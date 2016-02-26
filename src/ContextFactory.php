<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

class ContextFactory {

	/**
	 * Creates a new Context instance.
	 *
	 * @param string $action
	 * @param string $name
	 *
	 * @return Context
	 */
	public function create( $action, $name = '' ) {

		return new Context( $action, $name );
	}
}