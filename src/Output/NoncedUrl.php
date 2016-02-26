<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Output;

use Inpsyde\Nonces\Context;

/**
 * Provides access to the according URL with the query argument for a given nonce context.
 *
 * @package Inpsyde\Nonces\Output
 */
class NoncedUrl {

	/**
	 * Returns the given URL with the query argument for the given nonce context.
	 *
	 * @param string  $url     The current URL.
	 * @param Context $context The nonce context object.
	 *
	 * @return string
	 */
	public function get( $url, Context $context ) {

		return wp_nonce_url( (string) $url, $context->get_action(), $context->get_name() );
	}

	/**
	 * Renders the given URL with the query argument for the given nonce context.
	 *
	 * @param string  $url     The current URL.
	 * @param Context $context The nonce context object.
	 *
	 * @return void
	 */
	public function render( $url, Context $context ) {

		echo $this->get( $url, $context );
	}
}
