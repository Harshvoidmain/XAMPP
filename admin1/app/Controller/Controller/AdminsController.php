<?php

App::uses('AppController', 'Controller');

/**
 * Admins Controller
 *
 * @property Admin $Admin
 */
class AdminsController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow('login');
        parent::beforeFilter();
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Admin->recursive = 0;
        $this->set('admins', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Admin->exists($id)) {
            $this->Session->setFlash(__('Invalid admin'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
        $this->set('admin', $this->Admin->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Admin->create();
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash(__('The admin has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The admin could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Admin->exists($id)) {
            $this->Session->setFlash(__('Invalid admin'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash(__('The admin has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The admin could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
            $this->request->data = $this->Admin->find('first', $options);
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
        $this->Admin->id = $id;
        if (!$this->Admin->exists()) {
            $this->Session->setFlash(__('Invalid admin'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Admin->delete()) {
            $this->Session->setFlash(__('Admin deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Admin was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    public function index() {
        $this->Admin->recursive = 0;
        $this->set('admins', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Admin->exists($id)) {
            $this->Session->setFlash(__('Invalid admin'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
        $this->set('admin', $this->Admin->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Admin->create();
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash(__('The admin has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The admin could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->Admin->exists($id)) {
            $this->Session->setFlash(__('Invalid admin'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash(__('The admin has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The admin could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
            $this->request->data = $this->Admin->find('first', $options);
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
        $this->Admin->id = $id;
        if (!$this->Admin->exists()) {
            $this->Session->setFlash(__('Invalid admin'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Admin->delete()) {
            $this->Session->setFlash(__('Admin deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Admin was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    public function login() {
        $this->layout = 'login';
        if ($this->request->is('post') || $this->request->is('put')) {

            /**
             * logging in for selected user type
             */
//            pr($this->Auth->password(123));
//            exit();
            $admin = $this->Admin->find('first', array('conditions' => array(
                    'Admin.username' => $this->request->data['Admin']['username'],
                    'Admin.password' => $this->Auth->password($this->request->data['Admin']['password'])
                    )));

            if (!empty($admin)) {
                $this->Session->write('Auth.User', $admin['Admin']);
                $this->Session->write('userType', 'Admin');
                $this->Session->setFlash(__('Logged in successfully'), 'flash_success');
                return $this->redirect('/admin/dashboard');
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'flash_error', array(), 'auth');
            }
        }
    }

    public function admin_logout() {
        $this->Session->setFlash(__('You are logged out'), 'flash_info', array(), 'auth');
        $this->redirect($this->Auth->logout());
    }

}
