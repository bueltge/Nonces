<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Unit;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\NonceFactory as Testee;
use Mockery;

/**
 * Test case for the NonceFactory class.
 *
 * @package Inpsyde\Test\Nonces
 */
class NonceFactoryTest extends TestCase {

	/**
	 * Test for the create() method.
	 *
	 * @return void
	 */
	public function test_create() {

		$testee = new Testee();

		$action = 'action';

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->andReturn( $action )
			->getMock();

		Monkey\Functions::expect( 'wp_create_nonce' )
			->with( $action );

		$this->assertInstanceOf( 'Inpsyde\Nonces\Nonce', $testee->create( $context ) );
	}
}
