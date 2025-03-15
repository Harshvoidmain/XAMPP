<?php

App::uses('AppController', 'Controller');

/**
 * ImportantDates Controller
 *
 * @property ImportantDate $ImportantDate
 */
class ImportantDatesController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->ImportantDate->recursive = 0;
        $this->set('importantDates', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->ImportantDate->exists($id)) {
            $this->Session->setFlash(__('Invalid importantDate'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('ImportantDate.' . $this->ImportantDate->primaryKey => $id));
        $this->set('importantDate', $this->ImportantDate->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->ImportantDate->create();
            if ($this->ImportantDate->save($this->request->data)) {
                $this->Session->setFlash(__('The importantDate has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The importantDate could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->ImportantDate->exists($id)) {
            $this->Session->setFlash(__('Invalid importantDate'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ImportantDate->save($this->request->data)) {
                $this->Session->setFlash(__('The importantDate has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The importantDate could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('ImportantDate.' . $this->ImportantDate->primaryKey => $id));
            $this->request->data = $this->ImportantDate->find('first', $options);
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
        $this->ImportantDate->id = $id;
        if (!$this->ImportantDate->exists()) {
            $this->Session->setFlash(__('Invalid importantDate'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->ImportantDate->delete()) {
            $this->Session->setFlash(__('ImportantDate deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('ImportantDate was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->ImportantDate->recursive = 0;
        $this->set('importantDates', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ImportantDate->exists($id)) {
            $this->Session->setFlash(__('Invalid importantDate'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('ImportantDate.' . $this->ImportantDate->primaryKey => $id));
        $this->set('importantDate', $this->ImportantDate->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ImportantDate->create();
            if ($this->ImportantDate->save($this->request->data)) {
                $this->Session->setFlash(__('The importantDate has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The importantDate could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->ImportantDate->exists($id)) {
            $this->Session->setFlash(__('Invalid importantDate'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ImportantDate->save($this->request->data)) {
                $this->Session->setFlash(__('The importantDate has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The importantDate could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('ImportantDate.' . $this->ImportantDate->primaryKey => $id));
            $this->request->data = $this->ImportantDate->find('first', $options);
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
        $this->ImportantDate->id = $id;
        if (!$this->ImportantDate->exists()) {
            $this->Session->setFlash(__('Invalid importantDate'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->ImportantDate->delete()) {
            $this->Session->setFlash(__('ImportantDate deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('ImportantDate was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
