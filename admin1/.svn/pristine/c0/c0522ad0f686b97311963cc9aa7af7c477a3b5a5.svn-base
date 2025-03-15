<?php

/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    /**
     * loading FileBehavior
     * @var type
     */
    public $actsAs = array('File', 'Containable');
    var $ids = array();

    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        foreach ($this->schema() as $var => $field) {
            /**
             * checking data is set and selected data is multiple
             */
            if (strpos($field['type'], 'set') !== FALSE) {
                if (isset($this->data[$this->alias][$var])) {
                    if (is_array($this->data[$this->alias][$var])) {
                        $temp = implode(",", $this->data[$this->alias][$var]);
                        unset($this->data[$this->alias][$var]);
                        $this->data[$this->alias][$var] = $temp;
                    }
                }
            }
        }
    }

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        $user = CakeSession::read('Auth.User');
        if (empty($this->id)) {
            if (!empty($user)) {
                $this->data[$this->alias]['created_by'] = $user['id'];
            }
            $this->data[$this->alias]['created_timestamp'] = date('Y-m-d H:i:s');
        } else {
            
        }
        return TRUE;
    }

    /**
     * 
     * @return type
     */
    public function getLastQuery() {
        $dbo = $this->getDataSource();
        $logs = $dbo->getLog();
        $lastLog = end($logs['log']);
        return $lastLog['query'];
    }

    public function afterSave($created) {
        parent::afterSave($created);
        if ($created) {
            $this->ids[] = $this->getLastInsertID();
        } else {
            
        }
        $this->updateCounter();
        return TRUE;
    }

    /**
     *
     */
    public function afterDelete() {
        $this->updateCounter();
        parent::afterDelete();
    }

    /**
     * updates counter of cache
     */
    public function updateCounter() {
        if ($this->cache) {
            $tag = isset($this->name) ? '_' . $this->name : 'appmodel';
            Cache::write($tag, 1 + (int) Cache::read($tag));
        }
    }

    /**
     *
     * @param type $type
     * @param type $query
     */
    public function find($type = 'first', $query = array()) {
        if ($this->cache) {
            if (is_array($type)) {
                $typeString = md5(serialize($type));
            } else {
                $typeString = $type;
            }
            $tag = isset($this->name) ? '_' . $this->name : 'appmodel';
            $queryHash = md5(serialize($query));
            $version = (int) Cache::read($queryHash);
            $fullTag = $tag . '_' . $typeString . '_' . $queryHash;
            $result = Cache::read($fullTag);
            if ($result) {
                if ($result['version'] === $version) {
                    return $result['data'];
                }
            }
            $result = array('version' => $version, 'data' => parent::find($type, $query));
            Cache::write($fullTag, $result);
            Cache::write($tag, $version);
            return $result['data'];
        } else {
            return parent::find($type, $query);
        }
    }

    public function query($sql) {
        if ($this->cache) {
            $tag = isset($this->name) ? '_' . $this->name : 'appmodel';
            $queryHash = md5(serialize($sql));
            $version = (int) Cache::read($queryHash);
            $fullTag = $tag . '_' . $queryHash;

            if ($result = Cache::read($fullTag)) {
                if ($result['version'] === $version) {
                    return $result['data'];
                }
            }
            $result = array('version' => $version, 'data' => parent::query($sql));
            Cache::write($fullTag, $result);
            Cache::write($tag, $version);
            return $result['data'];
        } else {
            return parent::query($sql);
        }
    }

}
