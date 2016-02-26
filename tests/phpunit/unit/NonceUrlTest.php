<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\NonceUrl as Testee;
use Inpsyde\Tests\Nonces\TestCase;
use Mockery;

/**
 * Test case for the NonceUrl class.
 *
 * @package Inpsyde\Tests\Nonces
 */
class NonceUrlTest extends TestCase {

	/**
	 * Test for the add_query_arg() method.
	 *
	 * @return void
	 */
	public function test_add_query_arg() {

		$testee = new Testee();

		$nonce_url = 'nonce_url';

		Monkey\Functions::when( 'wp_nonce_url' )->justReturn( $nonce_url );

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->shouldReceive( 'get_name' )
			->getMock();

		$this->assertSame( $nonce_url, $testee->add_query_arg( 'url', $context ) );
	}
}
