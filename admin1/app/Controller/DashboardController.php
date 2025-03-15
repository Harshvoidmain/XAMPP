<?php

class DashboardController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('email');
    }

    public function admin_index() {
        
    }

}

?>
