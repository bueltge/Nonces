<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Integration\Output;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\Output\DataAttribute as Testee;
use Inpsyde\Nonces\Tests\Integration\TestCase;

/**
 * Test case for the DataAttribute class.
 *
 * @package Inpsyde\Nonces\Tests\Integration\Output
 */
class DataAttributeTest extends TestCase {

	/**
	 * Test for the get() method.
	 *
	 * @return void
	 */
	public function test_get() {

		$testee = new Testee();

		$action = 'action';

		$name = 'name';

		Monkey\Functions::when( 'sanitize_title_with_dashes' )
			->returnArg();

		$context = new Context( $action, $name );

		$nonce = 'nonce';

		Monkey\Functions::expect( 'wp_create_nonce' )
			->with( $action )
			->andReturn( $nonce );

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

		$action = 'action';

		$name = 'name';

		Monkey\Functions::when( 'sanitize_title_with_dashes' )
			->returnArg();

		$context = new Context( $action, $name );

		$nonce = 'nonce';

		Monkey\Functions::expect( 'wp_create_nonce' )
			->with( $action )
			->andReturn( $nonce );

		Monkey\Functions::when( 'esc_attr' )
			->returnArg();

		$this->expectOutputString( "data-$name=\"$nonce\"" );

		$testee->render( $context );
	}
}
