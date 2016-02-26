<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Tests\Nonces;

use Brain\Monkey;
use Inpsyde\Nonces\Context as Testee;
use PHPUnit_Framework_TestCase;

class ContextTest extends PHPUnit_Framework_TestCase {

	/**
	 * @param $input_action
	 * @param $expected_action
	 * @param $input_name
	 * @param $expected_name
	 *
	 * @dataProvider testBasicDataProvider
	 */
	public function test_basic( $input_action, $expected_action, $input_name, $expected_name ) {

		Monkey\Functions::when( '\sanitize_title_with_dashes' );

		$testee = new Testee( $input_action, $input_name );

		$this->assertSame( $expected_action, $testee->get_action() );
		$this->assertSame( $expected_name, $testee->get_name() );
	}

	/**
	 * Returns the test-data for test_basic() in following format:
	 *
	 *      - input action
	 *      - expected action result
	 *      - input name
	 *      - expected name result
	 */
	public function basic_dataprovider() {

		return array(
			array( 'Meine Action', 'meine-action', 'Mein Name', 'mein-name' ),
			array( 'Meine Action', 'meine-action', '', 'meine-action_nonce' ),
		);
	}

}
