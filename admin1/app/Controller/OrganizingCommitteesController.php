<?php

App::uses('AppController', 'Controller');

/**
 * OrganizingCommittees Controller
 *
 * @property OrganizingCommittee $OrganizingCommittee
 */
class OrganizingCommitteesController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->OrganizingCommittee->recursive = 0;
        $this->set('organizingCommittees', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->OrganizingCommittee->exists($id)) {
            $this->Session->setFlash(__('Invalid organizingCommittee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('OrganizingCommittee.' . $this->OrganizingCommittee->primaryKey => $id));
        $this->set('organizingCommittee', $this->OrganizingCommittee->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->OrganizingCommittee->create();
            if ($this->OrganizingCommittee->save($this->request->data)) {
                $this->Session->setFlash(__('The organizingCommittee has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The organizingCommittee could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->OrganizingCommittee->exists($id)) {
            $this->Session->setFlash(__('Invalid organizingCommittee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->OrganizingCommittee->save($this->request->data)) {
                $this->Session->setFlash(__('The organizingCommittee has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The organizingCommittee could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('OrganizingCommittee.' . $this->OrganizingCommittee->primaryKey => $id));
            $this->request->data = $this->OrganizingCommittee->find('first', $options);
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
        $this->OrganizingCommittee->id = $id;
        if (!$this->OrganizingCommittee->exists()) {
            $this->Session->setFlash(__('Invalid organizingCommittee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->OrganizingCommittee->delete()) {
            $this->Session->setFlash(__('OrganizingCommittee deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('OrganizingCommittee was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->OrganizingCommittee->recursive = 0;
        $this->set('organizingCommittees', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->OrganizingCommittee->exists($id)) {
            $this->Session->setFlash(__('Invalid organizingCommittee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('OrganizingCommittee.' . $this->OrganizingCommittee->primaryKey => $id));
        $this->set('organizingCommittee', $this->OrganizingCommittee->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->OrganizingCommittee->create();
            if ($this->OrganizingCommittee->save($this->request->data)) {
                $this->Session->setFlash(__('The organizingCommittee has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The organizingCommittee could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->OrganizingCommittee->exists($id)) {
            $this->Session->setFlash(__('Invalid organizingCommittee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->OrganizingCommittee->save($this->request->data)) {
                $this->Session->setFlash(__('The organizingCommittee has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The organizingCommittee could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('OrganizingCommittee.' . $this->OrganizingCommittee->primaryKey => $id));
            $this->request->data = $this->OrganizingCommittee->find('first', $options);
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
        $this->OrganizingCommittee->id = $id;
        if (!$this->OrganizingCommittee->exists()) {
            $this->Session->setFlash(__('Invalid organizingCommittee'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->OrganizingCommittee->delete()) {
            $this->Session->setFlash(__('OrganizingCommittee deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('OrganizingCommittee was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
