<?php

App::uses('AppModel', 'Model');

/**
 * CommitteeMember Model
 *
 * @property Department $Department
 */
class CommitteeMember extends AppModel {

    /**
     * ValidationEngine rules
     *
     * @var array
     */
    public $validationEngine = array(
    );

    /**CommitteeMember
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'committee_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'designation' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'department' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
          //  ),
        ),
        'institute' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
        ),
        'role' => array(
            //'notempty' => array(
              //  'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
        ),

    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'OrganizingCommittee' => array(
            'className' => 'OrganizingCommittee',
            'foreignKey' => 'organizing_committee_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
