<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Unit\Validator;

use Brain\Monkey;
use Inpsyde\Nonces\Validator\NonceValidator as Testee;
use Inpsyde\Nonces\Tests\Unit\TestCase;

/**
 * Test case for the NonceValidator class.
 *
 * @package Inpsyde\Nonces\Tests\Unit\Validator
 */
class NonceValidatorTest extends TestCase {

	/**
	 * Test for the validate() method.
	 *
	 * @return void
	 */
	public function test_validate() {

		$testee = new Testee();

		Monkey\Functions::when( 'wp_verify_nonce' )
			->justReturn( true );

		$this->assertTrue( $testee->validate() );
	}
}
