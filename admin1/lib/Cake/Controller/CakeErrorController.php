<?php

/**
 * Error Handling Controller
 *
 * Controller used by ErrorHandler to render error views.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');

/**
 * Error Handling Controller
 *
 * Controller used by ErrorHandler to render error views.
 *
 * @package       Cake.Controller
 */
class CakeErrorController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'CakeError';

    /**
     * Uses Property
     *
     * @var array
     */
    public $uses = array();

    /**
     * __construct
     *
     * @param CakeRequest $request
     * @param CakeResponse $response
     */
    public function __construct($request = null, $response = null) {
        parent::__construct($request, $response);
        $this->constructClasses();
        if (count(Router::extensions()) &&
                !$this->Components->attached('RequestHandler')
        ) {
            $this->RequestHandler = $this->Components->load('RequestHandler');
        }
        if ($this->Components->enabled('Auth')) {
            $this->Components->disable('Auth');
        }
        if ($this->Components->enabled('Security')) {
            $this->Components->disable('Security');
        }
        $this->_set(array('cacheAction' => false, 'viewPath' => 'Errors'));
    }

}
