<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i> <?php echo __('Edit Latest News'); ?></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php echo $this->Form->create('LatestNews', array('class'=>'form-horizontal form-bordered form-label-stripped', 'type'=>'file')); ?>
                	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('topic');
		echo $this->Form->input('description');
		echo $this->Form->input('file');
		echo $this->Form->input('is_active');
		echo $this->Form->input('created_by');
		echo $this->Form->input('created_timestamp');
	?>
                <?php echo $this->Form->end(__('Submit')); ?>
            </div>
        </div>
    </div>
</div>