<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Inpsyde\Nonces\Exception\InvalidArgumentException;
use Mockery;
use Inpsyde\Nonces\Validator\NonceRequestValidator as Testee;

/**
 * Tests for the Context class.
 *
 * @package Inpsyde\Tests\Nonces
 */
class NonceRequestValidator extends TestCase {

	/**
	 * Testing the Exception by an invalid constructor argument.
	 */
	public function test_exception() {

		$this->expectException( InvalidArgumentException::class );

		/** @var \Inpsyde\Nonces\Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
		                  ->shouldReceive( 'get_action' )
		                  ->shouldReceive( 'get_name' )
		                  ->getMock();
		new Testee( $context, 'invalid_request_method' );
	}

	/**
	 * Test for request validator by the given dataset.
	 *
	 * @dataProvider provide_post_data
	 *
	 * @param $method
	 * @param $name
	 * @param $request_name
	 * @param $nonce_return
	 * @param $expected
	 *
	 * @return void
	 */
	public function test_post_request( $method, $name, $request_name, $nonce_return, $expected ) {

		$_SERVER[ 'REQUEST_METHOD' ] = $method;
		$_POST[ $request_name ]      = 'nonce';

		Monkey\Functions::expect( 'wp_verify_nonce' )
		                ->andReturn( $nonce_return );

		/** @var \Inpsyde\Nonces\Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
		                  ->shouldReceive( 'get_action' )
		                  ->andReturn( 'action' )
		                  ->shouldReceive( 'get_name' )
		                  ->andReturn( $name )
		                  ->getMock();

		$testee = new Testee( $context, 'POST' );
		$this->assertSame( $expected, $testee->validate() );
	}

	public function provide_post_data() {

		return [
			'valid_data'                   => [
				'method'       => 'POST',
				'name'         => 'the_name',
				'request_name' => 'the_name',
				'nonce_return' => TRUE,
				'expected'     => TRUE
			],
			'invalid_nonce_value'          => [
				'method'       => 'POST',
				'name'         => 'the_name',
				'request_name' => 'the_name',
				'nonce_return' => FALSE,
				'expected'     => FALSE
			],
			'invalid_nonce_not_in_request' => [
				'method'       => 'POST',
				'name'         => 'the_name',
				'request_name' => 'other_name',
				'nonce_return' => FALSE,
				'expected'     => FALSE
			],
			'invalid_request_type'         => [
				'method'       => 'GET',
				'name'         => 'the_name',
				'request_name' => 'the_name',
				'nonce_return' => TRUE,
				'expected'     => FALSE
			],
		];
	}
}
