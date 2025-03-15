<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP BreadCrumbHelper
 * @author Mubasshir
 */
class BreadCrumbHelper extends AppHelper {

    public $helpers = array('Html');

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    public function beforeRender($viewFile) {

    }

    public function afterRender($viewFile) {

    }

    public function beforeLayout($viewLayout) {

    }

    public function afterLayout($viewLayout) {

    }

    public function addCrumbs($controllerName = '', $actionName = '') {
        $this->Html->addCrumb(Inflector::shc($controllerName), "/$controllerName");
        if (!in_array($actionName, array('index', 'admin_index', 'consumer_index'))) {
            $this->Html->addCrumb(Inflector::shc($actionName));
        }
    }

}
