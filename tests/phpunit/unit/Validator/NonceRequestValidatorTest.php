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
	 * @param object $context
	 *
	 * @return void
	 */
	public function test_validate( $expected, $request_method, $context ) {

		$data = [];
		if ( $request_method ) {
			$data['request_method'] = $request_method;
		}
		if ( $context ) {
			$data['context'] = $context;
		}

		$testee = new Testee( $data );

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
				'context'        => null,
			],
		];
	}
}
