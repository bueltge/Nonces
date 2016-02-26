<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces\Output;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\Nonce;
use Inpsyde\Nonces\NonceFactory;
use Inpsyde\Nonces\Output\DataAttribute as Testee;
use Inpsyde\Tests\Nonces\TestCase;
use Mockery;

/**
 * Test case for the DataAttribute class.
 *
 * @package Inpsyde\Tests\Nonces\Output
 */
class DataAttributeTest extends TestCase {

	/**
	 * Test for the get() method.
	 *
	 * @return void
	 */
	public function test_get() {

		$nonce_value = 'nonce_value';

		/** @var Nonce $nonce */
		$nonce = Mockery::mock( 'Inpsyde\Nonces\Nonce' )
			->shouldReceive( 'get' )
			->andReturn( $nonce_value )
			->getMock();

		/** @var NonceFactory $nonce_factory */
		$nonce_factory = Mockery::mock( 'Inpsyde\Nonces\NonceFactory' )
			->shouldReceive( 'create' )
			->andReturn( $nonce )
			->getMock();

		$testee = new Testee( $nonce_factory );

		$nonce_name = 'nonce_name';

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_name' )
			->andReturn( $nonce_name )
			->getMock();

		Monkey\Functions::when( 'esc_attr' )->returnArg();

		$data_attribute = "data-$nonce_name=\"$nonce_value\"";

		$this->assertSame( $data_attribute, $testee->get( $context ) );
	}

	/**
	 * Test for the render() method.
	 *
	 * @return void
	 */
	public function test_render() {

		$nonce_value = 'nonce';

		/** @var Nonce $nonce */
		$nonce = Mockery::mock( 'Inpsyde\Nonces\Nonce' )
			->shouldReceive( 'get' )
			->andReturn( $nonce_value )
			->getMock();

		/** @var NonceFactory $nonce_factory */
		$nonce_factory = Mockery::mock( 'Inpsyde\Nonces\NonceFactory' )
			->shouldReceive( 'create' )
			->andReturn( $nonce )
			->getMock();

		$testee = new Testee( $nonce_factory );

		$nonce_name = 'nonce_name';

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_name' )
			->andReturn( $nonce_name )
			->getMock();

		Monkey\Functions::when( 'esc_attr' )->returnArg();

		$data_attribute = "data-$nonce_name=\"$nonce_value\"";

		$this->expectOutputString( $data_attribute );

		$testee->render( $context );
	}
}
