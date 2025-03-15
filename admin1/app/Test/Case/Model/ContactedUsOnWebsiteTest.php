<?php
App::uses('ContactedUsOnWebsite', 'Model');

/**
 * ContactedUsOnWebsite Test Case
 *
 */
class ContactedUsOnWebsiteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contacted_us_on_website'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContactedUsOnWebsite = ClassRegistry::init('ContactedUsOnWebsite');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContactedUsOnWebsite);

		parent::tearDown();
	}

}
