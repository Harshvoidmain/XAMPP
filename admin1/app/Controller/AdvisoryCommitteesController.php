<?php

App::uses('AppController', 'Controller');

/**
 * AdvisoryCommittees Controller
 *
 * @property AdvisoryCommittee $AdvisoryCommittee
 */
class AdvisoryCommitteesController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->AdvisoryCommittee->recursive = 0;
        $this->set('advisoryCommittees', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->AdvisoryCommittee->exists($id)) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('AdvisoryCommittee.' . $this->AdvisoryCommittee->primaryKey => $id));
        $this->set('reviewer', $this->AdvisoryCommittee->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->AdvisoryCommittee->create();
            if ($this->AdvisoryCommittee->save($this->request->data)) {
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
        if (!$this->AdvisoryCommittee->exists($id)) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->AdvisoryCommittee->save($this->request->data)) {
                $this->Session->setFlash(__('The reviewer has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The reviewer could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('AdvisoryCommittee.' . $this->AdvisoryCommittee->primaryKey => $id));
            $this->request->data = $this->AdvisoryCommittee->find('first', $options);
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
        $this->AdvisoryCommittee->id = $id;
        if (!$this->AdvisoryCommittee->exists()) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->AdvisoryCommittee->delete()) {
            $this->Session->setFlash(__('AdvisoryCommittee deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('AdvisoryCommittee was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->AdvisoryCommittee->recursive = 0;
        $this->set('advisoryCommittees', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->AdvisoryCommittee->exists($id)) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('AdvisoryCommittee.' . $this->AdvisoryCommittee->primaryKey => $id));
        $this->set('reviewer', $this->AdvisoryCommittee->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->AdvisoryCommittee->create();
            if ($this->AdvisoryCommittee->save($this->request->data)) {
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
        if (!$this->AdvisoryCommittee->exists($id)) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->AdvisoryCommittee->save($this->request->data)) {
                $this->Session->setFlash(__('The reviewer has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The reviewer could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('AdvisoryCommittee.' . $this->AdvisoryCommittee->primaryKey => $id));
            $this->request->data = $this->AdvisoryCommittee->find('first', $options);
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
        $this->AdvisoryCommittee->id = $id;
        if (!$this->AdvisoryCommittee->exists()) {
            $this->Session->setFlash(__('Invalid reviewer'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->AdvisoryCommittee->delete()) {
            $this->Session->setFlash(__('AdvisoryCommittee deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('AdvisoryCommittee was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
