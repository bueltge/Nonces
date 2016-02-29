<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Integration\Output;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\Output\NoncedUrl as Testee;
use Inpsyde\Nonces\Tests\Integration\TestCase;

/**
 * Test case for the NoncedUrl class.
 *
 * @package Inpsyde\Nonces\Tests\Integration\Output
 */
class NoncedUrlTest extends TestCase {

	/**
	 * Test for the get() method.
	 *
	 * @return void
	 */
	public function test_get() {

		$testee = new Testee();

		$nonced_url = 'nonced_url';

		Monkey\Functions::when( 'wp_nonce_url' )
			->justReturn( $nonced_url );

		$context = new Context( 'action' );

		$this->assertSame( $nonced_url, $testee->get( 'url', $context ) );
	}

	/**
	 * Test for the render() method.
	 *
	 * @return void
	 */
	public function test_render() {

		$testee = new Testee();

		$nonced_url = 'nonced_url';

		Monkey\Functions::when( 'wp_nonce_url' )
			->justReturn( $nonced_url );

		$context = new Context( 'action' );

		$this->expectOutputString( $nonced_url );

		$testee->render( 'url', $context );
	}
}
