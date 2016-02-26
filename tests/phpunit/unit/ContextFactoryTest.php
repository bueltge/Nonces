<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Inpsyde\Nonces\ContextFactory as Testee;
use PHPUnit_Framework_TestCase;

class ContextFactoryTest extends PHPUnit_Framework_TestCase {

	protected function tearUp() {

		Monkey\Functions::when( 'sanitize_title_with_dashes' );
	}

	public function test_create_basic() {

		$testee = new Testee();
		$this->assertInstanceOf( 'Inpsyde\Nonces\Context', $testee->create( 'Meine Action', 'Mein Name' ) );
	}

	public function test_create_with_empty_name() {

		$testee = new Testee();
		$this->assertInstanceOf( 'Inpsyde\Nonces\Context', $testee->create( 'Meine Action' ) );
	}
}