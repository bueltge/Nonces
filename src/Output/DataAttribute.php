<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Output;

use Inpsyde\Nonces\Context;

/**
 * Provides access to the according HTML data attribute string for a given nonce context.
 *
 * @package Inpsyde\Nonces\Output
 */
class DataAttribute {

	/**
	 * Returns the HTML data attribute string for the given nonce context.
	 *
	 * @param Context $context Nonce context object.
	 *
	 * @return string
	 */
	public function get( Context $context ) {

		$nonce = wp_create_nonce( $context->get_action() );

		return 'data-' . esc_attr( $context->get_name() ) . '="' . esc_attr( $nonce ) . '"';
	}

	/**
	 * Renders the HTML data attribute string for the given nonce context.
	 *
	 * @param Context $context Nonce context object.
	 *
	 * @return void
	 */
	public function render( Context $context ) {

		echo $this->get( $context );
	}
}
