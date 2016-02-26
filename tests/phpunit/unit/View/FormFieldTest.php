<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Inpsyde\Nonces\Nonce\Context as Testee;
use PHPUnit_Framework_TestCase;

class ContextTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {

		parent::setUp();
		Monkey::setUpWP();
	}

	protected function tearDown() {

		Monkey::tearDownWP();
		parent::tearDown();
	}
}
