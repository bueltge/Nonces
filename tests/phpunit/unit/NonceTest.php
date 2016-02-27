<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Inpsyde\Nonces\Nonce as Testee;

/**
 * Test case for the Nonce class.
 *
 * @package Inpsyde\Test\Nonces
 */
class NonceTest extends TestCase {

	/**
	 * Test for the get() method.
	 *
	 * @return void
	 */
	public function test_get() {

		$nonce = 'nonce';

		$testee = new Testee( $nonce );

		$this->assertSame( $nonce, $testee->get() );
	}
}
