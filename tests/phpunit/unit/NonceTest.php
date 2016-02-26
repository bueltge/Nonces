<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Test\Nonces;

use Inpsyde\Nonces\Nonce as Testee;
use PHPUnit_Framework_TestCase;

/**
 * Test for the nonce model.
 *
 * @package Inpsyde\Test\Nonces
 */
class NonceTest extends PHPUnit_Framework_TestCase {

	/**
	 * Test for the get() method.
	 *
	 * @return void
	 */
	public function test_get() {

		$testee = new Testee( $nonce = 'nonce' );
		$this->assertSame( $nonce, $testee->get() );
	}
}
