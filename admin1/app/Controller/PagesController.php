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

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('home', 'memory', 'registration', 'opinion_box', 'placement_home', 'professional_item', 'photo_item', 'photo_item2', 'redirectportal', 'principal_page', 'nirf');
    }

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
        $latest_news = $this->LatestNews->find('all', array('limit' => 30,
            'order' => 'LatestNews.ID DESC',
            'conditions' => array('LatestNews.active_till >=' => date('Y-m-d H:i:s'))));
        $this->set(compact('latest_news'));

        $this->loadModel('LatestNews');
        $ln = $this->LatestNews->find('all', array(
            'limit' => 7,
            'order' => 'LatestNews.ID DESC',
            'conditions' => array('LatestNews.active_till >=' => date('Y-m-d H:i:s'))));
        $this->set(compact('ln'));

        $this->loadModel('Company');
        $techc = $this->Company->Find('all', array(
            'limit' => 12,
            'conditions' => array('Company.displayhome' => 1, 'Company.type' => 'Technical')));
        $this->set(compact('techc'));
        $finc = $this->Company->Find('all', array(
            'limit' => 12,
            'conditions' => array('Company.displayhome' => 1, 'Company.type' => 'Financial')));
        $this->set(compact('finc'));
    }

    

    public function add() {
        $this->layout = 'false';
        $this->loadModel('Contact');
        if ($this->request->is('post')) {
            $this->request->data['Contact']['name'] = $this->request->data['contact']['name'];
            $this->request->data['Contact']['email'] = $this->request->data['contact']['email'];
            $this->request->data['Contact']['phone'] = $this->request->data['contact']['phone'];
            $this->request->data['Contact']['institute'] = $this->request->data['contact']['institute'];
            $this->request->data['Contact']['message'] = $this->request->data['contact']['message'];
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The conatct has been saved'), 'flash_success');
                $this->redirect(array('controller' => 'Pages', 'action' => 'contact_us'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'), 'flash_error');
            }
        }
    }

    public function academics_under_graduate() {
        $this->layout = 'site';
    }

    public function ug_extc() {
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

    public function alumni_home() {
        $this->layout = 'site';
    }

    public function professional_item() {
        $this->layout = 'site';
    }

    public function photo_item() {
        $this->layout = 'site';
    }

    public function photo_item2() {
        $this->layout = 'site';
    }

    public function memory() {
        $this->layout = 'site';
        $this->loadModel('Memory');
        $memory = $this->Memory->find('all');
        $this->set(compact('memory'));
    }

    public function registration() {
        $this->layout = 'site';
//        $this->loadModel('Registration');
//        $register = $this->Registration->find('all');
//        $this->set(compact('register'));
    }

    public function opinion_box() {
        $this->layout = 'site';
    }

    public function nirf() {
        $this->loadModel('NirfPage');
        $this->layout = 'site';
        $nhs = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Higher Studies')
        ));
        $this->set(compact('nhs'));
        $ncp = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Consultancy Projects')
        ));
        $this->set(compact('ncp'));
        $nep = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Entrepreneurship')
        ));
        $this->set(compact('nep'));
        $npf = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Patents Filed')
        ));
        $this->set(compact('npf'));
        $npgp = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'PG Placement')
        ));
        $this->set(compact('npgp'));
        $nsrpc = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Sponsored Research Projects Computer')
        ));
        $this->set(compact('nsrpc'));
        $nsrpe = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Sponsored Research Projects Electrical')
        ));
        $this->set(compact('nsrpe'));
        $nsrpx = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Sponsored Research Projects EXTC')
        ));
        $this->set(compact('nsrpx'));
        $nsrpi = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Sponsored Research Projects IT')
        ));
        $this->set(compact('nsrpi'));
        $nsrpm = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Sponsored Research Projects Mechanical')
        ));
        $this->set(compact('nsrpm'));
        $ntuad = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'Top University Admission Details')
        ));
        $this->set(compact('ntuad'));
        $nugp = $this->NirfPage->find('first', array(
            'conditions' => array('NirfPage.subject' => 'UG Placement')
        ));
        $this->set(compact('nugp'));
    }

    public function placement_home() {
        $this->layout = 'site';
        $this->loadModel('PlacementHome');
        $placement_home = $this->PlacementHome->find('all');
        $this->loadModel('Company');
        $companies = $this->Company->find('all');
        $this->set(compact('placement_home', 'companies'));
    }

    public function professional_body() {
        $this->layout = 'site';
        $this->loadModel('ProfessionalBody');
        $professional_body = $this->ProfessionalBody->find('all');
    }

    public function redirectportal() {
        $this->layout = 'site';
    }

}
