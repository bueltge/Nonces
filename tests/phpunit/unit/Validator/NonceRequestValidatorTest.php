<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces\Validator;

use Brain\Monkey;
use Inpsyde\Nonces\Validator\NonceRequestValidator as Testee;
use Inpsyde\Tests\Nonces\TestCase;

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
	 * @param string $request_method
	 *
	 * @return void
	 */
	public function test_validate( $expected, $request_method ) {

		$data = [ ];

		if ( $request_method ) {
			$data['request_method'] = $request_method;

			$_SERVER['REQUEST_METHOD'] = $request_method;
		}

		$testee = new Testee( $data );

		Monkey\Functions::when( 'wp_verify_nonce' )->justReturn( true );

		$this->assertSame( $expected, $testee->validate() );
	}

	/**
	 * Data provider for the test_validate() method.
	 *
	 * @return array[]
	 */
	public function provide_validate_data() {

		return [
			'invalid_request_method' => [
				'expected'       => false,
				'request_method' => 'invalid',
			],
			'POST_request'           => [
				'expected'       => true,
				'request_method' => 'POST',
			],
		];
	}
}
