<?php

class CommonHelper extends AppHelper {

    public $helpers = array('Html', 'Form');

    /**
     *
     * @param type $model
     * @param type $field
     * @param type $base_model_id
     */
    public function get_view_chage_log($model, $field, $base_model_id) {
        return $this->Html->link('<i class="icon-folder-open"></i>', "/log/$model/$field/$base_model_id", array('class' => 'log_link fancybox tooltips', 'title' => 'View Logs of x', 'escape' => FALSE, 'data-fancybox-type' => 'ajax'));
    }

    var $status_button_colors = array('red', '', 'purple', 'blue', 'green', 'yellow','pink');
    public $default = array('No', 'Yes');

    public function get_button($value = 0, $defaul = array()) {
        if (empty($defaul)) {
            $defaul = $this->default;
        }
        $value = trim($value);
        if (empty($value)) {
            $value = 0;
        }
        if (is_numeric($value)) {
            $value = $defaul[$value];
        }
        $color = $this->status_button_colors[array_search($value, $defaul)];
        return $this->Form->button($value, array('class' => 'btn ' . $color));
    }

    /**
     *
     * @param type $nav_arg
     * @return string
     */
    private $nav_arraow = '<span class = "arrow "></span>';

    public function nav($nav_arg = array()) {
        $navs = '';
        foreach ($nav_arg as $nav_name => $nav_data) {
//for icon
            $nav_icon = '';
            if (isset($nav_data['icon'])) {
                $nav_icon = '<i class = "' . $nav_data['icon'] . '"></i>';
            }
//for sub navs
            $sub_navs = '';
            if (isset($nav_data['sub_nav'])) {
                $sub_navs = $this->sub_nav($nav_data['sub_nav']);
            }
            $navs .= '<li>' . $this->Html->link(
                            $nav_icon . ' <span class = "title">' . $nav_name . '</span>' . (empty($sub_navs) ? '' : $this->nav_arraow), $nav_data['url'], array('escape' => FALSE)
            );
            $navs .= $sub_navs;
            $navs .= '</li>';
        }
        return $navs;
    }

    /**
     * generates sub nav
     * @param type $navs_arg
     * @return string
     */
    public function sub_nav($sub_nav_arg = array()) {
        $sub_navs = '<ul class = "sub-menu">';
        foreach ($sub_nav_arg as $nav_name => $controller) {
//checking if icon is also required
            if (!is_array($controller)) {
                $controller = array($controller, '');
            }
            $controller_name = $controller[0];
//checking if prefix is set
            $prefix = '';
            if (strpos($controller_name, '/', 1) !== FALSE) {
                $explode = explode('/', $controller_name, 2);
                $prefix = $explode[0] . '/';
                $controller_name = $explode[1];
            }
            $nav_icon = $controller[1];
//making icon
            if (!empty($nav_icon)) {
                $nav_icon = '<i class="' . $nav_icon . '"></i>';
            } else {
                $nav_icon = '';
            }
//checking if no nav name is set
            if (is_numeric($nav_name)) {
                $nav_name = Inflector::shc($controller_name);
            }
//making link
            $sub_navs .= '<li>' . $this->Html->link($nav_icon . ' ' . $nav_name, '/' . $prefix . $controller_name, array('escape' => FALSE)) . '</li>';
        }
        $sub_navs .= '</ul>';
        return $sub_navs;
    }

    /**
     *
     * @param type $user_id
     * @param type $user_model
     * @param type $profile_pic_required
     * @return string
     */
    public function get_user_name($user_id = 0, $modelName = 'User', $profile_pic_required = TRUE) {
        if (empty($modelName)) {
            $modelName = 'User';
        }
        App::import('Model', $modelName);
        $model = new $modelName();

        $model->recursive = -1;
        if ($profile_pic_required) {
            $data = $model->find('first', array(
                'conditions' => array($modelName . '.id' => $user_id),
                'fields' => array($modelName . '.full_name', $modelName . '.profile_picture')
                    ));
            if (!empty($data)) {
                $file_data = $data[$modelName]['profile_picture'];
                if (empty($file_data)) {
                    $file_data = 'avatar.png';
                } else {
                    $file_data = '/files/user/' . str_replace('\\', '/', $file_data . '_40.jpg');
                }
                $file_data_arr = split('-', $file_data);
                return $this->Html->image($file_data, array('class' => 'avatar tooltips', 'title' => $data[$modelName]['full_name']));
            } else {
                return $this->Html->image('avatar.png', array('class' => 'avatar tooltips', 'title' => 'Anonymous'));
            }
        } else {
            $data = $model->find('list');
            if (!empty($data)) {
                return $data[$user_id];
            } else {
                return 'Anonymous';
            }
        }
    }

    public function get_client_locations($institute_ids = array()) {
        if (is_string($institute_ids) || is_numeric($institute_ids)) {
            $institute_ids = array($institute_ids);
        }

        $modelName = 'Client';
        App::import('Model', $modelName);
        $Model = new $modelName();
        $institute = $Model->find('list', array(
            'conditions' => array('Client.id' => $institute_ids, 'Client.institute_id !=' => NULL),
            'fields' => array('Client.id', 'Client.institute_id',)
                ));

        $institute = array_unique(array_values($institute));

        $Model->Institute->recursive = 1;
        $location = $Model->Institute->find('all', array(
            'conditions' => array('Institute.id' => $institute),
            'fields' => array('Location.name')
                ));
        $location = array_map(create_function('$a', 'if(!empty($a["Location"])){ return $a["Location"]["name"]; }'), $location);
        if (empty($location)) {
            return '';
        }
        return join(', ', $location);
    }

    public function get_client_institute($institute_ids = array()) {
        if (is_string($institute_ids) || is_numeric($institute_ids)) {
            $institute_ids = array($institute_ids);
        }

        $modelName = 'Client';
        App::import('Model', $modelName);
        $Model = new $modelName();
        $institute = $Model->find('list', array(
            'conditions' => array('Client.id' => $institute_ids, 'Client.institute_id !=' => NULL),
            'fields' => array('Client.id', 'Client.institute_id',)
                ));

        $institute = array_unique(array_values($institute));

        $Model->Institute->recursive = 1;
        $institutes = $Model->Institute->find('all', array(
            'conditions' => array('Institute.id' => $institute),
            'fields' => array('Institute.name')
                ));
        $institutes = array_map(create_function('$n', 'if(!empty($n["Institute"])){return $n["Institute"]["name"];}'), $institutes);
        if (empty($institutes)) {
            return '';
        }
        return join(', ', $institutes);
    }

    //edi tin file behaviour
    private $fields = array('product_photo_1', 'file', 'profile_picture', 'product_photo_2', 'product_photo_3', 'product_photo_4', 'product_photo_5');
    private $map = array(
        'IWant' => 'not_available',
        'IHave' => 'not_available',
        'IHafe' => 'not_available',
        'IWish' => 'not_available',
        'Product' => 'not_available',
        'Consumer' => 'no_user',
        'CompaniesUser' => 'no_user',
        'RetailersUser' => 'no_user',
        'User' => 'no_user'
    );

    public function getImage($image_data = NULL, $model = 'User', $size = '_40.jpg', $options = array('class' => 'thumbnail')) {

        return $this->Html->image('/files/' . str_replace(array('/files', '\\'), array('', '/'), $image_data . $size), $options);
    }

}
