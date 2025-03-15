<?php

App::uses('AppController', 'Controller');

/**
 * Keynotes Controller
 *
 * @property Keynote $Keynote
 */
class KeynotesController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
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
    public function admin_view($id = null) {
        if (!$this->Keynote->exists($id)) {
            $this->Session->setFlash(__('Invalid keynote'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Keynote.' . $this->Keynote->primaryKey => $id));
        $this->set('keynote', $this->Keynote->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Keynote->create();
            if ($this->Keynote->save($this->request->data)) {
                $this->Session->setFlash(__('The keynote has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The keynote could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Keynote->exists($id)) {
            $this->Session->setFlash(__('Invalid keynote'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Keynote->save($this->request->data)) {
                $this->Session->setFlash(__('The keynote has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The keynote could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Keynote.' . $this->Keynote->primaryKey => $id));
            $this->request->data = $this->Keynote->find('first', $options);
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
        $this->Keynote->id = $id;
        if (!$this->Keynote->exists()) {
            $this->Session->setFlash(__('Invalid keynote'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Keynote->delete()) {
            $this->Session->setFlash(__('Keynote deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Keynote was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Keynote->recursive = 0;
        $this->set('keynotes', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Keynote->exists($id)) {
            $this->Session->setFlash(__('Invalid keynote'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Keynote.' . $this->Keynote->primaryKey => $id));
        $this->set('keynote', $this->Keynote->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Keynote->create();
            if ($this->Keynote->save($this->request->data)) {
                $this->Session->setFlash(__('The keynote has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The keynote could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Keynote->exists($id)) {
            $this->Session->setFlash(__('Invalid keynote'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Keynote->save($this->request->data)) {
                $this->Session->setFlash(__('The keynote has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The keynote could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Keynote.' . $this->Keynote->primaryKey => $id));
            $this->request->data = $this->Keynote->find('first', $options);
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
        $this->Keynote->id = $id;
        if (!$this->Keynote->exists()) {
            $this->Session->setFlash(__('Invalid keynote'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Keynote->delete()) {
            $this->Session->setFlash(__('Keynote deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Keynote was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
