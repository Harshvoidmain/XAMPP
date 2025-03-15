<div class="portlet box blue latestNews view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php  echo __('Latest News'); ?></div>
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
            <h3><?php echo $latestNews['LatestNews']['id'] ?></h3>
                                <div class="row-fluid">
                                            <div class="span6 ">
                        <div class="control-group">
                            		<label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('LatestNews','id',$latestNews['LatestNews']['id']) . 'Id'); ?></label>
		<div class='controls'>
			<span class='text'>
				<?php echo h($latestNews['LatestNews']['id']); ?>
				</span>
			</div>
                        </div>
                    </div>
                                        <div class="span6 ">
                        <div class="control-group">
                            		<label class='control-label' for='Type'><?php echo __($this->Common->get_view_chage_log('LatestNews','type',$latestNews['LatestNews']['id']) . 'Type'); ?></label>
		<div class='controls'>
			<span class='text'>
				<?php echo $this->Common->get_button($latestNews['LatestNews']['type'],array('old','new')); ?>
				</span>
			</div>
                        </div>
                    </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span6 ">
                        <div class="control-group">
                            		<label class='control-label' for='Topic'><?php echo __($this->Common->get_view_chage_log('LatestNews','topic',$latestNews['LatestNews']['id']) . 'Topic'); ?></label>
		<div class='controls'>
			<span class='text'>
				<?php echo h($latestNews['LatestNews']['topic']); ?>
				</span>
			</div>
                        </div>
                    </div>
                                        <div class="span6 ">
                        <div class="control-group">
                            		<label class='control-label' for='Description'><?php echo __($this->Common->get_view_chage_log('LatestNews','description',$latestNews['LatestNews']['id']) . 'Description'); ?></label>
		<div class='controls'>
			<span class='text'>
				<?php echo h($latestNews['LatestNews']['description']); ?>
				</span>
			</div>
                        </div>
                    </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span6 ">
                        <div class="control-group">
                            		<label class='control-label' for='File'><?php echo __($this->Common->get_view_chage_log('LatestNews','file',$latestNews['LatestNews']['id']) . 'File'); ?></label>
		<div class='controls'>
			<span class='text'>
				<?php echo h($latestNews['LatestNews']['file']); ?>
				</span>
			</div>
                        </div>
                    </div>
                                        <div class="span6 ">
                        <div class="control-group">
                            		<label class='control-label' for='IsActive'><?php echo __($this->Common->get_view_chage_log('LatestNews','is_active',$latestNews['LatestNews']['id']) . 'Is Active'); ?></label>
		<div class='controls'>
			<span class='text'>
				<?php echo $this->Common->get_button($latestNews['LatestNews']['is_active'],NULL); ?>
				</span>
			</div>
                        </div>
                    </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span6 ">
                        <div class="control-group">
                            		<label class='control-label' for='CreatedBy'><?php echo __($this->Common->get_view_chage_log('LatestNews','created_by',$latestNews['LatestNews']['id']) . 'Created By'); ?></label>
		<div class='controls'>
			<span class='text'>
				<?php echo h($latestNews['LatestNews']['created_by']); ?>
				</span>
			</div>
                        </div>
                    </div>
                                        <div class="span6 ">
                        <div class="control-group">
                            		<label class='control-label' for='CreatedTimestamp'><?php echo __($this->Common->get_view_chage_log('LatestNews','created_timestamp',$latestNews['LatestNews']['id']) . 'Created Timestamp'); ?></label>
		<div class='controls'>
			<span class='text'>
				<?php echo h($latestNews['LatestNews']['created_timestamp']); ?>
				</span>
			</div>
                        </div>
                    </div>
                                        </div>
                            </div>
    </div>
</div>
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
                                                            </ul>
                            <div class="tab-content">
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
