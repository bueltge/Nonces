<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Output;

use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\NonceFactory;

/**
 * Provides access to the according HTML data attribute string for a given nonce context.
 *
 * @package Inpsyde\Nonces\Output
 */
class DataAttribute {

	/**
	 * @var NonceFactory
	 */
	private $factory;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @param NonceFactory $factory Factory object.
	 */
	public function __construct( NonceFactory $factory ) {

		$this->factory = $factory;
	}

	/**
	 * Returns the HTML data attribute string for the given nonce context.
	 *
	 * @param Context $context Nonce context object.
	 *
	 * @return string
	 */
	public function get( Context $context ) {

		$nonce = $this->factory->create( $context );

		return 'data-' . esc_attr( $context->get_name() ) . '="' . esc_attr( $nonce->get() ) . '"';
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
