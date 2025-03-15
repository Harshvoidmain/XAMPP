<div class="portlet box blue admins view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('Admin'); ?></div>
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
            <h3><?php echo $admin['Admin']['username'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('Admin', 'id', $admin['Admin']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($admin['Admin']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='FullName'><?php echo __($this->Common->get_view_chage_log('Admin', 'full_name', $admin['Admin']['id']) . 'Full Name'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($admin['Admin']['full_name']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='UserName'><?php echo __($this->Common->get_view_chage_log('Admin', 'user_name', $admin['Admin']['id']) . 'User Name'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($admin['Admin']['username']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='EMail'><?php echo __($this->Common->get_view_chage_log('Admin', 'e_mail', $admin['Admin']['id']) . 'E Mail'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($admin['Admin']['email_address']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Address'><?php echo __($this->Common->get_view_chage_log('Admin', 'address', $admin['Admin']['id']) . 'Address'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($admin['Admin']['address']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='ContactNo'><?php echo __($this->Common->get_view_chage_log('Admin', 'contact_no', $admin['Admin']['id']) . 'Contact No'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($admin['Admin']['contact_no']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Gender'><?php echo __($this->Common->get_view_chage_log('Admin', 'gender', $admin['Admin']['id']) . 'Gender'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->get_button($admin['Admin']['gender'], array('Male', 'Female')); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='ProfilePicture'><?php echo __($this->Common->get_view_chage_log('Admin', 'profile_picture', $admin['Admin']['id']) . 'Profile Picture'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->getImage($admin['Admin']['profile_picture']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='About'><?php echo __($this->Common->get_view_chage_log('Admin', 'about', $admin['Admin']['id']) . 'About'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($admin['Admin']['about']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='File'><?php echo __($this->Common->get_view_chage_log('Admin', 'file', $admin['Admin']['id']) . 'File'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->getImage($admin['Admin']['file']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='CreatedTimestamp'><?php echo __($this->Common->get_view_chage_log('Admin', 'created_timestamp', $admin['Admin']['id']) . 'Created Timestamp'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($admin['Admin']['created_timestamp']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--            <div class="row-fluid ">
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
                                                BEGIN TABS
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
                        </div>-->
        </div>
    </div>
</div>