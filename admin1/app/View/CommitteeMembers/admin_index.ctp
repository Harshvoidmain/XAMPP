<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey">
            <div class="portlet-title">
                <div class="caption"><i class="icon-user"></i><?php echo __('CommitteeMembers'); ?></div>
                <div class="actions">
                    <?php if ($this->Permissions->hasAccess($this->name, 'add')) { ?>
                        <?php echo $this->Html->link('<i class="icon-plus"></i> Add ' . __('Committee Member'), array('action' => 'add'), array('class' => 'btn blue', 'escape' => FALSE)); ?>
                    <?php } ?>
                    <div class="btn-group">
                        <a class="btn green" href="#" data-toggle="dropdown">
                            <i class="icon-cogs"></i> Tools
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <?php if ($this->Permissions->hasAccess($this->name, 'delete')) { ?>
                                <li><?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete Selected'), array('action' => 'deleteAll'), array('class' => '', 'escape' => false), __('Are you sure you want to delete selected?')); ?></li>
                            <?php } ?>
                            <li><?php echo $this->Html->link(__('<i class="icon-filter"></i> Filter'), array('controller' => 'Common', 'action' => 'filter', $this->name, $this->modelName), array('class' => 'fancybox', 'escape' => false)) ?></li>
                            <li class="divider"></li>
                            <li><a href="#print" id="print"><i class="icon-print"></i> Print</a></li>
                            <li><a href="#pdf" id="pdf"><i class="icon-file"></i> Save as PDF</a></li>
                            <li><a href="#excel" id="excel"><i class="icon-list-alt"></i> Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div role="grid" class="dataTables_wrapper form-inline" id="sample_2_wrapper">
                    <div class="row-fluid">
                        <div class="span6"></div>
                        <div class="span6">
                            <div class="dataTables_filter" id="sample_2_filter">
                                <label>Search: <input type="text" id="searchInput" aria-controls="sample_2" class="m-wrap small"></label>
                            </div>
                        </div>
                    </div>
                    <div class="dataTables_scrollBody" style="overflow: auto; width: 100%;">
                        <table id="sample_2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample_2_info">
                            <thead>
                                <tr class="row">
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('id'); ?></th>
                                    
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('organizing_committee_id'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('sr_no'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('name'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('designation'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('department'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('institute'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('role'); ?></th>
                                    
                                    <th class="actions hidden-480"><?php echo __('Actions'); ?></th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($committeeMembers as $committeeMember): ?>
                                    <tr class="odd gradeX row">
                                        <td><input type="checkbox" class="checkboxes" value="<?php echo h($committeeMember['CommitteeMember']['id']); ?>" /></td>
                                        <td class="hidden-480"><?php echo h($committeeMember['CommitteeMember']['id']); ?>&nbsp;</td>
                                        
                                        <td class="hidden-480">
                                            <?php echo $this->Html->link($committeeMember['OrganizingCommittee']['name'], array('controller' => 'organizingCommittees', 'action' => 'view', $committeeMember['OrganizingCommittee']['id'])); ?>
                                        </td>
                                        <td class="hidden-480"><?php echo h($committeeMember['CommitteeMember']['sr_no']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($committeeMember['CommitteeMember']['name']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($committeeMember['CommitteeMember']['designation']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($committeeMember['CommitteeMember']['department']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($committeeMember['CommitteeMember']['institute']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($committeeMember['CommitteeMember']['role']); ?>&nbsp;</td>
                                        
                                        <td class="actions hidden-480">
                                            <?php if ($this->Permissions->hasAccess($this->name, 'view')) { ?>
                                                <?php echo $this->Html->link(__('<i class="icon-eye-open"></i> View'), array('action' => 'view', $committeeMember['CommitteeMember']['id']), array('class' => 'btn purple', 'escape' => false)); ?>
                                            <?php } ?>
                                            <?php if ($this->Permissions->hasAccess($this->name, 'edit')) { ?>
                                                <?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit'), array('action' => 'edit', $committeeMember['CommitteeMember']['id']), array('class' => 'btn green', 'escape' => false)); ?>
                                            <?php } ?>
                                            <?php if ($this->Permissions->hasAccess($this->name, 'delete')) { ?>
                                                <?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete'), array('action' => 'delete', $committeeMember['CommitteeMember']['id']), array('class' => 'btn red', 'escape' => false), __('Are you sure you want to delete # %s?', $committeeMember['CommitteeMember']['id'])); ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="dataTables_info">
                                <?php
                                echo $this->Paginator->counter(array(
                                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))
                                );
                                ?>                            </div>
                        </div>
                        <div class="span6">
                            <div class="dataTables_paginate paging_full_numbers">
                                <?php
                                echo $this->Paginator->first(__('first'), array(), null, array('class' => 'first paginate_button paginate_button_disabled'));
                                echo $this->Paginator->prev(__('previous'), array(), null, array('class' => 'previous paginate_button paginate_button_disabled disabled'));
                                echo $this->Paginator->numbers(array('separator' => ''));
                                echo $this->Paginator->next(__('next'), array(), null, array('class' => 'next paginate_button paginate_button_disabled disabled'));
                                echo $this->Paginator->last(__('last'), array(), null, array('class' => 'last paginate_button paginate_button_disabled'));
                                ?>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->