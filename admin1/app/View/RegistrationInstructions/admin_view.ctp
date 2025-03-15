<div class="portlet box blue instructions view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('Instruction'); ?></div>
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
            <h3><?php echo $registrationInstruction['RegistrationInstruction']['id'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('RegistrationInstruction', 'id', $registrationInstruction['RegistrationInstruction']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($registrationInstruction['RegistrationInstruction']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Instruction'><?php echo __($this->Common->get_view_chage_log('RegistrationInstruction', 'instruction', $registrationInstruction['RegistrationInstruction']['id']) . 'Instruction'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($registrationInstruction['RegistrationInstruction']['instruction'] ); ?>
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

