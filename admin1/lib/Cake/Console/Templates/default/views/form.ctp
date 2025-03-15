<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i> <?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php echo "<?php echo \$this->Form->create('{$modelClass}', array('class'=>'form-horizontal form-bordered form-label-stripped', 'type'=>'file')); ?>\n"; ?>
                <?php
                echo "\t<?php\n";
                foreach ($fields as $field) {
                    if (strpos($action, 'add') !== false && $field == $primaryKey) {
                        continue;
                    } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                        echo "\t\techo \$this->Form->input('{$field}');\n";
                    }
                }
                if (!empty($associations['hasAndBelongsToMany'])) {
                    foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                        echo "\t\techo \$this->Form->input('{$assocName}');\n";
                    }
                }
                echo "\t?>\n";
                ?>
                <?php
                echo "<?php echo \$this->Form->end(__('Submit')); ?>\n";
                ?>
            </div>
        </div>
    </div>
</div>