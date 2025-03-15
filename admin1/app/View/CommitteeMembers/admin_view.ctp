<div class="portlet box blue committeeMembers view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('Committee Member'); ?></div>
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
            <h3><?php echo $committeeMember['CommitteeMember']['id'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('CommitteeMember', 'id', $committeeMember['CommitteeMember']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($committeeMember['CommitteeMember']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Type'><?php echo __($this->Common->get_view_chage_log('CommitteeMember', 'type', $committeeMember['CommitteeMember']['id']) . 'Type'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Common->get_button($committeeMember['CommitteeMember']['type'], array('Under-graduate', 'Post-graduate', 'PhD')); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='OrganizingCommittee'> <?php echo __($this->Common->get_view_chage_log('CommitteeMember', 'organizing_committee_id', $committeeMember['CommitteeMember']['id']) . 'OrganizingCommittee'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo $this->Html->link($committeeMember['OrganizingCommittee']['name'], array('controller' => 'organizingCommittees', 'action' => 'view', $committeeMember['OrganizingCommittee']['id'])); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Name'><?php echo __($this->Common->get_view_chage_log('CommitteeMember', 'name', $committeeMember['CommitteeMember']['id']) . 'Name'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($committeeMember['CommitteeMember']['name']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Designation'><?php echo __($this->Common->get_view_chage_log('CommitteeMember', 'designation', $committeeMember['CommitteeMember']['id']) . 'Designation'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($committeeMember['CommitteeMember']['designation']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <label class='control-label' for='Department'><?php echo __($this->Common->get_view_chage_log('CommitteeMember', 'department', $committeeMember['CommitteeMember']['id']) . 'Department'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($committeeMember['CommitteeMember']['department']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Institute'><?php echo __($this->Common->get_view_chage_log('CommitteeMember', 'institute', $committeeMember['CommitteeMember']['id']) . 'Institute'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($committeeMember['CommitteeMember']['institute']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <label class='control-label' for='Role'><?php echo __($this->Common->get_view_chage_log('CommitteeMember', 'role', $committeeMember['CommitteeMember']['id']) . 'Role'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($committeeMember['CommitteeMember']['role']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                
            </div>
          
        </div>
    </div>
</div>

