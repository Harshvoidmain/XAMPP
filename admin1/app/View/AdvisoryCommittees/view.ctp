<div class="portlet box blue advisoryCommittees view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('AdvisoryCommittee'); ?></div>
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
            <h3><?php echo $advisoryCommittee['AdvisoryCommittee']['name'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('AdvisoryCommittee', 'id', $advisoryCommittee['AdvisoryCommittee']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($advisoryCommittee['AdvisoryCommittee']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Name'><?php echo __($this->Common->get_view_chage_log('AdvisoryCommittee', 'name', $advisoryCommittee['AdvisoryCommittee']['id']) . 'Name'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->get_button($advisoryCommittee['AdvisoryCommittee']['name'], array('Agnel Marathi Cultural AdvisoryCommittee', 'Anti-Ragging AdvisoryCommittee', 'Women Grievance Redressal AdvisoryCommittee', 'Grievance Redressal AdvisoryCommittee', 'Women Cell')); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Designation'><?php echo __($this->Common->get_view_chage_log('AdvisoryCommittee', 'designation', $advisoryCommittee['AdvisoryCommittee']['id']) . 'Designation'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($advisoryCommittee['AdvisoryCommittee']['designation']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Institute'><?php echo __($this->Common->get_view_chage_log('AdvisoryCommittee', 'institute', $advisoryCommittee['AdvisoryCommittee']['id']) . 'Institute'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($advisoryCommittee['AdvisoryCommittee']['institute']); ?>
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

