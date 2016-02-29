<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces\Validator;

use Brain\Monkey;
use Inpsyde\Nonces\Context;
use Inpsyde\Nonces\Validator\NonceRequestValidator as Testee;
use Inpsyde\Tests\Nonces\TestCase;
use Mockery;

/**
 * Test case for the NonceRequestValidator class.
 *
 * @package Inpsyde\Tests\Nonces\Validator
 */
class NonceRequestValidatorTest extends TestCase {

	/**
	 * Test for the validate() method.
	 *
	 * @dataProvider provide_validate_data
	 *
	 * @param bool   $expected
	 * @param array  $properties
	 * @param string $request_method
	 *
	 * @return void
	 */
	public function test_validate( $expected, array $properties, $request_method ) {

		$_SERVER['REQUEST_METHOD'] = $request_method;

		$testee = new Testee( $properties );

		Monkey\Functions::when( 'wp_verify_nonce' )
			->justReturn( true );

		$this->assertSame( $expected, $testee->validate() );
	}

	/**
	 * Data provider for the test_validate() method.
	 *
	 * @return array[]
	 */
	public function provide_validate_data() {

		/** @var Context $context */
		$context = Mockery::mock( 'Inpsyde\Nonces\Context' )
			->shouldReceive( 'get_action' )
			->shouldReceive( 'get_name' )
			->getMock();

		return [
			'invalid_request_method' => [
				'expected'       => false,
				'properties'     => [
					'request_method' => 'invalid',
					'context'        => $context,
				],
				'request_method' => 'GET',
			],
			'fake_post_request'      => [
				'expected'       => false,
				'properties'     => [
					'request_method' => 'POST',
					'context'        => $context,
				],
				'request_method' => 'GET',
			],
			'fake_get_request'       => [
				'expected'       => false,
				'properties'     => [
					'request_method' => 'GET',
					'context'        => $context,
				],
				'request_method' => 'POST',
			],
			'invalid_context' => [
				'expected'       => false,
				'properties'     => [
					'request_method' => 'GET',
					'context'        => null,
				],
				'request_method' => 'GET',
			],
			'post_request'           => [
				'expected'       => true,
				'properties'     => [
					'request_method' => 'POST',
					'context'        => $context,
				],
				'request_method' => 'POST',
			],
			'get_request'            => [
				'expected'       => true,
				'properties'     => [
					'request_method' => 'GET',
					'context'        => $context,
				],
				'request_method' => 'GET',
			],
		];
	}
}
