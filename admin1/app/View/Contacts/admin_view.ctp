<div class="portlet box blue contacts view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('Contact'); ?></div>
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
            <h3><?php echo $contact['Contact']['name'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('Contact', 'id', $contact['Contact']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($contact['Contact']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Name'><?php echo __($this->Common->get_view_chage_log('Contact', 'name', $contact['Contact']['id']) . 'Name'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->get_button($contact['Contact']['name'], array('Agnel Marathi Cultural Contact', 'Anti-Ragging Contact', 'Women Grievance Redressal Contact', 'Grievance Redressal Contact', 'Women Cell')); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Email'><?php echo __($this->Common->get_view_chage_log('Contact', 'email', $contact['Contact']['id']) . 'Email'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($contact['Contact']['email']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            
            
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Phone'><?php echo __($this->Common->get_view_chage_log('Contact', 'phone', $contact['Contact']['id']) . 'Phone'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($contact['Contact']['phone']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Company'><?php echo __($this->Common->get_view_chage_log('Contact', 'company', $contact['Contact']['id']) . 'Company'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($contact['Contact']['company']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Message'><?php echo __($this->Common->get_view_chage_log('Contact', 'message', $contact['Contact']['id']) . 'Message'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($contact['Contact']['message']); ?>
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

