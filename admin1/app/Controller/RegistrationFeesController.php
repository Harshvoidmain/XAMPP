<?php

App::uses('AppController', 'Controller');

/**
 * RegistrationFees Controller
 *
 * @property RegistrationFee $RegistrationFee
 */
class RegistrationFeesController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->RegistrationFee->recursive = 0;
        $this->set('registrationFees', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->RegistrationFee->exists($id)) {
            $this->Session->setFlash(__('Invalid registrationFee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('RegistrationFee.' . $this->RegistrationFee->primaryKey => $id));
        $this->set('registrationFee', $this->RegistrationFee->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->RegistrationFee->create();
            if ($this->RegistrationFee->save($this->request->data)) {
                $this->Session->setFlash(__('The registrationFee has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The registrationFee could not be saved. Please, try again.'), 'flash_error');
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->RegistrationFee->exists($id)) {
            $this->Session->setFlash(__('Invalid registrationFee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->RegistrationFee->save($this->request->data)) {
                $this->Session->setFlash(__('The registrationFee has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The registrationFee could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('RegistrationFee.' . $this->RegistrationFee->primaryKey => $id));
            $this->request->data = $this->RegistrationFee->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->RegistrationFee->id = $id;
        if (!$this->RegistrationFee->exists()) {
            $this->Session->setFlash(__('Invalid registrationFee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->RegistrationFee->delete()) {
            $this->Session->setFlash(__('RegistrationFee deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('RegistrationFee was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->RegistrationFee->recursive = 0;
        $this->set('registrationFees', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->RegistrationFee->exists($id)) {
            $this->Session->setFlash(__('Invalid registrationFee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('RegistrationFee.' . $this->RegistrationFee->primaryKey => $id));
        $this->set('registrationFee', $this->RegistrationFee->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->RegistrationFee->create();
            if ($this->RegistrationFee->save($this->request->data)) {
                $this->Session->setFlash(__('The registrationFee has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The registrationFee could not be saved. Please, try again.'), 'flash_error');
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->RegistrationFee->exists($id)) {
            $this->Session->setFlash(__('Invalid registrationFee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->RegistrationFee->save($this->request->data)) {
                $this->Session->setFlash(__('The registrationFee has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The registrationFee could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('RegistrationFee.' . $this->RegistrationFee->primaryKey => $id));
            $this->request->data = $this->RegistrationFee->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->RegistrationFee->id = $id;
        if (!$this->RegistrationFee->exists()) {
            $this->Session->setFlash(__('Invalid registrationFee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->RegistrationFee->delete()) {
            $this->Session->setFlash(__('RegistrationFee deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('RegistrationFee was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
