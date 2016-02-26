<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Mockery;
use Inpsyde\Nonces\NonceUrl as Testee;
use PHPUnit_Framework_TestCase;

class NonceUrlTest extends PHPUnit_Framework_TestCase {

	public function test_basic() {

		$testee = new Testee();

		Monkey\Functions::when( 'wp_nonce_url' );
		Monkey\Functions::expect( 'wp_create_nonce' )
		                ->andReturn( '123' );

		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
		                  ->shouldReceive( 'get_action' )
		                  ->andReturn( 'Meine Action' )
		                  ->shouldReceive( 'get_name' )
		                  ->andReturn( 'nonce' )
		                  ->getMock();

		$this->assertEquals(
			'http://inpsyde.com/?nonce=123',
			$testee->add_query_arg( 'http://inpsyde.com', $context )
		);
	}
}
