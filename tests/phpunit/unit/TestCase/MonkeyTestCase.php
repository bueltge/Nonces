<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces\TestCase;

use Brain\Monkey;
use PHPUnit_Framework_TestCase;

class MonkeyTestCase extends PHPUnit_Framework_TestCase {

	protected function setUp() {

		parent::setUp();
		Monkey::setUp();
	}

	protected function tearDown() {

		Monkey::tearDown();
		parent::tearDown();
	}
}
