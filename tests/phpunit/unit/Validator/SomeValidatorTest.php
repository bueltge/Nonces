<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Inpsyde\Nonces\Validator\SomeValidator as Testee;
use PHPUnit_Framework_TestCase;

class SomeValidatorTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {

		parent::setUp();
		Monkey::setUpWP();
	}

	protected function tearDown() {

		Monkey::tearDownWP();
		parent::tearDown();
	}
}
