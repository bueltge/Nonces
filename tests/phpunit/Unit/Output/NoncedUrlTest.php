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

		$action = 'action';

		$name = 'name';

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->andReturn( $action )
			->shouldReceive( 'get_name' )
			->andReturn( $name )
			->getMock();

		$url = 'url';

		$nonced_url = 'nonced_url';

		Monkey\Functions::expect( 'wp_nonce_url' )
			->with( $url, $action, $name )
			->andReturn( $nonced_url );

		$this->assertSame( $nonced_url, $testee->get( $url, $context ) );
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

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->andReturn( $action )
			->shouldReceive( 'get_name' )
			->andReturn( $name )
			->getMock();

		$url = 'url';

		$nonced_url = 'nonced_url';

		Monkey\Functions::expect( 'wp_nonce_url' )
			->with( $url, $action, $name )
			->andReturn( $nonced_url );

		$this->expectOutputString( $nonced_url );

		$testee->render( $url, $context );
	}
}
