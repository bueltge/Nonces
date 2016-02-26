<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

class NonceUrl {

	/**
	 * Returns the given URL with a nonce parameter added.
	 *
	 * @param string  $url     The current URL.
	 * @param Context $context The nonce context data object.
	 *
	 * @return string
	 */
	public function add_query_arg( $url, Context $context ) {

		return wp_nonce_url( (string) $url, $context->get_action(), $context->get_name() );
	}
}
