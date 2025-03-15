<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey">
            <div class="portlet-title">
                <div class="caption"><i class="icon-user"></i><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></div>
                <div class="actions">
                    <?php echo "<?php if(\$this->Permissions->hasAccess(\$this->name, 'add')){?>\n\t" ?>
                    <?php echo "<?php echo \$this->Html->link('<i class=\"icon-plus\"></i> Add '.__('{$singularHumanName}'),array('action'=>'add'), array('class'=>'btn blue', 'escape'=>FALSE));?>\n" ?>
                    <?php echo "<?php } ?>\n" ?>
                    <div class="btn-group">
                        <a class="btn green" href="#" data-toggle="dropdown">
                            <i class="icon-cogs"></i> Tools
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <?php echo "<?php if(\$this->Permissions->hasAccess(\$this->name, 'delete')){?>\n\t" ?>
                            <li><?php echo "<?php echo \$this->Form->postLink(__('<i class=\"icon-trash\"></i> Delete Selected'), array('action' => 'deleteAll'), array('class'=>'','escape'=>false), __('Are you sure you want to delete selected?')); ?>" ?></li>
                            <?php echo "<?php } ?>\n" ?>
                            <li><?php echo "<?php echo \$this->Html->link(__('<i class=\"icon-filter\"></i> Filter'), array('controller'=>'Common','action'=>'filter',\$this->name,\$this->modelName), array('class'=>'fancybox','escape'=>false)) ?>" ?></li>
                            <li class="divider"></li>
                            <li><a href="#print" id="print"><i class="icon-print"></i> Print</a></li>
                            <li><a href="#pdf" id="pdf"><i class="icon-file"></i> Save as PDF</a></li>
                            <li><a href="#excel" id="excel"><i class="icon-list-alt"></i> Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div role="grid" class="dataTables_wrapper form-inline" id="sample_2_wrapper">
                    <div class="row-fluid">
                        <div class="span6"></div>
                        <div class="span6">
                            <div class="dataTables_filter" id="sample_2_filter">
                                <label>Search: <input type="text" id="searchInput" aria-controls="sample_2" class="m-wrap small"></label>
                            </div>
                        </div>
                    </div>
                    <div class="dataTables_scrollBody" style="overflow: auto; width: 100%;">
                        <table id="sample_2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample_2_info">
                            <thead>
                                <tr class="row">
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>
                                    <?php foreach ($fields as $field): ?>
                                        <th class="hidden-480 sorting"><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
                                    <?php endforeach; ?>
                                    <th class="actions hidden-480"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                                echo "\t<tr class=\"odd gradeX row\">\n";
                                echo "\t\t<td><input type=\"checkbox\" class=\"checkboxes\" value=\"<?php echo h(\${$singularVar}['{$modelClass}']['id']); ?>\" /></td>\n";
                                $model = new $modelClass();
                                $schema = $model->schema();
                                $button = array('boolean', 'enum', 'set');
                                foreach ($fields as $field) {
                                    $isKey = false;
                                    if (!empty($associations['belongsTo'])) {
                                        foreach ($associations['belongsTo'] as $alias => $details) {
                                            if ($field === $details['foreignKey']) {
                                                $isKey = true;
                                                echo "\t\t<td class=\"hidden-480\">\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                                break;
                                            }
                                        }
                                    }
                                    if ($isKey !== true) {
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
                                            echo "\t\t<td class=\"hidden-480\"><?php echo \$this->Common->get_button(\${$singularVar}['{$modelClass}']['{$field}'], $values); ?>&nbsp;</td>\n";
                                        } else {
                                            //checking if its a binary image
                                            if ($schema[$field]['type'] === 'binary') {
                                                echo "\t\t<td class=\"hidden-480\"><?php
                                                    \$file_data = \${$singularVar}['{$modelClass}']['{$field}'];
                                                    if(!empty(\$file_data)){
                                                        \$file_data_arr = split('-', \$file_data);
                                                        echo \$this->Html->link(\$file_data_arr[1], '/files/'.str_replace('\\\','/', \$file_data ), array('target'=>'_blank'));
                                                    }
                                                        ?>&nbsp;</td>\n";
                                            } else {
                                                echo "\t\t<td class=\"hidden-480\"><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                                            }
                                        }
                                    }
                                }

                                echo "\t\t<td class=\"actions hidden-480\">\n";
                                echo "<?php if(\$this->Permissions->hasAccess(\$this->name, 'view')){?>\n\t";
                                echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"icon-eye-open\"></i> View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn purple','escape'=>false)); ?>\n";
                                echo "<?php } ?>\n";
                                echo "<?php if(\$this->Permissions->hasAccess(\$this->name, 'edit')){?>\n\t";
                                echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"icon-pencil\"></i> Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn green','escape'=>false)); ?>\n";
                                echo "<?php } ?>\n";
                                echo "<?php if(\$this->Permissions->hasAccess(\$this->name, 'delete')){?>\n\t";
                                echo "\t\t\t<?php echo \$this->Form->postLink(__('<i class=\"icon-trash\"></i> Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn red','escape'=>false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
                                echo "<?php } ?>\n";
                                echo "\t\t</td>\n";
                                echo "\t</tr>\n";

                                echo "<?php endforeach; ?>\n";
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="dataTables_info">
                                <?php echo "<?php
                                echo \$this->Paginator->counter(array(
                                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))
                                );
                                ?>"; ?>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="dataTables_paginate paging_full_numbers">
                                <?php echo "<?php
                                echo \$this->Paginator->first(__('first'), array(), null, array('class' => 'first paginate_button paginate_button_disabled'));
                                echo \$this->Paginator->prev(__('previous'), array(), null, array('class' => 'previous paginate_button paginate_button_disabled disabled'));
                                echo \$this->Paginator->numbers(array('separator' => ''));
                                echo \$this->Paginator->next(__('next'), array(), null, array('class' => 'next paginate_button paginate_button_disabled disabled'));
                                echo \$this->Paginator->last(__('last'), array(), null, array('class' => 'last paginate_button paginate_button_disabled'));
                                ?>"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->