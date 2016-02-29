<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Unit\Output;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\Output\NoncedUrl as Testee;
use Inpsyde\Nonces\Tests\Unit\TestCase;
use Mockery;

/**
 * Test case for the NoncedUrl class.
 *
 * @package Inpsyde\Nonces\Tests\Unit\Output
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

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->shouldReceive( 'get_name' )
			->getMock();

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

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->shouldReceive( 'get_name' )
			->getMock();

		$this->expectOutputString( $nonced_url );

		$testee->render( 'url', $context );
	}
}
