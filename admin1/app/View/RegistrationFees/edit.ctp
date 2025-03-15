<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i> <?php echo __('Edit Registration Fee'); ?></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php echo $this->Form->create('RegistrationFee', array('class'=>'form-horizontal form-bordered form-label-stripped', 'type'=>'file')); ?>
                	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category');
		echo $this->Form->input('costrs');
                echo $this->Form->input('costd');
	?>
                <?php echo $this->Form->end(__('Submit')); ?>
            </div>
        </div>
    </div>
</div>
