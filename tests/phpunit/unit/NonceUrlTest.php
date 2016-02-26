<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Mockery;
use Inpsyde\Nonces\NonceUrl as Testee;
use PHPUnit_Framework_TestCase;

class NonceUrlTest extends PHPUnit_Framework_TestCase {

	public function test_basic() {

		$testee = new Testee();

		$url    = 'http://www.inpsyde.com/';
		$action = 'my-action';
		$name   = 'my-name';

		Monkey\Functions::expect( 'wp_nonce_url' )
		                ->andReturn( $url . $action . $name );

		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
		                  ->shouldReceive( 'get_action' )
		                  ->andReturn( $action )
		                  ->shouldReceive( 'get_name' )
		                  ->andReturn( $name )
		                  ->getMock();

		$this->assertSame(
			$url . $action . $name,
			$testee->add_query_arg( $url, $context )
		);
	}
}
