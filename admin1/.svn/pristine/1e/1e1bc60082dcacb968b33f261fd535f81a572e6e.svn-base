<?php
App::uses('AppController', 'Controller');
/**
 * SuccessStories Controller
 *
 * @property SuccessStory $SuccessStory
 */
class SuccessStoriesController extends AppController {

/**
    * admin_index method
    *
    * @return void
    */
    public function admin_index() {
    $this->SuccessStory->recursive = 0;
    $this->set('successStories', $this->paginate());
    }

    /**
    * admin_view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function admin_view($id = null) {
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->set('successStory', $this->SuccessStory->find('first', $options));
    }

        /**
    * admin_add method
    *
    * @return void
    */
    public function admin_add() {
    if ($this->request->is('post')) {
    $this->SuccessStory->create();
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
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
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->request->data = $this->SuccessStory->find('first', $options);
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
    $this->SuccessStory->id = $id;
    if (!$this->SuccessStory->exists()) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->SuccessStory->delete()) {
            $this->Session->setFlash(__('Success story deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Success story was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
    * consumer_index method
    *
    * @return void
    */
    public function consumer_index() {
    $this->SuccessStory->recursive = 0;
    $this->set('successStories', $this->paginate());
    }

    /**
    * consumer_view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function consumer_view($id = null) {
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->set('successStory', $this->SuccessStory->find('first', $options));
    }

        /**
    * consumer_add method
    *
    * @return void
    */
    public function consumer_add() {
    if ($this->request->is('post')) {
    $this->SuccessStory->create();
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
        }
    }
        }

        /**
    * consumer_edit method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function consumer_edit($id = null) {
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->request->data = $this->SuccessStory->find('first', $options);
    }
        }

    /**
    * consumer_delete method
    *
    * @throws NotFoundException
    * @throws MethodNotAllowedException
    * @param string $id
    * @return void
    */
    public function consumer_delete($id = null) {
    $this->SuccessStory->id = $id;
    if (!$this->SuccessStory->exists()) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->SuccessStory->delete()) {
            $this->Session->setFlash(__('Success story deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Success story was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
    * retail_index method
    *
    * @return void
    */
    public function retail_index() {
    $this->SuccessStory->recursive = 0;
    $this->set('successStories', $this->paginate());
    }

    /**
    * retail_view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function retail_view($id = null) {
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->set('successStory', $this->SuccessStory->find('first', $options));
    }

        /**
    * retail_add method
    *
    * @return void
    */
    public function retail_add() {
    if ($this->request->is('post')) {
    $this->SuccessStory->create();
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
        }
    }
        }

        /**
    * retail_edit method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function retail_edit($id = null) {
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->request->data = $this->SuccessStory->find('first', $options);
    }
        }

    /**
    * retail_delete method
    *
    * @throws NotFoundException
    * @throws MethodNotAllowedException
    * @param string $id
    * @return void
    */
    public function retail_delete($id = null) {
    $this->SuccessStory->id = $id;
    if (!$this->SuccessStory->exists()) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->SuccessStory->delete()) {
            $this->Session->setFlash(__('Success story deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Success story was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
    * brand_index method
    *
    * @return void
    */
    public function brand_index() {
    $this->SuccessStory->recursive = 0;
    $this->set('successStories', $this->paginate());
    }

    /**
    * brand_view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function brand_view($id = null) {
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->set('successStory', $this->SuccessStory->find('first', $options));
    }

        /**
    * brand_add method
    *
    * @return void
    */
    public function brand_add() {
    if ($this->request->is('post')) {
    $this->SuccessStory->create();
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
        }
    }
        }

        /**
    * brand_edit method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function brand_edit($id = null) {
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->request->data = $this->SuccessStory->find('first', $options);
    }
        }

    /**
    * brand_delete method
    *
    * @throws NotFoundException
    * @throws MethodNotAllowedException
    * @param string $id
    * @return void
    */
    public function brand_delete($id = null) {
    $this->SuccessStory->id = $id;
    if (!$this->SuccessStory->exists()) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->SuccessStory->delete()) {
            $this->Session->setFlash(__('Success story deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Success story was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
    * index method
    *
    * @return void
    */
    public function index() {
    $this->SuccessStory->recursive = 0;
    $this->set('successStories', $this->paginate());
    }

    /**
    * view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function view($id = null) {
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->set('successStory', $this->SuccessStory->find('first', $options));
    }

        /**
    * add method
    *
    * @return void
    */
    public function add() {
    if ($this->request->is('post')) {
    $this->SuccessStory->create();
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
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
    if (!$this->SuccessStory->exists($id)) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->SuccessStory->save($this->request->data)) {
            $this->Session->setFlash(__('The success story has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The success story could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('SuccessStory.' . $this->SuccessStory->primaryKey => $id));
    $this->request->data = $this->SuccessStory->find('first', $options);
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
    $this->SuccessStory->id = $id;
    if (!$this->SuccessStory->exists()) {
    $this->Session->setFlash(__('Invalid success story'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->SuccessStory->delete()) {
            $this->Session->setFlash(__('Success story deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Success story was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }
}
