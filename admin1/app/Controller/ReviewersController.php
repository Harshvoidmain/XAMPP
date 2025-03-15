<?php

App::uses('AppController', 'Controller');

/**
 * Reviewers Controller
 *
 * @property Reviewer $Reviewer
 */
class ReviewersController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Reviewer->recursive = 0;
        $this->set('reviewers', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Reviewer->exists($id)) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Reviewer.' . $this->Reviewer->primaryKey => $id));
        $this->set('reviewer', $this->Reviewer->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Reviewer->create();
            if ($this->Reviewer->save($this->request->data)) {
                $this->Session->setFlash(__('The reviewer has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The reviewer could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Reviewer->exists($id)) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Reviewer->save($this->request->data)) {
                $this->Session->setFlash(__('The reviewer has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The reviewer could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Reviewer.' . $this->Reviewer->primaryKey => $id));
            $this->request->data = $this->Reviewer->find('first', $options);
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
        $this->Reviewer->id = $id;
        if (!$this->Reviewer->exists()) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Reviewer->delete()) {
            $this->Session->setFlash(__('Reviewer deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Reviewer was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Reviewer->recursive = 0;
        $this->set('reviewers', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Reviewer->exists($id)) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Reviewer.' . $this->Reviewer->primaryKey => $id));
        $this->set('reviewer', $this->Reviewer->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Reviewer->create();
            if ($this->Reviewer->save($this->request->data)) {
                $this->Session->setFlash(__('The reviewer has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The reviewer could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Reviewer->exists($id)) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Reviewer->save($this->request->data)) {
                $this->Session->setFlash(__('The reviewer has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The reviewer could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Reviewer.' . $this->Reviewer->primaryKey => $id));
            $this->request->data = $this->Reviewer->find('first', $options);
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
        $this->Reviewer->id = $id;
        if (!$this->Reviewer->exists()) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Reviewer->delete()) {
            $this->Session->setFlash(__('Reviewer deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Reviewer was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
