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
		return 'data-' . $context->get_name() . '="' . (string)$this->factory->create( $context ) . '"';
	}

	/**
	 * Echoes the get function.
	 *
	 * @param Context      $context
	 * @param NonceFactory $factory
	 */
	public function render( Context $context ) {
		echo $this->get( $context, $this->factory );
	}

}
