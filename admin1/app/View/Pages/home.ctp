<script type="text/javascript">

</script>
<!-- banner start -->
<div  style="float:left;">
    <div class="row" style="width:100%">
        <div class="col-md-8"  style="margin-bottom: 50px">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                            <div class="med-img">
                            <?php echo $this->Html->image('slider/caro3.jpg', array('alt' => 'FCRIT', 'height' => '', 'width' => '100%')); ?>
                        </div>
                        <div class="carousel-caption">


                        </div>
                    </div>
                    <div class="item">
                        <div class="med-img" >
                            <?php echo $this->Html->image('slider/caro3.jpg', array('alt' => 'FCRIT', 'height' => '', 'width' => '100%')); ?>
                        </div>
                        <div class="carousel-caption">

                        </div>
                    </div>
                    <div class="item">
                        <div class="med-img" >
                            <?php echo $this->Html->image('slider/caro3.jpg', array('alt' => 'FCRIT', 'height' => '', 'width' => '100%')); ?>
                        </div>
                        <div class="carousel-caption">

                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                                                                             href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                    </span></a>
            </div>

        </div>



        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b>News</b></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul id="demo3" style="color:#2C2C2A">
                                <?php foreach ($latest_news as $latest) { ?>
                                    <li class="news-item" style="color:#2C2C2A">
                                        <strong><?php echo String::truncate($latest['LatestNews']['topic'], $length = 22); ?></strong><br>
                                        <?php echo String::truncate($latest['LatestNews']['description'], $length = 140); ?>
                                        <a class="anews" href="<?php echo $this->Html->url('/latest_news/' . $latest['LatestNews']['id']); ?>">Read More</a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>




                <div class="panel-footer"> </div>
            </div>
        </div>
    </div>
</div>
</div>


<div id="push">
</div>
<div class="container">



</div>
<hr class="style17" style="margin-top:15px;">



<div class="row">
    <div class="hmttl col-md-6" style="border-right: 1px black ">
        <h2>About the Institute</h2>
    
    <div class="hmabt1 " style="text-align:justify;">
        Fr. C. Rodrigues Institute of Technology was established in 1994 in the heart of Navi Mumbai, Vashi, as a part of Agnel Technical Education Complex. The main aim of the Institute is to provide quality technical education in addition to inculcating moral values in its students. Apart from academic excellence, the institute is also reputed for its extensive facilities that have led to it being awarded an "A" grade by the Directorate of Technical Education, Maharashtra (INDIA) right from its inception. The institute is affiliated to the University of Mumbai and it has been accorded accreditation for all its courses by the National Board of Accreditation, Delhi. The College has been granted Religious minority status.
    </div>
    </div>
    
    <div class="hmttl col-md-6">
        <h2>About the Conference</h2>
    
    <div class="hmabt2 " style="text-align: justify;">
        It is proposed to organize the 2nd Biennial international Conference on Nascent Technologies in Engineering (ICNTE 2017) at Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai (INDIA). This conference offers an occasion to bring together practitioners in the forefront of technologies from different parts of the world to share their research findings. In addition to paper presentations, the conference will also comprise of keynote addresses by experts from leading Institutions, Research Organizations, and Industries. The information disseminated through this technical interaction will expose the newcomers and knowledge seekers in various engineering fields to the advancements in latest technologies.
    </div>
    </div>
</div>


<hr class="style17" style="margin: 0;">
<br><br>
<!--hr class="style17" style="margin-bottom: 50px;padding-bottom: 0.1px;"-->
<div class="row">

    <div class="col-md-6" style="padding: 20px;border-right: 1px solid lightskyblue;">
       
        <div> 
        <div style="width: 300px;text-align: center;border: 3px solid #2bbafc;border-radius: 12px;margin: auto;margin-bottom: 40px;">
            <h2 style="margin: 15px;">Technical Partners</h2>
        </div>
        <div style="width:100%">
            <?php foreach ($techc as $tech) { ?>
            <div class="col-md-4" style="height: 150px;">
                <?php echo $this->Html->image($tech['Company']['image'],array('style' => 'width:100%;height:100%')); ?>
            </div>
            <?php } ?>
        </div>
        </div>
        
        <div class="visible-sm visible-xs" style="margin-left: 50px">
            <a href="<?php echo $this->Html->url('/technical_partner'); ?>" class="btn btn-default btn-yellow" style="margin: auto;">See All Technical Partners</a>
        </div>
        
    </div>
    <div class="col-md-6" style="padding: 20px;">
        <div>
        <div style="width: 300px;text-align: center;border: 3px solid #2bbafc;border-radius: 12px;margin: auto;margin-bottom: 40px;">
            <h2 style="margin: 15px;">Financial Partners</h2>
        </div>
        <div style="width:100%">
            <?php foreach ($finc as $fin) { ?>
            <div class="col-md-4">
                <?php echo $this->Html->image($fin['Company']['image'],array('style' => 'width:100%;')); ?>
            </div>
            <?php } ?>
        </div>
        </div>
        
        
        <div class="visible-sm visible-xs" style="margin-left: 50px">
            <a href="<?php echo $this->Html->url('/financial_partner'); ?>" class="btn btn-default btn-yellow" style="margin: auto;">See All Financial Partners</a> 
        </div>
    </div>
</div>
<div class="row col-md-12">
    <div class="col-md-1    " ></div>
    <div class="col-md-3 visible-lg visible-md" style="padding-left: 120px" >
        <a href="<?php echo $this->Html->url('/technical_partner'); ?>" class="btn btn-default btn-yellow" style="margin: auto;">See All Technical Partners</a>
    </div>
     <div class="col-md-4" ></div>
    <div class="col-md-4  visible-lg visible-md" >
        <a href="<?php echo $this->Html->url('/financial_partner'); ?>" class="btn btn-default btn-yellow" style="margin: auto;">See All Financial Partners</a>
    </div>
</div>
