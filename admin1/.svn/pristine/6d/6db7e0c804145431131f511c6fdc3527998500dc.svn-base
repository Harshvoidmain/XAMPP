<?php
App::uses('AppController', 'Controller');
/**
 * HomeBannerImages Controller
 *
 * @property HomeBannerImage $HomeBannerImage
 */
class HomeBannerImagesController extends AppController {

/**
    * admin_index method
    *
    * @return void
    */
    public function admin_index() {
    $this->HomeBannerImage->recursive = 0;
    $this->set('homeBannerImages', $this->paginate());
    }

    /**
    * admin_view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function admin_view($id = null) {
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->set('homeBannerImage', $this->HomeBannerImage->find('first', $options));
    }

        /**
    * admin_add method
    *
    * @return void
    */
    public function admin_add() {
    if ($this->request->is('post')) {
    $this->HomeBannerImage->create();
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
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
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->request->data = $this->HomeBannerImage->find('first', $options);
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
    $this->HomeBannerImage->id = $id;
    if (!$this->HomeBannerImage->exists()) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->HomeBannerImage->delete()) {
            $this->Session->setFlash(__('Home banner image deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Home banner image was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
    * consumer_index method
    *
    * @return void
    */
    public function consumer_index() {
    $this->HomeBannerImage->recursive = 0;
    $this->set('homeBannerImages', $this->paginate());
    }

    /**
    * consumer_view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function consumer_view($id = null) {
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->set('homeBannerImage', $this->HomeBannerImage->find('first', $options));
    }

        /**
    * consumer_add method
    *
    * @return void
    */
    public function consumer_add() {
    if ($this->request->is('post')) {
    $this->HomeBannerImage->create();
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
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
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->request->data = $this->HomeBannerImage->find('first', $options);
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
    $this->HomeBannerImage->id = $id;
    if (!$this->HomeBannerImage->exists()) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->HomeBannerImage->delete()) {
            $this->Session->setFlash(__('Home banner image deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Home banner image was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
    * retail_index method
    *
    * @return void
    */
    public function retail_index() {
    $this->HomeBannerImage->recursive = 0;
    $this->set('homeBannerImages', $this->paginate());
    }

    /**
    * retail_view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function retail_view($id = null) {
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->set('homeBannerImage', $this->HomeBannerImage->find('first', $options));
    }

        /**
    * retail_add method
    *
    * @return void
    */
    public function retail_add() {
    if ($this->request->is('post')) {
    $this->HomeBannerImage->create();
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
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
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->request->data = $this->HomeBannerImage->find('first', $options);
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
    $this->HomeBannerImage->id = $id;
    if (!$this->HomeBannerImage->exists()) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->HomeBannerImage->delete()) {
            $this->Session->setFlash(__('Home banner image deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Home banner image was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
    * brand_index method
    *
    * @return void
    */
    public function brand_index() {
    $this->HomeBannerImage->recursive = 0;
    $this->set('homeBannerImages', $this->paginate());
    }

    /**
    * brand_view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function brand_view($id = null) {
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->set('homeBannerImage', $this->HomeBannerImage->find('first', $options));
    }

        /**
    * brand_add method
    *
    * @return void
    */
    public function brand_add() {
    if ($this->request->is('post')) {
    $this->HomeBannerImage->create();
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
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
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->request->data = $this->HomeBannerImage->find('first', $options);
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
    $this->HomeBannerImage->id = $id;
    if (!$this->HomeBannerImage->exists()) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->HomeBannerImage->delete()) {
            $this->Session->setFlash(__('Home banner image deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Home banner image was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    /**
    * index method
    *
    * @return void
    */
    public function index() {
    $this->HomeBannerImage->recursive = 0;
    $this->set('homeBannerImages', $this->paginate());
    }

    /**
    * view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function view($id = null) {
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->set('homeBannerImage', $this->HomeBannerImage->find('first', $options));
    }

        /**
    * add method
    *
    * @return void
    */
    public function add() {
    if ($this->request->is('post')) {
    $this->HomeBannerImage->create();
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
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
    if (!$this->HomeBannerImage->exists($id)) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    if ($this->request->is('post') || $this->request->is('put')) {
    if ($this->HomeBannerImage->save($this->request->data)) {
            $this->Session->setFlash(__('The home banner image has been saved'),'flash_success');
        $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The home banner image could not be saved. Please, try again.'),'flash_error');
        }
    } else {
    $options = array('conditions' => array('HomeBannerImage.' . $this->HomeBannerImage->primaryKey => $id));
    $this->request->data = $this->HomeBannerImage->find('first', $options);
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
    $this->HomeBannerImage->id = $id;
    if (!$this->HomeBannerImage->exists()) {
    $this->Session->setFlash(__('Invalid home banner image'), 'flash_warning');
    $this->redirect($this->referer());
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->HomeBannerImage->delete()) {
            $this->Session->setFlash(__('Home banner image deleted'),'flash_success');
        $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(__('Home banner image was not deleted'),'flash_error');
        $this->redirect(array('action' => 'index'));
    }
}
