<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Nonce;

use Inpsyde\Nonces\Nonce;

/**
 * WordPress-specific nonce implementation.
 *
 * @package Inpsyde\Nonces\Nonce
 * @since   1.0.0
 */
final class WPNonce implements Nonce {

	/**
	 * @var string
	 */
	private $action;

	/**
	 * @var string
	 */
	private $nonce;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @since 1.0.0
	 *
	 * @param string $action Nonce action.
	 */
	public function __construct( $action ) {

		$this->action = (string) $action;

		$this->nonce = (string) wp_create_nonce( (string) $action );
	}

	/**
	 * Returns the nonce action.
	 *
	 * @since 1.0.0
	 *
	 * @return string Nonce action.
	 */
	public function action() {

		return $this->action;
	}

	/**
	 * Returns the nonce value.
	 *
	 * @since 1.0.0
	 *
	 * @return string Nonce value.
	 */
	public function __toString() {

		return $this->nonce;
	}
}
