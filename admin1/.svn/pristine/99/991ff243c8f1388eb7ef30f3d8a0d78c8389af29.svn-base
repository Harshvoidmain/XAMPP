<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array('Auth', 'Session', 'Common');
    var $helpers = array('Html', 'Form', 'Session', 'BreadCrumb', 'Common', 'App');

    public function beforeFilter() {
        parent::beforeFilter();
//        mail('vrushali.chaudhari@eiosys.com', 'Testmail', 'This is a test mail. Ignore it!!!');
//        pe(error_get_last());
        $userType = $this->Session->read('UserType');
        $user = $this->Session->read('Auth.User');
    }

    public function beforeRender() {
        parent::beforeRender();
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
        }
        if ($this->name == 'CakeError') {
            $this->layout = 'site';
        }
        if (!empty($this->uses)) {
            foreach ($this->uses as $modelName) {
                if ($modelName === 'AppModel')
                    continue;
                if (App::import("Model", $modelName)) {
                    $model = new $modelName();
                    $shema = $model->schema();
                    foreach ($shema as $var => $field) {
                        if (strpos($field['type'], 'enum') === FALSE) {
                            if (strpos(strtolower($field['type']), 'set') === FALSE) {
                                continue;
                            }
                        } else if (strpos($field['type'], 'set') === FALSE) {
                            if (strpos(strtolower($field['type']), 'enum') === FALSE) {
                                continue;
                            }
                        }
                        preg_match_all("/\'([^\']+)\'/", $field['type'], $strEnum);
                        $strEnum[1] = array_merge(array('' => ''), $strEnum[1]);
                        if (is_array($strEnum[1])) {
                            $varName = Inflector::camelize(Inflector::pluralize($var));
                            $varName[0] = strtolower($varName[0]);
                            $this->set($varName, array_combine($strEnum[1], $strEnum[1]));
                        }
                    }
                }
            }
        }
    }

}
