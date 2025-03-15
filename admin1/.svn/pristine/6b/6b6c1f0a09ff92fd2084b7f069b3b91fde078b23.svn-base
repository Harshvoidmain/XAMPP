<?php
$model = new $modelClass();
$schema = $model->schema();
$button = array('boolean', 'enum', 'set');
?>
<div class="portlet box blue <?php echo $pluralVar; ?> view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo "<?php  echo __('{$singularHumanName}'); ?>"; ?></div>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="javascript:;" class="reload"></a>
            <a href="javascript:;" class="print"></a>
            <a href="javascript:;" class="remove"></a>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <div class="form-horizontal form-view">
            <h3><?php echo "<?php echo \${$singularVar}['{$modelClass}']['{$displayField}'] ?>" ?></h3>
            <?php
            $counter = 0;
            foreach ($fields as $field) {
                $isKey = false;
                if ($counter % 2 == 0) {
                    ?>
                    <div class="row-fluid">
                        <?php
                    }
                    ?>
                    <div class="span6 ">
                        <div class="control-group">
                            <?php
                            if (!empty($associations['belongsTo'])) {
                                foreach ($associations['belongsTo'] as $alias => $details) {
                                    if ($field === $details['foreignKey']) {
                                        $isKey = true;
                                        echo "\t\t<label class='control-label' for='" . Inflector::camelize(Inflector::underscore($alias)) . "'> <?php echo __(\$this->Common->get_view_chage_log('$modelClass','$field',\${$singularVar}['{$modelClass}']['id']) . '" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></label>\n";
                                        echo "\t\t<div class='controls'>\n\t\t\t<span class='text'>\n\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t</span>\n\t\t\t</div>\n";
                                        break;
                                    }
                                }
                            }
                            if ($isKey !== true) {
                                echo "\t\t<label class='control-label' for='" . Inflector::camelize(Inflector::humanize($field)) . "'><?php echo __(\$this->Common->get_view_chage_log('$modelClass','$field',\${$singularVar}['{$modelClass}']['id']) . '" . Inflector::humanize($field) . "'); ?></label>\n";
                                //checking if $field  should be shown a button
                                $found = FALSE;
                                foreach ($button as $type) {
                                    if (strpos($schema[$field]['type'], $type) !== FALSE) {
                                        $found = TRUE;
                                        break;
                                    }
                                }
                                if ($found) {
                                    $values = 'array' . str_replace($type, '', $schema[$field]['type']);
                                    if ($values === 'array') {
                                        $values = 'NULL';
                                    }
                                    echo "\t\t<div class='controls'>\n\t\t\t<span class='text'>\n\t\t\t\t<?php echo \$this->Common->get_button(\${$singularVar}['{$modelClass}']['{$field}'],$values); ?>\n\t\t\t\t</span>\n\t\t\t</div>\n";
                                } else {
                                    //checking if its a binary image
                                    if ($schema[$field]['type'] === 'binary') {
                                        echo "\t\t<div class='controls'>\n\t\t\t<span class='text'>\n\t\t\t\t<?php
                                                    \$file_data = \${$singularVar}['{$modelClass}']['{$field}'];
                                                    if(!empty(\$file_data)){
                                                        \$file_data_arr = split('-', \$file_data);
                                                        echo \$this->Html->link(\$file_data_arr[1], '/files/'.str_replace('\\\','/', \$file_data ), array('target'=>'_blank'));
                                                    }
                                                        ?>\n\t\t\t\t</span>\n\t\t\t</div>\n";
                                    } else {
                                        echo "\t\t<div class='controls'>\n\t\t\t<span class='text'>\n\t\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t\t</span>\n\t\t\t</div>\n";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if ($counter % 2 == 1) {
                        ?>
                    </div>
                    <?php
                }
                $counter++;
            }
            ?>
        </div>
    </div>
</div>
<?php
if (empty($associations['hasOne'])) {
    $associations['hasOne'] = array();
}
if (empty($associations['hasMany'])) {
    $associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
    $associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
$relations = array_merge($relations, $associations['hasOne']);

foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize($details['controller']);
    $otherCamalizedName = Inflector::camelize($details['controller']);
endforeach;
?>
<div class="row-fluid ">
    <div class="span12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-table"></i>Related Data</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row-fluid">
                    <div class="span12">
                        <!--BEGIN TABS-->
                        <div class="tabbable tabbable-custom">
                            <ul class="nav nav-tabs">
                                <?php
                                foreach ($relations as $alias => $details):
                                    $otherSingularVar = Inflector::variable($alias);
                                    $otherPluralHumanName = Inflector::humanize($details['controller']);
                                    $otherCamalizedName = Inflector::camelize($details['controller']);
                                    ?>
                                    <li><?php echo "<?php echo \$this->Html->link('$otherPluralHumanName', '#$otherCamalizedName',array('data-toggle'=>'tab'))?>" ?></li>
                                    <?php
                                endforeach;
                                ?>
                            </ul>
                            <div class="tab-content">
                                <?php
                                foreach ($relations as $alias => $details):
                                    $relatedcontrollerName = $details['controller'];
                                    $otherSingularVar = Inflector::variable($alias);
                                    $otherPluralHumanName = Inflector::humanize($details['controller']);
                                    $otherCamalizedName = Inflector::camelize($details['controller']);
                                    $modelName = ucfirst(Inflector::singularize(Inflector::camelize($details['controller'])));
                                    if (APP::import('Model', $modelName)) {
                                        $model = new $modelName();
                                        $schema = $model->schema();
                                    } else {
                                        $schema = array();
                                    }
                                    ?>
                                    <div class="tab-pane" id="<?php echo $otherCamalizedName ?>">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <log>
                                                <?php echo "<?php echo \$this->Common->get_view_chage_log('{$modelName}', NULL, \${$singularVar}['{$modelClass}']['id'], 'RELATION'); ?>\n"; ?>
                                                </log>
                                            </div>
                                            <div class="span6">
                                                <div id="sample_2_filter" class="dataTables_filter">
                                                    <label>
                                                        <?php echo "<?php if(\$this->Permissions->hasAccess('$relatedcontrollerName', 'add')){?>\n\t" ?>
                                                        <?php echo "<?php echo \$this->Html->link('<i class=\"icon-plus\"></i> Add '.__('{$otherPluralHumanName}'),array('controller'=>'{$relatedcontrollerName}','action'=>'add'), array('class'=>'btn blue', 'escape'=>FALSE));?>\n" ?>
                                                        <?php echo "<?php } ?>\n" ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dataTables_scrollBody" style="overflow: auto; width: 100%;">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <?php
                                                        foreach ($details['fields'] as $field) {
                                                            echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
                                                        }
                                                        ?>
                                                        <th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
                                                    <?php
                                                    echo "\t<?php
                                                            \$i = 0;
                                                            foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
                                                    echo "\t\t<tr>\n";
                                                    foreach ($details['fields'] as $field) {
                                                        //checking if $field  should be shown a button
                                                        $found = FALSE;
                                                        if (isset($schema[$field])) {
                                                            foreach ($button as $type) {
                                                                if (strpos($schema[$field]['type'], $type) !== FALSE) {
                                                                    $found = TRUE;
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                        if ($found) {
                                                            $values = 'array' . str_replace($type, '', $schema[$field]['type']);
                                                            if ($values === 'array') {
                                                                $values = 'NULL';
                                                            }
                                                            echo "\t\t\t<td><?php echo \$this->Common->get_button(\${$otherSingularVar}['{$field}'],$values); ?></td>\n";
                                                        } else {
                                                            //checking if its a binary image
                                                            if (!isset($schema[$field]['type'])) {
                                                                $schema[$field]['type'] = '';
                                                            }
                                                            if ($schema[$field]['type'] === 'binary') {
                                                                echo "\t\t<td><?php
                                                                            \$file_data = \${$otherSingularVar}['{$field}'];
                                                                            if(!empty(\$file_data)){
                                                                                \$file_data_arr = split('-', \$file_data);
                                                                                echo \$this->Html->link(\$file_data_arr[1], '/files/'.str_replace('\\\','/', \$file_data ), array('target'=>'_blank'));
                                                                            }
                                                                                ?>&nbsp;</td>\n";
                                                            } else {
                                                                echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?>&nbsp;</td>\n";
                                                            }
                                                        }
                                                    }

                                                    echo "\t\t\t<td class=\"actions\">\n";
                                                    echo "<?php if(\$this->Permissions->hasAccess('$relatedcontrollerName', 'view')){?>\n\t";
                                                    echo "\t\t\t\t<?php echo \$this->Html->link(__('<i class=\"icon-eye-open\"></i>View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('class'=>'btn purple','escape'=>false)); ?>\n";
                                                    echo "<?php } ?>\n";
                                                    echo "<?php if(\$this->Permissions->hasAccess('$relatedcontrollerName', 'edit')){?>\n\t";
                                                    echo "\t\t\t\t<?php echo \$this->Html->link(__('<i class=\"icon-pencil\"></i>Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('class'=>'btn green','escape'=>false)); ?>\n";
                                                    echo "<?php } ?>\n";
                                                    echo "<?php if(\$this->Permissions->hasAccess('$relatedcontrollerName', 'delete')){?>\n\t";
                                                    echo "\t\t\t\t<?php echo \$this->Form->postLink(__('<i class=\"icon-trash\"></i>Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('class'=>'btn red','escape'=>false), __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
                                                    echo "<?php } ?>\n";
                                                    echo "\t\t\t</td>\n";
                                                    echo "\t\t</tr>\n";

                                                    echo "\t<?php endforeach; ?>\n";
                                                    ?>
                                                    <?php echo "<?php endif; ?>\n\n"; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
