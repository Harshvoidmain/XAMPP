<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="<?php echo $this->Html->url('/home'); ?>">Home</a></li>
                        <li><a href="javascript::">Conference Details</a></li>
                        <li class="active">Publications</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2 style="text-align: center">Publications</h2>
    <hr class="style17">
</div>
<div class="container">
    <table class="table table-inverse">
        <?php 
        foreach($pubs as $pub) {?>
        <tr>
            
            <td style="text-align: justify;"><?php echo $pub['Publication']['description']; ?></td>
        </tr>
        <?php 
        } ?>
    </table>
</div>
