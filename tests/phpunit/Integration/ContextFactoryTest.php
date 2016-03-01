<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Integration;

use Brain\Monkey;
use Inpsyde\Nonces\ContextFactory as Testee;

/**
 * Test case for the ContextFactory class.
 *
 * @package Inpsyde\Test\Nonces
 */
class ContextFactoryTest extends TestCase {

	/**
	 * Test for the create() method.
	 *
	 * @dataProvider provide_create_data
	 *
	 * @param string $expected_action
	 * @param string $expected_name
	 * @param string $action
	 * @param string $name
	 *
	 * @return void
	 */
	public function test_create( $expected_action, $expected_name, $action, $name ) {

		$testee = new Testee();

		Monkey\Functions::when( 'sanitize_title_with_dashes' )
			->returnArg();

		$context = $testee->create( $action, $name );

		$this->assertSame( $expected_action, $context->get_action() );

		$this->assertSame( $expected_name, $context->get_name() );
	}

	/**
	 * Data provider for the text_create() method.
	 *
	 * @return array[]
	 */
	public function provide_create_data() {

		$action = 'action';

		$name = 'name';

		return [
			'empty_name' => [
				'expected_action' => $action,
				'expected_name'   => $action . '_nonce',
				'action'          => $action,
				'name'            => '',
			],
			'with_name'  => [
				'expected_action' => $action,
				'expected_name'   => $name,
				'action'          => $action,
				'name'            => $name,
			],
		];
	}
}
