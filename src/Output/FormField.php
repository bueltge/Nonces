<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Output;

use Inpsyde\Nonces\Context;

/**
 * Provides access to the according (hidden) input element for a given nonce context.
 *
 * @package Inpsyde\Nonces\Output
 */
class FormField {

	/**
	 * Returns the input element for the given nonce context.
	 *
	 * @param Context $context Nonce context object.
	 *
	 * @return string
	 */
	public function get( Context $context ) {

		return wp_nonce_field( $context->get_action(), $context->get_name(), false, false );
	}

	/**
	 * Renders the input element for the given nonce context.
	 *
	 * @param Context $context Nonce context object.
	 *
	 * @return void
	 */
	public function render( Context $context ) {

		echo $this->get( $context );
	}
}
