<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Mockery;
use Inpsyde\Nonces\Validator\NonceRequestValidator as Testee;

/**
 * Tests for the Context class.
 *
 * @package Inpsyde\Tests\Nonces
 */
class NonceRequestValidator extends TestCase\MonkeyTestCase {

	/**
	 * Basic test for validation a POST-Request.
	 *
	 * @return void
	 */
	public function test_post_request() {

		$method = 'POST';
		$action = 'action';
		$name   = 'name';
		$nonce  = '123';

		$_SERVER[ 'REQUEST_METHOD' ] = $method;
		$_POST[ $name ]              = $nonce;

		Monkey\Functions::expect( 'wp_verify_nonce' )
		                ->andReturn( TRUE );

		/** @var \Inpsyde\Nonces\Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
		                  ->shouldReceive( 'get_action' )
		                  ->andReturn( $action )
		                  ->shouldReceive( 'get_name' )
		                  ->andReturn( $name )
		                  ->getMock();

		$testee = new Testee( $context, $method );
		$this->assertTrue( $testee->validate() );
	}

}
