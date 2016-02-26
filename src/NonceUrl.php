<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces;

class NonceUrl {

	/**
	 * Returns the URL with the nonce parameter added.
	 *
	 * @param string  $url
	 * @param Context $context
	 *
	 * @return string
	 */
	public function add_query_arg( $url, Context $context ) {
		return wp_nonce_url( $url, $context->get_action(), $context->get_name() );
	}
}