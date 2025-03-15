<div class="portlet box blue reviewers view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('Reviewer'); ?></div>
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
            <h3><?php echo $reviewer['Reviewer']['name'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('Reviewer', 'id', $reviewer['Reviewer']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($reviewer['Reviewer']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Name'><?php echo __($this->Common->get_view_chage_log('Reviewer', 'name', $reviewer['Reviewer']['id']) . 'Name'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->get_button($reviewer['Reviewer']['name'], array('Agnel Marathi Cultural Reviewer', 'Anti-Ragging Reviewer', 'Women Grievance Redressal Reviewer', 'Grievance Redressal Reviewer', 'Women Cell')); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Designation'><?php echo __($this->Common->get_view_chage_log('Reviewer', 'designation', $reviewer['Reviewer']['id']) . 'Designation'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($reviewer['Reviewer']['designation']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Institute'><?php echo __($this->Common->get_view_chage_log('Reviewer', 'institute', $reviewer['Reviewer']['id']) . 'Institute'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($reviewer['Reviewer']['institute']); ?>
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

