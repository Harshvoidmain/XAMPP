<?php

App::uses('AppController', 'Controller');

/**
 * Instructions Controller
 *
 * @property Instruction $Instruction
 */
class InstructionsController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Instruction->recursive = 0;
        $this->set('instructions', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Instruction->exists($id)) {
            $this->Session->setFlash(__('Invalid instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Instruction.' . $this->Instruction->primaryKey => $id));
        $this->set('instruction', $this->Instruction->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Instruction->create();
            if ($this->Instruction->save($this->request->data)) {
                $this->Session->setFlash(__('The instruction has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The instruction could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Instruction->exists($id)) {
            $this->Session->setFlash(__('Invalid instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Instruction->save($this->request->data)) {
                $this->Session->setFlash(__('The instruction has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The instruction could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Instruction.' . $this->Instruction->primaryKey => $id));
            $this->request->data = $this->Instruction->find('first', $options);
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
        $this->Instruction->id = $id;
        if (!$this->Instruction->exists()) {
            $this->Session->setFlash(__('Invalid instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Instruction->delete()) {
            $this->Session->setFlash(__('Instruction deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Instruction was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Instruction->recursive = 0;
        $this->set('instructions', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Instruction->exists($id)) {
            $this->Session->setFlash(__('Invalid instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Instruction.' . $this->Instruction->primaryKey => $id));
        $this->set('instruction', $this->Instruction->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Instruction->create();
            if ($this->Instruction->save($this->request->data)) {
                $this->Session->setFlash(__('The instruction has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The instruction could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Instruction->exists($id)) {
            $this->Session->setFlash(__('Invalid instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Instruction->save($this->request->data)) {
                $this->Session->setFlash(__('The instruction has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The instruction could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Instruction.' . $this->Instruction->primaryKey => $id));
            $this->request->data = $this->Instruction->find('first', $options);
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
        $this->Instruction->id = $id;
        if (!$this->Instruction->exists()) {
            $this->Session->setFlash(__('Invalid instruction'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Instruction->delete()) {
            $this->Session->setFlash(__('Instruction deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Instruction was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
