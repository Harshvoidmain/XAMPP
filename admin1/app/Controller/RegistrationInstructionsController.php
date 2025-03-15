<?php

App::uses('AppController', 'Controller');

/**
 * RegistrationInstructions Controller
 *
 * @property RegistrationInstruction $RegistrationInstruction
 */
class RegistrationInstructionsController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->RegistrationInstruction->recursive = 0;
        $this->set('registrationInstructions', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->RegistrationInstruction->exists($id)) {
            $this->Session->setFlash(__('Invalid registration Instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('RegistrationInstruction.' . $this->RegistrationInstruction->primaryKey => $id));
        $this->set('registrationInstruction', $this->RegistrationInstruction->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->RegistrationInstruction->create();
            if ($this->RegistrationInstruction->save($this->request->data)) {
                $this->Session->setFlash(__('The registration Instruction has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The registration Instruction could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->RegistrationInstruction->exists($id)) {
            $this->Session->setFlash(__('Invalid registration Instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->RegistrationInstruction->save($this->request->data)) {
                $this->Session->setFlash(__('The registration Instruction has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The registration Instruction could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('RegistrationInstruction.' . $this->RegistrationInstruction->primaryKey => $id));
            $this->request->data = $this->RegistrationInstruction->find('first', $options);
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
        $this->RegistrationInstruction->id = $id;
        if (!$this->RegistrationInstruction->exists()) {
            $this->Session->setFlash(__('Invalid registration Instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->RegistrationInstruction->delete()) {
            $this->Session->setFlash(__('Registration Instruction deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Registration Instruction was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->RegistrationInstruction->recursive = 0;
        $this->set('registrationInstructions', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->RegistrationInstruction->exists($id)) {
            $this->Session->setFlash(__('Invalid registration Instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('RegistrationInstruction.' . $this->RegistrationInstruction->primaryKey => $id));
        $this->set('registrationInstruction', $this->RegistrationInstruction->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->RegistrationInstruction->create();
            if ($this->RegistrationInstruction->save($this->request->data)) {
                $this->Session->setFlash(__('The registration Instruction has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The registration Instruction could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->RegistrationInstruction->exists($id)) {
            $this->Session->setFlash(__('Invalid registration Instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->RegistrationInstruction->save($this->request->data)) {
                $this->Session->setFlash(__('The registration Instruction has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The registration Instruction could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('RegistrationInstruction.' . $this->RegistrationInstruction->primaryKey => $id));
            $this->request->data = $this->RegistrationInstruction->find('first', $options);
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
        $this->RegistrationInstruction->id = $id;
        if (!$this->RegistrationInstruction->exists()) {
            $this->Session->setFlash(__('Invalid registration Instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->RegistrationInstruction->delete()) {
            $this->Session->setFlash(__('Registration Instruction deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Registration Instruction was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
