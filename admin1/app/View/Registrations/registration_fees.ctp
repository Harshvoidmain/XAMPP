<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="<?php echo $this->Html->url('/home'); ?>">Home</a></li>
                        <li><a href="javascript::">Registrations</a></li>
                        <li class="active">Fees</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2 style="text-align: center">Registration Fees</h2>
    <hr class="style17">
</div>
<div class="container">
    <div class='col-md-1'></div>
    <div class="col-md-8" style="margin-left:7%;" >
    <table class="table table-striped table-inverse table-bordered">
        <tr>
            <th></th>
            <th>Category</th>
            <th>Cost (In Rupees)</th>
            <th>Cost (USD)</th>
        </tr>
        
        <?php $i = 1;
        foreach($regfees as $regfee) {?>
        <tr>
            <td style="text-align: center;"><?php echo $i; ?></td>
            <td style="text-align: justify;"><?php echo $regfee['RegistrationFee']['category']; ?></td>
            <td style="text-align: justify;"><?php echo $regfee['RegistrationFee']['costrs']; ?></td>
            <td style="text-align: justify;"><?php echo $regfee['RegistrationFee']['costd']; ?></td>
        </tr>
        <?php $i++;
        } ?>
    </table>
        </div>
    <div class='col-md-2'></div>
</div>
