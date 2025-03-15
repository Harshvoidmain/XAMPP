<?php

App::uses('AppController', 'Controller');

/**
 * Publications Controller
 *
 * @property Publication $Publication
 */
class PublicationsController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Publication->recursive = 0;
        $this->set('publications', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Publication->exists($id)) {
            $this->Session->setFlash(__('Invalid publication'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
        $this->set('publication', $this->Publication->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Publication->create();
            if ($this->Publication->save($this->request->data)) {
                $this->Session->setFlash(__('The publication has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The publication could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Publication->exists($id)) {
            $this->Session->setFlash(__('Invalid publication'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Publication->save($this->request->data)) {
                $this->Session->setFlash(__('The publication has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The publication could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
            $this->request->data = $this->Publication->find('first', $options);
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
        $this->Publication->id = $id;
        if (!$this->Publication->exists()) {
            $this->Session->setFlash(__('Invalid publication'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Publication->delete()) {
            $this->Session->setFlash(__('Publication deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Publication was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Publication->recursive = 0;
        $this->set('publications', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Publication->exists($id)) {
            $this->Session->setFlash(__('Invalid publication'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
        $this->set('publication', $this->Publication->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Publication->create();
            if ($this->Publication->save($this->request->data)) {
                $this->Session->setFlash(__('The publication has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The publication could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Publication->exists($id)) {
            $this->Session->setFlash(__('Invalid publication'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Publication->save($this->request->data)) {
                $this->Session->setFlash(__('The publication has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The publication could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
            $this->request->data = $this->Publication->find('first', $options);
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
        $this->Publication->id = $id;
        if (!$this->Publication->exists()) {
            $this->Session->setFlash(__('Invalid publication'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Publication->delete()) {
            $this->Session->setFlash(__('Publication deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Publication was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
