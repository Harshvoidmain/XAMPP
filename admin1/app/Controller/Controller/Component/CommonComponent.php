<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP CommonComponent
 * @author Mubasshir
 */
class CommonComponent extends Component {

    public $components = array();

    /**
     *
     * @param type $q search query
     * @param type $modelName model name
     * @param type $recursive if required to search on associated models
     * @return array seached condition
     */
    public function search($q = '', $modelName = null, $recursive = true) {
        if (empty($modelName)) {
            return array();
        }
        //getting ids of searched model
        $conditions = $this->searchCondition($q, $modelName);
        //working for associated models
        if ($recursive) {
            //getting associated models
            App::import('Model', $modelName);
            $model = new $modelName();
            $associations = $model->getAssociated();
            foreach ($associations as $associatedModel => $relation) {
                if (!in_array($relation, array('hasMany', 'hasAndBelongsToMany')))
                    $conditions = array_merge($conditions, $this->searchCondition($q, $associatedModel));
            }
        }
        return ($conditions);
    }

    /**
     *
     * @var type
     */
    private $escapeFields = array(
        'created_by', 'created_timestamp');

    /**
     *
     * @param type $q
     * @param type $modelName
     * @return array
     */
    private function searchCondition($q, $modelName) {
        $conditions = array();
        App::import('Model', $modelName);
        $model = new $modelName();
        //gettings schema
        $schema = $model->schema();
        //looping over

        foreach ($schema as $field => $value) {
            /**
             * escaping fields
             * if feilds ends with _id
             */ if (in_array($field, $this->escapeFields) || substr($field, -3) === '_id') {
                continue;
            }
            $conditions["$modelName.$field LIKE"] = "'%$q%'";
        }
        return $conditions;
    }

}

