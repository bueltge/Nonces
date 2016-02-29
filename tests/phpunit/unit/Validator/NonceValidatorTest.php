<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces\Validator;

use Brain\Monkey;
use Inpsyde\Nonces\Validator\NonceValidator as Testee;
use Inpsyde\Tests\Nonces\TestCase;

/**
 * Test case for the NonceValidator class.
 *
 * @package Inpsyde\Tests\Nonces\Validator
 */
class NonceValidatorTest extends TestCase {

	/**
	 * Test for the validate() method.
	 *
	 * @return void
	 */
	public function test_validate() {

		$testee = new Testee();

		Monkey\Functions::when( 'wp_verify_nonce' )->justReturn( true );

		$this->assertTrue( $testee->validate() );
	}
}
