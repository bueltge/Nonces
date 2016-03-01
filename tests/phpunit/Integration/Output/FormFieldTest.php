<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Integration\Output;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\Output\FormField as Testee;
use Inpsyde\Nonces\Tests\Integration\TestCase;

/**
 * Test case for the FormField class.
 *
 * @package Inpsyde\Nonces\Tests\Integration\Output
 */
class FormFieldTest extends TestCase {

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

		$nonce_field = 'nonce_field';

		Monkey\Functions::expect( 'wp_nonce_field' )
			->with( $action, $name, false, false )
			->andReturn( $nonce_field );

		$this->assertSame( $nonce_field, $testee->get( $context ) );
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

		$nonce_field = 'nonce_field';

		Monkey\Functions::expect( 'wp_nonce_field' )
			->with( $action, $name, false, false )
			->andReturn( $nonce_field );

		$this->expectOutputString( $nonce_field );

		$testee->render( $context );
	}
}
