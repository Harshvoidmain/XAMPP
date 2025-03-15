<?php
/**
 * PlacementFixture
 *
 */
class PlacementFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'branch' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'number_of_companies_visited' => array('type' => 'integer', 'null' => false, 'default' => null),
		'number_of_students_placed' => array('type' => 'integer', 'null' => false, 'default' => null),
		'max_salary' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'created_timestamp' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'branch' => 'Lorem ipsum dolor sit amet',
			'number_of_companies_visited' => 1,
			'number_of_students_placed' => 1,
			'max_salary' => 1,
			'created_by' => 1,
			'created_timestamp' => 1412142343
		),
	);

}
