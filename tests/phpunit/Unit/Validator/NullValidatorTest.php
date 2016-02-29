<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Unit\Validator;

use Brain\Monkey;
use Inpsyde\Nonces\Validator\NullValidator as Testee;
use Inpsyde\Nonces\Tests\Unit\TestCase;

/**
 * Test case for the NullValidator class.
 *
 * @package Inpsyde\Nonces\Tests\Unit\Validator
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
