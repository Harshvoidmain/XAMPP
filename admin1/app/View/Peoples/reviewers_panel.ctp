<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="<?php echo $this->Html->url('/home'); ?>">Home</a></li>
                        <li><a href="javascript::">People</a></li>
                        <li class="active">Reviewers Panel</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2 style="text-align: center;">Reviewers Panel</h2>
    <hr class="style17">
</div>
<div class="">
    <table class="table table-striped table-inverse " style="text-align: center;vertical-align: middle">
        <thead>
        <tr>
      <th scope="row " style="text-align: center;vertical-align: middle;width:10%;">Sr No.</th>
      <th  style="text-align: center;vertical-align: middle;width:20%;">Name</th>
      <th  style="text-align: center;vertical-align: middle;width:35%;">Designation</th>
      <th  style="text-align: center;vertical-align: middle;width:35%;">Institute/ Organization</th>
<!--      <th  style="text-align: center;vertical-align: middle;width:20%;">Role</th>-->
    </tr>
        </thead>
    <?php 
    $id = 1;
    foreach($reviewers as $reviewer) { ?>
    <tr>
      <th scope="row"  style="text-align: center;vertical-align: middle"><?php echo $id; ?></th>
      <td><?php echo $reviewer['Reviewer']['name']; ?></td>
      <td><?php echo $reviewer['Reviewer']['designation']; ?></td>
      <td><?php echo $reviewer['Reviewer']['institute']; ?></td>
<!--      <td><?php echo $reviewer['Reviewer']['role']; ?></td>-->
      
    </tr>
    <?php $id++;
    } ?>
    
  
</table>
</div>
