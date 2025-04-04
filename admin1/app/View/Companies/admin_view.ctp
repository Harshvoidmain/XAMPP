<div class="portlet box blue companies view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('Company'); ?></div>
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
            <h3><?php echo $company['Company']['name'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('Company', 'id', $company['Company']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($company['Company']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Name'><?php echo __($this->Common->get_view_chage_log('Company', 'name', $company['Company']['id']) . 'Name'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($company['Company']['name']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Image'><?php echo __($this->Common->get_view_chage_log('Company', 'image', $company['Company']['id']) . 'Image'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Html->image(h($company['Company']['image'].'_160.jpg')); ?>
                            </span>
                        </div>
                    </div>
                </div> 
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Type'><?php echo __($this->Common->get_view_chage_log('Company', 'type', $company['Company']['id']) . 'Type'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->get_button($company['Company']['type'], array('Technical','Financial')); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='DisplayHome'><?php echo __($this->Common->get_view_chage_log('Company', 'displayhome', $company['Company']['id']) . 'Display on Home'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->get_button($company['Company']['displayhome'], NULL); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='CreatedBy'><?php echo __($this->Common->get_view_chage_log('Company', 'created_by', $company['Company']['id']) . 'Created By'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($company['Company']['created_by']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='CreatedTimestamp'><?php echo __($this->Common->get_view_chage_log('Company', 'created_timestamp', $company['Company']['id']) . 'Created Timestamp'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($company['Company']['created_timestamp']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>