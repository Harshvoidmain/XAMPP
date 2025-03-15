<div class="portlet box blue keynotes view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('Keynote'); ?></div>
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
            <h3><?php echo $keynote['Keynote']['name'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('Keynote', 'id', $keynote['Keynote']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($keynote['Keynote']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Name'><?php echo __($this->Common->get_view_chage_log('Keynote', 'name', $keynote['Keynote']['id']) . 'Name'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->get_button($keynote['Keynote']['name'], array('Agnel Marathi Cultural Keynote', 'Anti-Ragging Keynote', 'Women Grievance Redressal Keynote', 'Grievance Redressal Keynote', 'Women Cell')); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Designation'><?php echo __($this->Common->get_view_chage_log('Keynote', 'designation', $keynote['Keynote']['id']) . 'Designation'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($keynote['Keynote']['designation']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Description'><?php echo __($this->Common->get_view_chage_log('Keynote', 'description', $keynote['Keynote']['id']) . 'Description'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($keynote['Keynote']['description']); ?>
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

