<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Inpsyde\Nonces\ContextFactory as Testee;
use PHPUnit_Framework_TestCase;

class ContextFactoryTest extends PHPUnit_Framework_TestCase {

	public function test_basiccreate() {

		$testee = new Testee();

		$this->assertInstanceOf( 'Inpsyde\Nonces\Context', $testee->create( 'Meine Action' ) );
		$this->assertInstanceOf( 'Inpsyde\Nonces\Context', $testee->create( 'Meine Action', 'Mein Name' ) );
	}
}