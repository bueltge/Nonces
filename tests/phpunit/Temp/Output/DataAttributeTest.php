<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Unit\Output;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\Output\DataAttribute as Testee;
use Inpsyde\Nonces\Tests\Unit\TestCase;
use Mockery;

/**
 * Test case for the DataAttribute class.
 *
 * @package Inpsyde\Nonces\Tests\Unit\Output
 */
class DataAttributeTest extends TestCase {

	/**
	 * Test for the get() method.
	 *
	 * @return void
	 */
	public function test_get() {

		$testee = new Testee();

		$nonce = 'nonce';

		Monkey\Functions::when( 'wp_create_nonce' )
			->justReturn( $nonce );

		$name = 'name';

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->shouldReceive( 'get_name' )
			->andReturn( $name )
			->getMock();

		Monkey\Functions::when( 'esc_attr' )
			->returnArg();

		$this->assertSame( "data-$name=\"$nonce\"", $testee->get( $context ) );
	}

	/**
	 * Test for the render() method.
	 *
	 * @return void
	 */
	public function test_render() {

		$testee = new Testee();

		$nonce = 'nonce';

		Monkey\Functions::when( 'wp_create_nonce' )
			->justReturn( $nonce );

		$name = 'name';

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->shouldReceive( 'get_name' )
			->andReturn( $name )
			->getMock();

		Monkey\Functions::when( 'esc_attr' )
			->returnArg();

		$this->expectOutputString( "data-$name=\"$nonce\"" );

		$testee->render( $context );
	}
}
