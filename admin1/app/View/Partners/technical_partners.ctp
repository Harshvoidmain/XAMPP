<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="<?php echo $this->Html->url('/home'); ?>">Home</a></li>
                        <li><a href="javascript::">Partners</a></li>
                        <li class="active">Technical Partners</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="padding:50px 0px;text-align:center;padding-bottom: 0;">
        <h2>Technical Partners</h2>
    </div>
</div>
<hr class="style17" style="margin-top: 30px;">
<div class="container">
    <?php foreach($techspon as $techs ) { ?>
    <div class="col-md-3" style="padding:10px;">
        <div style="border:1px solid #2bbafc;border-radius:20px;padding:10px;min-height:289px;">
        <div style="width:100%">
            <?php echo $this->Html->image($techs['Company']['image'],array('style' => 'width:100%;height:100%')); ?>
        </div>
        <!--div style="width:100%;text-align: center;position: absolute;bottom:10px;">
            <?php echo $techs['Company']['name']; ?>
        </div-->
        </div>
    </div>
    <?php } ?>
</div>
