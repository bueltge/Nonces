<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Integration;

use Brain\Monkey;
use PHPUnit_Framework_TestCase;

/**
 * Base test case that takes care of Monkey.
 *
 * @package Inpsyde\Nonces\Tests\Integration\TestCase
 */
abstract class TestCase extends PHPUnit_Framework_TestCase {

	/**
	 * Sets up the environment.
	 *
	 * @return void
	 */
	protected function setUp() {

		parent::setUp();
		Monkey::setUp();
	}

	/**
	 * Tears down the environment.
	 *
	 * @return void
	 */
	protected function tearDown() {

		Monkey::tearDown();
		parent::tearDown();
	}
}
