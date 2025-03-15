<style>
    th,td{
        padding: 10px;

    }

    .nav-tabs > li > a:hover {
        border-color: #57bc90 #57bc90 #57bc90;
    }
</style>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="<?php echo $this->Html->url('/home'); ?>">Home</a></li>
                        <li><a href="javascript::">People</a></li>
                        <li class="active">Organizing Committees</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2 style="text-align: center;">Organizing Committees</h2>
    <hr class="style17">
</div>
<div class="container-fluid">
    <div class='col-md-3' style="width:23%">
        <ul class="nav nav-pills nav-stacked">
            <?php foreach($lists as $list) { 
                $id = $list['OrganizingCommittee']['id'];
                $url = '/people/organizing_committee/' . $id;
                $value = $list['OrganizingCommittee']['name'];?>
            
                <li>
                    <?php echo $this->Html->link($value, '/' . $url); ?>
                </li>
            
            <?php } ?>
        </ul>
        <?php //echo $this->element('academic_sidebar'); ?> 
    </div>
    <div class="col-md-9" style="margin:0;width:77%;padding: 0px">
        <div style="width: 400px;text-align: center;border: 2px solid #2bbafc;border-radius: 12px;margin: auto;margin-bottom: 40px;">
            <h3 style="margin: 15px;"><?php echo $department['OrganizingCommittee']['name'] ?></h3>
        </div>
        <div class="" style="width:95%;margin-left:25px;">
            <table class="table-bordered table-striped table-inverse" style="width: 100%;margin: auto">
                <tr>
                <th style="width:5%">Sr No.</th>
                    <th style="width:24%">Name</th>
                    <th style="width:15%">Designation</th>
                    <th style="width:19%">Department</th>
                <th style="width:28%">Institute</th>
                <th style="width:10%">Role</th>
                </tr>
                <?php 
                $i = 1;
                foreach($about as $abt) { ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $abt['CommitteeMember']['name']; ?></td>
                    <td><?php echo $abt['CommitteeMember']['designation']; ?></td>
                    <td><?php echo $abt['CommitteeMember']['department']; ?></td>
                    <td><?php echo $abt['CommitteeMember']['institute']; ?></td>
                    <td><?php echo $abt['CommitteeMember']['role']; ?></td>
                </tr>
                <?php $i++;
                } ?>
            </table>
        </div>
    </div>
</div>

