<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Output;

use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\NonceFactory;

/**
 * Outputs the data attribute for ajax requests.
 *
 * @package Inpsyde\Nonces\Output
 */
class DataAttribute {

	/**
	 * @var NonceFactory
	 */
	private $factory;

	/**
	 * DataAttribute constructor.
	 *
	 * @param NonceFactory $factory
	 */
	public function __construct( NonceFactory $factory ) {
		$this->factory = $factory;
	}

	/**
	 * Returns data attribute with nonce.
	 *
	 * @param Context      $context
	 * @param NonceFactory $factory
	 *
	 * @return string
	 */
	public function get( Context $context ) {
		$name = esc_attr( $context->get_name() );
		$nonce = $this->factory->create( $context );
		return 'data-' . $name . '="' . esc_attr( $nonce->get() ) . '"';
	}

	/**
	 * Echoes the get function.
	 *
	 * @param Context      $context
	 * @param NonceFactory $factory
	 */
	public function render( Context $context ) {
		echo $this->get( $context );
	}

}
