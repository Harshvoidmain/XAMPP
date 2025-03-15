<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i> <?php echo __('Edit Admin'); ?></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php echo $this->Form->create('Admin', array('class' => 'form-horizontal form-bordered form-label-stripped', 'type' => 'file')); ?>
                <?php
                echo $this->Form->input('id');
                echo $this->Form->input('full_name');
                echo $this->Form->input('username');
                echo $this->Form->input('email_address');
                echo $this->Form->input('contact_no');
                echo $this->Form->input('gender');
//		echo $this->Form->input('verified_hash');
//		echo $this->Form->input('forgot_password_hash');
//		echo $this->Form->input('anniversary_date');
                echo $this->Form->input('profile_picture');
                echo $this->Form->input('address');
                echo $this->Form->input('about');
                echo $this->Form->input('file');
//		echo $this->Form->input('last_login');
//		echo $this->Form->input('location');
//		echo $this->Form->input('latitude');
//		echo $this->Form->input('longitude');
//		echo $this->Form->input('number_of_people_in_network');
//		echo $this->Form->input('is_active');
//		echo $this->Form->input('created_by');
//		echo $this->Form->input('created_timestamp');
                ?>
                <?php echo $this->Form->end(__('Submit')); ?>
            </div>
        </div>
    </div>
</div>