<div class="portlet box blue organizingCommittees view">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo __('Organizing Committee'); ?></div>
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
            <h3><?php echo $organizingCommittee['OrganizingCommittee']['name'] ?></h3>
            <div class="row-fluid">
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='Id'><?php echo __($this->Common->get_view_chage_log('OrganizingCommittee', 'id', $organizingCommittee['OrganizingCommittee']['id']) . 'Id'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($organizingCommittee['OrganizingCommittee']['id']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="span6 ">
                    <div class="control-group">
                        <label class='control-label' for='OrganizingCommitteeName'><?php echo __($this->Common->get_view_chage_log('OrganizingCommittee', 'name', $organizingCommittee['OrganizingCommittee']['id']) . 'Name'); ?></label>
                        <div class='controls'>
                            <span class='text'>
                                <?php echo h($organizingCommittee['OrganizingCommittee']['name']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>