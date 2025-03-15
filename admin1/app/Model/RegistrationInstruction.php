<?php

App::uses('AppModel', 'Model');

/**
 * Committee Model
 *
 */
class RegistrationInstruction extends AppModel {

    /**
     * ValidationEngine rules
     *
     * @var array
     */
    public $validationEngine = array(
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'instruction' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        
        
        
    );

}


