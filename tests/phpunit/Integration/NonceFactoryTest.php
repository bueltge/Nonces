<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Integration;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\NonceFactory as Testee;

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

		Monkey\Functions::when( 'sanitize_title_with_dashes' );

		$context = new Context( $action );

		$nonce_value = 'nonce';

		Monkey\Functions::expect( 'wp_create_nonce' )
			->with( $action )
			->andReturn( $nonce_value );

		$nonce = $testee->create( $context );

		$this->assertSame( $nonce_value, $nonce->get() );
	}
}
