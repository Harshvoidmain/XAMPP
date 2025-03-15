<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Pages';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    public function home() {
        $this->layout = 'site';
        $this->loadModel('LatestNews');
        $latest_news = $this->LatestNews->find('all', array(
            'conditions' => array('LatestNews.active_till >=' => date('Y-m-d H:i:s'))));
        $this->set(compact('latest_news'));
        $this->loadModel('Topper');
        $general_topper = $this->Topper->find('all', array(
            'conditions' => array(
                'Topper.type' => 'General'
                )));
        $computer_topper = $this->Topper->find('all', array(
            'conditions' => array(
                'Topper.type' => 'Computer'
                )));
        $extc_topper = $this->Topper->find('all', array(
            'conditions' => array(
                'Topper.type' => 'EXTC'
                )));
        $electrical_topper = $this->Topper->find('all', array(
            'conditions' => array(
                'Topper.type' => 'Electrical'
                )));
        $mechanical_topper = $this->Topper->find('all', array(
            'conditions' => array(
                'Topper.type' => 'Mechanical'
                )));
        $it_topper = $this->Topper->find('all', array(
            'conditions' => array(
                'Topper.type' => 'IT'
                )));
        $this->loadModel('Fetopper');
        $fe_topper = $this->Fetopper->find('all');
        $this->loadModel('SuccessStory');
        $success_stories = $this->SuccessStory->find('all');
        $this->loadModel('Placement');
        $placement = $this->Placement->find('all');
        $this->loadModel('Winner');
        $winner = $this->Winner->find('all');
        $this->loadModel('SuccessStory');
        $success_story = $this->SuccessStory->find('all');
        $this->set(compact('general_topper', 'computer_topper', 'extc_topper', 'electrical_topper', 'mechanical_topper', 'it_topper', 'placement', 'winner', 'success_story', 'success_stories', 'fe_topper'));
    }

    public function academics_under_graduate() {
        $this->layout = 'site';
    }

    public function academics_post_graduate() {
        $this->layout = 'site';
    }

    public function academics_phd() {
        $this->layout = 'site';
    }

    public function exam_cell_under_graduate() {
        $this->layout = 'site';
    }

    public function exam_cell_post_graduate() {
        $this->layout = 'site';
    }

    public function exam_cell_phd() {
        $this->layout = 'site';
    }

    public function admission_under_graduate() {
        $this->layout = 'site';
    }

    public function admission_post_graduate() {
        $this->layout = 'site';
    }

    public function admission_phd() {
        $this->layout = 'site';
    }

    public function library() {
        $this->layout = 'site';
    }

    public function gymnasium() {
        $this->layout = 'site';
    }

    public function hostel() {
        $this->layout = 'site';
    }

    public function swimming_pool() {
        $this->layout = 'site';
    }

    public function medical_centre() {
        $this->layout = 'site';
    }

    public function playground() {
        $this->layout = 'site';
    }

    public function canteen() {
        $this->layout = 'site';
    }

}
