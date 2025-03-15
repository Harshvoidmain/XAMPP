<?php
App::uses('Placement', 'Model');

/**
 * Placement Test Case
 *
 */
class PlacementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.placement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Placement = ClassRegistry::init('Placement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Placement);

		parent::tearDown();
	}

}
