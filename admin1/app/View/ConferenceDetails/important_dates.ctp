<style>
    .agenda {  }
    th,td {
        padding: 15px !important;
    }
    /* Dates */
    .agenda .agenda-date { width: 300px; }
    .agenda .agenda-date .dayofmonth {
        width: 40px;
        font-size: 45px;
        line-height: 36px;
        float: left;
        text-align: right;
        margin-right: 10px; 
    }
    .agenda .agenda-date .shortdate {
        font-size: 0.75em; 
    }


    /* Times */
    .agenda .agenda-time { width: 140px; } 


    /* Events */
    .agenda .agenda-events {  } 
    .agenda .agenda-events .agenda-event {  } 

    @media (max-width: 767px) {

    }
</style>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="<?php echo $this->Html->url('/home'); ?>">Home</a></li>
                        <li><a href="javascript::">Conference Details</a></li>
                        <li class="active">Important Dates</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2 style="text-align: center">Important Dates</h2>
    <hr class="style17">
</div>
<div class="container">
    <div class="col-md-2"></div>
    <div class="agenda col-md-8" >
        <div class="table-responsive"  style="width:100%;margin:auto;">
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
<!--                        <th>Time</th>-->
                        
                    </tr>
                </thead>
                <tbody>
                    <!-- Single event in a single day -->

                    <?php foreach ($events as $event) {
                       
                                    $date = $event['ImportantDate']['date'];
                                    $eventdate = explode('-', $date);
                                    $month = $eventdate[1];
                                    $day = $eventdate[2];
                                    $year = $eventdate[0];
                                    $dayno = date('w', strtotime($date));
                    ?>
                        <tr>
                            <td class="agenda-events">
                                <div class="agenda-event">

                        <?php echo $event['ImportantDate']['event']; ?>
                                </div>
                            </td>
                            <td class="agenda-date" class="active" rowspan="1" style="padding: 15px;">
                                <div class="dayofmonth" style="margin-right: 25px;">
                                    <?php echo $day; ?>
                                </div>
                                <div class="dayofweek">
                                    <?php
                                    if($dayno == 0) {echo 'Sunday';}
                                    elseif($dayno == 1) {echo 'Monday';}
                                    elseif($dayno == 2) {echo 'Tuesday';}
                                    elseif($dayno == 3) {echo 'Wednesday';}
                                    elseif($dayno == 4) {echo 'Thursday';}
                                    elseif($dayno == 5) {echo 'Friday';}
                                    elseif($dayno == 6) {echo 'Saturday';}
                                    ?>
                                </div>
                                <div class="shortdate text-muted">
                                    <?php
                                    if($month == 01) {echo 'January';}
                                    elseif($month == 02) {echo 'February';}
                                    elseif($month == 03) {echo 'March';}
                                    elseif($month == 04) {echo 'April';}
                                    elseif($month == 05) {echo 'May';}
                                    elseif($month == 06) {echo 'June';}
                                    elseif($month == 07) {echo 'July';}
                                    elseif($month == 08) {echo 'August';}
                                    elseif($month == 09) {echo 'September';}
                                    elseif($month == 10) {echo 'October';}
                                    elseif($month == 11) {echo 'November';}
                                    elseif($month == 12) {echo 'December';}
                                    //echo $month;
                                    echo ', ';
                                    echo $year;
                                    ?></div>
                            </td>
    <!--                        <td class="agenda-time">
                                5:30 AM
                            </td>-->
                            
                        </tr>
<?php } ?>
                    <!-- Multiple events in a single day (note the rowspan) -->

                </tbody>
            </table>
        </div>
    </div>
</div>

