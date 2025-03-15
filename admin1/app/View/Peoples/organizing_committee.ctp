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

    <div class="col-md-10 col-md-offset-1">

        <?php foreach($lists as $list) { ?>
          <div style="margin-bottom:100px;">
          <div style="width: 300px;text-align: center;border: 2px solid #2bbafc;border-radius: 12px;margin: auto;margin-bottom: 40px;">
              <h3 style="margin: 15px;"><?php echo $list['OrganizingCommittee']['name'] ?></h3>
          </div>
          <table class="table table-striped table-responsive table-condensed">
            <tr>
              <th class="col-md-5">Name</th>
              <th class="col-md-7">Designation</th>
            </tr>
            <?php foreach($abts as $abt) {
              if($abt['OrganizingCommittee']['id'] == $list['OrganizingCommittee']['id']) { ?>
                <tr>
                  <td class="col-md-5"><?php echo $abt['CommitteeMember']['name']; ?></td>
                  <td class="col-md-7"><?php echo $abt['CommitteeMember']['designation']; ?></td>
                </tr>
              <?php } } ?>
            </table>
          </div>
          <?php } ?>


        <!--div style="width: 300px;text-align: center;border: 2px solid #2bbafc;border-radius: 12px;margin: auto;margin-bottom: 40px;">
            <h3 style="margin: 15px;"><?php echo $depts['OrganizingCommittee']['name'] ?></h3>
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
                foreach($abts as $abt) { ?>
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
        </div-->
    </div>
</div>
