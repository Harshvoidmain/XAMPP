<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP TitleComponent
 * @author Mubasshir
 */
class TitleComponent extends Component {

    public $components = array();
    public $controller = null;

    public function initialize(Controller $controller) {
        parent::initialize($controller);
        $this->controller = $controller;
    }

    public function startup(Controller $controller) {
        parent::startup($controller);
        $this->controller = $controller;
    }

    public function beforeRender(Controller $controller) {
        parent::beforeRender($controller);
        $this->controller = $controller;
    }

    public function shutdown(Controller $controller) {
        parent::shutdown($controller);
    }

    public function beforeRedirect(Controller $controller, $url, $status = null, $exit = true) {
        parent::beforeRedirect($controller, $url, $status, $exit);
    }

    public function handle($controllerName = NULL, $actionName = NULL, $table_comment = array(0 => array('TABLES' => array('table_comment' => '')))) {
        $module_name = Inflector::shc($controllerName);
        $module_description = '';
        if (!empty($table_comment[0]['TABLES']['table_comment']))
            $module_description = ucfirst($table_comment[0]['TABLES']['table_comment']);
        $this->controller->set(compact(array('module_name', 'module_description')));
    }

}
