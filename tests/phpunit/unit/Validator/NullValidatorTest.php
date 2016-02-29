<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces\Validator;

use Brain\Monkey;
use Inpsyde\Nonces\Validator\NullValidator as Testee;
use Inpsyde\Tests\Nonces\TestCase;

/**
 * Test case for the NullValidator class.
 *
 * @package Inpsyde\Tests\Nonces\Validator
 */
class NullValidatorTest extends TestCase {

	/**
	 * Test for the validate() method.
	 *
	 * @return void
	 */
	public function test_validate() {

		$testee = new Testee();

		$this->assertFalse( $testee->validate() );
	}
}
