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
class ContactsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('contact_us');
    }

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Contacts';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();


    public function contact_us() {
        $this->layout = 'site';
        
//        if ($this->request->is('post')) {
//            $this->Contact->create();
//            if ($this->Contact->save($this->request->data)) {
//                $this->Session->setFlash(__('The reviewer has been saved'), 'flash_success');
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The reviewer could not be saved. Please, try again.'), 'flash_error');
//            }
//        }
    }
    public function admin_index() {
        $this->Keynote->recursive = 0;
        $this->set('keynotes', $this->paginate());
    }
    
    
    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
   
    /**
     * admin_add method
     *
     * @return void
     */
    

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
 
    /**
     * index method
     *
     * @return void
     */
  

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
   

    /**
     * add method
     *
     * @return void
     */
    

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
  
}
