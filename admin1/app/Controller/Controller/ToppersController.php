<?php

App::uses('AppController', 'Controller');

/**
 * Toppers Controller
 *
 * @property Topper $Topper
 */
class ToppersController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Topper->recursive = 0;
        $this->set('toppers', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Topper->exists($id)) {
            $this->Session->setFlash(__('Invalid topper'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Topper.' . $this->Topper->primaryKey => $id));
        $this->set('topper', $this->Topper->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Topper->create();
            if ($this->Topper->save($this->request->data)) {
                $this->Session->setFlash(__('The topper has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topper could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Topper->exists($id)) {
            $this->Session->setFlash(__('Invalid topper'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Topper->save($this->request->data)) {
                $this->Session->setFlash(__('The topper has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topper could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Topper.' . $this->Topper->primaryKey => $id));
            $this->request->data = $this->Topper->find('first', $options);
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
        $this->Topper->id = $id;
        if (!$this->Topper->exists()) {
            $this->Session->setFlash(__('Invalid topper'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Topper->delete()) {
            $this->Session->setFlash(__('Topper deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Topper was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Topper->recursive = 0;
        $this->set('toppers', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Topper->exists($id)) {
            $this->Session->setFlash(__('Invalid topper'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Topper.' . $this->Topper->primaryKey => $id));
        $this->set('topper', $this->Topper->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Topper->create();
            if ($this->Topper->save($this->request->data)) {
                $this->Session->setFlash(__('The topper has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topper could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Topper->exists($id)) {
            $this->Session->setFlash(__('Invalid topper'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Topper->save($this->request->data)) {
                $this->Session->setFlash(__('The topper has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topper could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Topper.' . $this->Topper->primaryKey => $id));
            $this->request->data = $this->Topper->find('first', $options);
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
        $this->Topper->id = $id;
        if (!$this->Topper->exists()) {
            $this->Session->setFlash(__('Invalid topper'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Topper->delete()) {
            $this->Session->setFlash(__('Topper deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Topper was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
