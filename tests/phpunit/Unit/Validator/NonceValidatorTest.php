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

		$action = 'action';

		$nonce = 'nonce';

		$testee = new Testee( compact( 'action', 'nonce' ) );

		Monkey\Functions::expect( 'wp_verify_nonce' )
			->with( $nonce, $action )
			->andReturn( true );

		$this->assertTrue( $testee->validate() );
	}
}
