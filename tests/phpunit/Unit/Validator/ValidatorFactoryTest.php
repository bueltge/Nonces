<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Unit\Validator;

use Brain\Monkey;
use Inpsyde\Nonces\Validator\ValidatorFactory as Testee;
use Inpsyde\Nonces\Tests\Unit\TestCase;

/**
 * Test case for the ValidatorFactory class.
 *
 * @package Inpsyde\Nonces\Tests\Unit\Validator
 */
class ValidatorFactoryTest extends TestCase {

	/**
	 * Test for the create() method.
	 *
	 * @dataProvider provide_create_data
	 *
	 * @param string $expected
	 * @param string $type
	 *
	 * @return void
	 */
	public function test_create( $expected, $type ) {

		$testee = new Testee();

		$this->assertInstanceOf( $expected, $testee->create( $type ) );
	}

	/**
	 * Data provider for the test_create() method.
	 *
	 * @return array[]
	 */
	public function provide_create_data() {

		$namespace = 'Inpsyde\\Nonces\\Validator\\';

		return [
			'nonce_validator'         => [
				'expected' => $namespace . 'NonceValidator',
				'type'     => 'NonceValidator',
			],
			'nonce_request_validator' => [
				'expected' => $namespace . 'NonceRequestValidator',
				'type'     => 'NonceRequestValidator',
			],
			'invalid_validator'       => [
				'expected' => $namespace . 'NullValidator',
				'type'     => 'InvalidValidator',
			],
		];
	}
}
