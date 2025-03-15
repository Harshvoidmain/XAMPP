<div class="portlet box blue registrationFees view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('Registration Fee'); ?></div>
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
            <h3><?php echo $registrationFee['RegistrationFee']['category'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('RegistrationFee', 'id', $registrationFee['RegistrationFee']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($registrationFee['RegistrationFee']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Category'><?php echo __($this->Common->get_view_chage_log('RegistrationFee', 'category', $registrationFee['RegistrationFee']['id']) . 'Category'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->get_button($registrationFee['RegistrationFee']['category'], array('Agnel Marathi Cultural RegistrationFee', 'Anti-Ragging RegistrationFee', 'Women Grievance Redressal RegistrationFee', 'Grievance Redressal RegistrationFee', 'Women Cell')); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">

                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Costrs'><?php echo __($this->Common->get_view_chage_log('RegistrationFee', 'costrs', $registrationFee['RegistrationFee']['id']) . 'Costrs'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($registrationFee['RegistrationFee']['costrs']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Costd'><?php echo __($this->Common->get_view_chage_log('RegistrationFee', 'costd', $registrationFee['RegistrationFee']['id']) . 'Costd'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($registrationFee['RegistrationFee']['costd']); ?>
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

