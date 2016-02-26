<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Inpsyde\Nonces\Context as Testee;
use PHPUnit_Framework_TestCase;

class ContextTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {

		parent::setUp();
		Monkey::setUpWP();
		Monkey\Functions::when('sanitize_title_with_dashes');
	}

	protected function tearDown() {

		Monkey::tearDownWP();
		parent::tearDown();
	}

	public function test_basic() {
		$expected_action = 'Meine Action';
		$expected_name = 'Mein Name';
		$testee = new Testee( $expected_action, $expected_name );

		$this->assertEquals( $expected_action, $testee->get_action() );
		$this->assertEquals( $expected_name, $testee->get_name() );
	}

	public function test_emptyname() {
		$testee = new Testee( 'Meine Action' );

		$this->assertEquals( 'meine-action_nonce', $testee->get_name() );
	}
}
