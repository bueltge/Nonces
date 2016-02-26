<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Inpsyde\Nonces\ContextFactory as Testee;

/**
 * Test for the context factory.
 *
 * @package Inpsyde\Test\Nonces
 */
class ContextFactoryTest extends TestCase\MonkeyTestCase {

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
