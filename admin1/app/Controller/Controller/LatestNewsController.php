<?php

App::uses('AppController', 'Controller');

/**
 * LatestNews Controller
 *
 * @property LatestNews $LatestNews
 */
class LatestNewsController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->LatestNews->recursive = 0;
        $this->set('latestNews', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->LatestNews->exists($id)) {
            $this->Session->setFlash(__('Invalid latest news'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('LatestNews.' . $this->LatestNews->primaryKey => $id));
        $this->set('latestNews', $this->LatestNews->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            if ($this->LatestNews->save($this->request->data)) {
                $this->Session->setFlash(__('The latest news has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The latest news could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->LatestNews->exists($id)) {
            $this->Session->setFlash(__('Invalid latest news'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->LatestNews->save($this->request->data)) {
                $this->Session->setFlash(__('The latest news has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The latest news could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('LatestNews.' . $this->LatestNews->primaryKey => $id));
            $this->request->data = $this->LatestNews->find('first', $options);
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
        $this->LatestNews->id = $id;
        if (!$this->LatestNews->exists()) {
            $this->Session->setFlash(__('Invalid latest news'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->LatestNews->delete()) {
            $this->Session->setFlash(__('Latest news deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Latest news was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->LatestNews->recursive = 0;
        $this->set('latestNews', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->LatestNews->exists($id)) {
            $this->Session->setFlash(__('Invalid latest news'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $options = array('conditions' => array('LatestNews.' . $this->LatestNews->primaryKey => $id));
        $this->set('latestNews', $this->LatestNews->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->LatestNews->create();
            if ($this->LatestNews->save($this->request->data)) {
                $this->Session->setFlash(__('The latest news has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The latest news could not be saved. Please, try again.'), 'flash_error');
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
        if (!$this->LatestNews->exists($id)) {
            $this->Session->setFlash(__('Invalid latest news'), 'flash_warning');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->LatestNews->save($this->request->data)) {
                $this->Session->setFlash(__('The latest news has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The latest news could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('LatestNews.' . $this->LatestNews->primaryKey => $id));
            $this->request->data = $this->LatestNews->find('first', $options);
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
        $this->LatestNews->id = $id;
        if (!$this->LatestNews->exists()) {
            $this->Session->setFlash(__('Invalid latest news'), 'flash_warning');
            $this->redirect($this->referer());
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->LatestNews->delete()) {
            $this->Session->setFlash(__('Latest news deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Latest news was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    public function latest_news_page($id = null) {
        $this->LatestNews->id = $id;
        $this->layout = 'site';
        $news = $this->LatestNews->find('first', array(
            'conditions' => array('LatestNews.' . $this->LatestNews->primaryKey => $id)
                ));
        $this->set(compact('news'));
    }

}
