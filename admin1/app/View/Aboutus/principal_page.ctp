<!--  page header section -->
<div class="banner">
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ptn-bg">
                    <h2>About the Principal</h2>
                    <ol class="breadcrumb">
                        <li><?php echo $this->Html->link('Home', '/') ?></li>
                        <li><?php echo $this->Html->link('About Us', '/about-us') ?></li>
                        <li class="active">About the Principal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-container things" >
    <div style="padding: 0px 50px;">

        <div class="pname">
            <h1>Dr. S. M. Khot</h1>

            <hr class="nameunder">
        </div>
        <div class="row">
            <div class="col-md-3 kpic">
                <img src="../images/smkhot.jpg" height="230px" width="200px">
            </div>
            <div class="col-md-9 kdes">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 20px;">
            <ul class="nav nav-pills" style="margin-left: 13px;">
                <!--li class="active"><a href="#subject" role="tab"  data-toggle="tab">Subjects Taught</a></li-->
                <li><a href="#specialization" role="tab"  data-toggle="tab">Areas of Specialization</a></li>
                <li><a href="#paper" role="tab"  data-toggle="tab">Papers Presented</a></li>
            </ul>
            <div class="tab-content" style="margin: 20px 0px 0px 30px;">
                <!--div class="tab-pane row active" id="subject">
                
                </div-->
                <div class="tab-pane row active" id="specialization">
                    <?php
                    foreach($specs as $spec) {
                                       
                    echo $spec['PrincipalSpecialization']['description'];
                    echo '<br>';}
                    ?>
                </div>
                
                <div class="tab-pane row" id="paper">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Title</th>
                                <th style="text-align:center;">Description</th>
                                
                            </tr>
                        </thead>
                        <tbody style="font-family: dosis;font-style: normal;">
                            <?php foreach($papers as $paper) { 
                            
                                echo"<tr>";
                                echo"<td>";
                                echo $paper['PrincipalPaper']['title'];
                                echo '<br/>';
                                echo"</td>";
                                echo"<td>"; ?>
                                <a href="<?php echo $paper['PrincipalPaper']['link']; ?>" target="_blank">
                                <?php echo $paper['PrincipalPaper']['description'];
                                echo "<a>"
;                                echo '<br/>';
                                echo"</td>";
                                
                                echo"</tr>";
                            
                            } ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        </div>
    </div>
</div>