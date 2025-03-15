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
class PeoplesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Peoples';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('keynote_speakers','reviewers_panel','advisory_committee','organizing_committee','committees');
    }

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    public function keynote_speakers() {
        $this->layout = 'site';

        $this->loadModel('Keynote');
        $keynotespeakers = $this->Keynote->Find('all', array(
            'order' => 'Keynote.sr_no',
        ));
        $this->set(compact('keynotespeakers'));

    }

    public function reviewers_panel() {
        $this->layout = 'site';

        $this->loadModel('Reviewer');
        $reviewers = $this->Reviewer->find('all', array(
            'order' => 'Reviewer.sr_no',
        ));
        $this->set(compact('reviewers'));
    }

    public function advisory_committee() {
        $this->layout = "site";

        $this->loadModel('AdvisoryCommittee');
        $committees = $this->AdvisoryCommittee->find('all', array(
            'order' => 'AdvisoryCommittee.sr_no',
        ));
        $this->set(compact('committees'));
    }

    public function organizing_committee() {
        $this->layout = 'site';

        $this->loadModel('OrganizingCommittee');
        $lists = $this->OrganizingCommittee->find('all',array(
            'order' => 'OrganizingCommittee.sr_no'
        ));
        $this->set(compact('lists'));

        $this->loadModel('OrganizingCommittee');
        $depts = $this->OrganizingCommittee->find('first', array(
             'order' => 'OrganizingCommittee.sr_no'
        ));

        if (empty($depts)) {
            $this->Session->setFlash('Committee Not Found', 'flash_error');
            $this->redirect($this->referer());
        }
        $this->loadModel('CommitteeMember');
        $abts = $this->CommitteeMember->find('all',array(
          'order' => 'CommitteeMember.sr_no'
        ));
        //pe($abts);

        if (empty($abts)) {
            $this->Session->setFlash('About page Not Found', 'flash_error');
            $this->redirect($this->referer());
        }
        $this->set(compact('depts', 'abts'));
    }

    public function committees($id = null) {
        $this->layout = 'site';
        $this->loadModel('OrganizingCommittee');
        $lists = $this->OrganizingCommittee->find('all',array(
            'order' => 'OrganizingCommittee.sr_no'
        ));
        $this->set(compact('lists'));

        $department = $this->OrganizingCommittee->find('first', array(
            'conditions' => array('OrganizingCommittee.id LIKE' => '%' . $id . '%'),
            'recursive' => -1
                ));

        if (empty($department)) {
            $this->Session->setFlash('Committee Not Found', 'flash_error');
            $this->redirect($this->referer());
        }
        $this->loadModel('CommitteeMember');
        $about = $this->CommitteeMember->find('all', array(
            'conditions' => array('CommitteeMember.organizing_committee_id' => $department['OrganizingCommittee']['id']),
            'order' => 'CommitteeMember.sr_no',
            'recursive' => -1
                ));

        if (empty($about)) {
            $this->Session->setFlash('About page Not Found', 'flash_error');
            $this->redirect($this->referer());
        }
        $this->set(compact('department', 'about', 'id'));
    }


}
