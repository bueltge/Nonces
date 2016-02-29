<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Unit;

use Brain\Monkey;
use Inpsyde\Nonces\ContextFactory as Testee;

/**
 * Test case for the ContextFactory class.
 *
 * @package Inpsyde\Test\Nonces
 */
class ContextFactoryTest extends TestCase {

	/**
	 * Test for the create() method.
	 *
	 * @return void
	 */
	public function test_create() {

		Monkey\Functions::when( 'sanitize_title_with_dashes' );

		$testee = new Testee();

		$this->assertInstanceOf( 'Inpsyde\Nonces\Context', $testee->create( 'action' ) );
	}
}
