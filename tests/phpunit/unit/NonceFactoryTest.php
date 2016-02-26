<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Test\Nonces;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\NonceFactory as Testee;
use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * Test for the nonce factory.
 *
 * @package Inpsyde\Test\Nonces
 */
class NonceFactoryTest extends PHPUnit_Framework_TestCase {

	/**
	 * Test for the create() method.
	 *
	 * @return void
	 */
	public function test_create() {

		$testee = new Testee();

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->getMock();

		Monkey\Functions::when( 'wp_create_nonce' );

		$this->assertInstanceOf( 'Inpsyde\Nonces\Nonce', $testee->create( $context ) );
	}
}
