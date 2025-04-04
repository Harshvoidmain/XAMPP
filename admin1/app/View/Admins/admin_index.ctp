<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey">
            <div class="portlet-title">
                <div class="caption"><i class="icon-user"></i><?php echo __('Admins'); ?></div>
                <div class="actions">
                    <?php if ($this->Permissions->hasAccess($this->name, 'add')) { ?>
                        <?php echo $this->Html->link('<i class="icon-plus"></i> Add ' . __('Admin'), array('action' => 'add'), array('class' => 'btn blue', 'escape' => FALSE)); ?>
                    <?php } ?>
                    <div class="btn-group">
                        <a class="btn green" href="#" data-toggle="dropdown">
                            <i class="icon-cogs"></i> Tools
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <?php if ($this->Permissions->hasAccess($this->name, 'delete')) { ?>
                                <li><?php echo $this->Html->link(__('<i class="icon-trash"></i> Delete Selected'), '#', array('class' => '', 'escape' => false, 'id' => 'deleteAll')); ?></li>
                            <?php } ?>
<!--                            <li><?php echo $this->Html->link(__('<i class="icon-filter"></i> Filter'), array('controller' => 'Common', 'action' => 'filter', $this->name, $this->modelName), array('class' => 'fancybox', 'escape' => false)) ?></li>
                        <li class="divider"></li>
                        <li><a href="#print" id="print"><i class="icon-print"></i> Print</a></li>
                        <li><a href="#pdf" id="pdf"><i class="icon-file"></i> Save as PDF</a></li>
                        <li><a href="#excel" id="excel"><i class="icon-list-alt"></i> Export to Excel</a></li>-->
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
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('full_name'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('username'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('email id'); ?></th>
<!--                                                                            <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('password'); ?></th>-->
<!--                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('d.o.b'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('address'); ?></th>-->
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('contact'); ?></th><!--
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('verified'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('verified_hash'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('forgot_password_hash'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('gender'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('anniversary_date'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('profile_picture'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('about'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('last_login'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('location'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('latitude'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('longitude'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('number_of_people_in_network'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('file'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('facebook_access_token'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('facebook_id'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('facebook_username'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('facebook_link'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('gplus_access_token'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('glpus_access_token'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('gplus_id'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('gplus_link'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('facebook_post_permission'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('gplus_post_permission'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('is_active'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('created_by'); ?></th>
                                    <th class="hidden-480 sorting"><?php echo $this->Paginator->sort('created_timestamp'); ?></th>-->
                                    <th class="actions hidden-480"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admins as $admin): ?>
                                    <tr class="odd gradeX row">
                                        <td><input type="checkbox" class="checkboxes" value="<?php echo h($admin['Admin']['id']); ?>" /></td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['id']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo $this->Html->image($admin['Admin']['profile_picture'] . '_40.jpg', array('class' => 'thumbnail')) . ' ' . h($admin['Admin']['full_name']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['username']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['email_address']); ?>&nbsp;</td>
                        <!--		<td class="hidden-480"><?php echo h($admin['Admin']['password']); ?>&nbsp;</td>-->
        <!--                                        <td class="hidden-480"><?php echo h($admin['Admin']['date_of_birth']); ?>&nbsp;</td>
                                            <td class="hidden-480"><?php echo h($admin['Admin']['address']); ?>&nbsp;</td>-->
                                        <td class="hidden-480"><?php echo h($admin['Admin']['contact_no']); ?>&nbsp;</td>
                        <!--		<td class="hidden-480"><?php echo $this->Common->get_button($admin['Admin']['verified'], NULL); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['verified_hash']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['forgot_password_hash']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo $this->Common->get_button($admin['Admin']['gender'], array('Male', 'Female')); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['anniversary_date']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['profile_picture']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['about']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['last_login']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['location']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['latitude']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['longitude']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['number_of_people_in_network']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['file']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['facebook_access_token']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['facebook_id']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['facebook_username']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['facebook_link']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['gplus_access_token']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['glpus_access_token']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['gplus_id']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['gplus_link']); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo $this->Common->get_button($admin['Admin']['facebook_post_permission'], NULL); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo $this->Common->get_button($admin['Admin']['gplus_post_permission'], NULL); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo $this->Common->get_button($admin['Admin']['is_active'], NULL); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo $this->Common->get_button($admin['Admin']['created_by'], NULL); ?>&nbsp;</td>
                                        <td class="hidden-480"><?php echo h($admin['Admin']['created_timestamp']); ?>&nbsp;</td>-->
                                        <td class="actions hidden-480">
                                            <?php if ($this->Permissions->hasAccess($this->name, 'view')) { ?>
                                                <?php echo $this->Html->link(__('<i class="icon-eye-open"></i> View'), array('action' => 'view', $admin['Admin']['id']), array('class' => 'btn purple', 'escape' => false)); ?>
                                            <?php } ?>
                                            <?php if ($this->Permissions->hasAccess($this->name, 'edit')) { ?>
                                                <?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit'), array('action' => 'edit', $admin['Admin']['id']), array('class' => 'btn green', 'escape' => false)); ?>
                                            <?php } ?>
                                            <?php if ($this->Permissions->hasAccess($this->name, 'delete')) { ?>
                                                <?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete'), array('action' => 'delete', $admin['Admin']['id']), array('class' => 'btn red', 'escape' => false), __('Are you sure you want to delete # %s?', $admin['Admin']['id'])); ?>
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