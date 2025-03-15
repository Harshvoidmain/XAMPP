<?php

App::uses('AppController', 'Controller');

/**
 * CommitteeMembers Controller
 *
 * @property CommitteeMember $CommitteeMember
 */
class CommitteeMembersController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->CommitteeMember->recursive = 0;
        $this->set('committeeMembers', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->CommitteeMember->exists($id)) {
            $this->Session->setFlash(__('Invalid committeeMember'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('CommitteeMember.' . $this->CommitteeMember->primaryKey => $id));
        $this->set('committeeMember', $this->CommitteeMember->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->CommitteeMember->create();
            if ($this->CommitteeMember->save($this->request->data)) {
                $this->Session->setFlash(__('The committeeMember has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The committeeMember could not be saved. Please, try again.'), 'flash_error');
            }
        }
        $organizingCommittees = $this->CommitteeMember->OrganizingCommittee->find('list');
        $this->set(compact('organizingCommittees'));
        
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->CommitteeMember->exists($id)) {
            $this->Session->setFlash(__('Invalid committeeMember'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CommitteeMember->save($this->request->data)) {
                $this->Session->setFlash(__('The committeeMember has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The committeeMember could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('CommitteeMember.' . $this->CommitteeMember->primaryKey => $id));
            $this->request->data = $this->CommitteeMember->find('first', $options);
        }
        $organizingCommittees = $this->CommitteeMember->OrganizingCommittee->find('list');
        $this->set(compact('organizingCommittees'));
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
        $this->CommitteeMember->id = $id;
        if (!$this->CommitteeMember->exists()) {
            $this->Session->setFlash(__('Invalid committeeMember'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->CommitteeMember->delete()) {
            $this->Session->setFlash(__('CommitteeMember deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('CommitteeMember was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->CommitteeMember->recursive = 0;
        $this->set('committeeMembers', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->CommitteeMember->exists($id)) {
            $this->Session->setFlash(__('Invalid committeeMember'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('CommitteeMember.' . $this->CommitteeMember->primaryKey => $id));
        $this->set('committeeMember', $this->CommitteeMember->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->CommitteeMember->create();
            if ($this->CommitteeMember->save($this->request->data)) {
                $this->Session->setFlash(__('The committeeMember has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The committeeMember could not be saved. Please, try again.'), 'flash_error');
            }
        }
        $organizingCommittees = $this->CommitteeMember->OrganizingCommittee->find('list');
        $this->set(compact('organizingCommittees'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->CommitteeMember->exists($id)) {
            $this->Session->setFlash(__('Invalid committeeMember'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CommitteeMember->save($this->request->data)) {
                $this->Session->setFlash(__('The committeeMember has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The committeeMember could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('CommitteeMember.' . $this->CommitteeMember->primaryKey => $id));
            $this->request->data = $this->CommitteeMember->find('first', $options);
        }
        $organizingCommittees = $this->CommitteeMember->OrganizingCommittee->find('list');
        $this->set(compact('organizingCommittees'));
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
        $this->CommitteeMember->id = $id;
        if (!$this->CommitteeMember->exists()) {
            $this->Session->setFlash(__('Invalid committeeMember'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->CommitteeMember->delete()) {
            $this->Session->setFlash(__('CommitteeMember deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('CommitteeMember was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}
