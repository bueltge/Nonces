<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces\Validator;

use Brain\Monkey;
use Inpsyde\Nonces\Validator\ValidatorFactory as Testee;
use Inpsyde\Tests\Nonces\TestCase;

/**
 * Test case for the ValidatorFactory class.
 *
 * @package Inpsyde\Tests\Nonces\Validator
 */
class ValidatorFactoryTest extends TestCase {

	/**
	 * Test for the create() method.
	 *
	 * @dataProvider provider_create
	 *
	 * @param string $expected
	 * @param string $class_name
	 *
	 * @return void
	 */
	public function test_create( $expected, $class_name ) {

		$testee = new Testee();
		$this->assertInstanceOf( $expected, $testee->create( $class_name ) );
	}

	/**
	 *
	 * Data provider for the test_create() method.
	 *
	 * @return array[]
	 */
	public function provider_create() {

		$ns = 'Inpsyde\\Nonces\\Validator\\';

		return [
			'nonce_validator'          => [
				'expected'   => $ns . 'NonceValidator',
				'class_name' => 'NonceValidator'
			],
			'nonce_request_validator'  => [
				'expected'   => $ns . 'NonceRequestValidator',
				'class_name' => 'NonceRequestValidator'
			],
			'always_false_validator_1' => [
				'expected'   => $ns . 'AlwaysFalseValidator',
				'class_name' => 'AlwaysFalseValidator'
			],
			'always_false_validator_2' => [
				'expected'   => $ns . 'AlwaysFalseValidator',
				'class_name' => ''
			]
		];

	}
}
