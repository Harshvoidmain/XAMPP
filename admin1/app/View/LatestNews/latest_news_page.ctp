
<br/> <br/>
<div class="blockquote-ct">
    <div class="row">
        <div class="col-md-offset-1 col-md-10" style="height: 800px;text-align:center;padding-top:40px;">
            <h2> <?php echo $news['LatestNews']['topic']; ?> </h2> <br/>
            <hr class="style17" style="margin-top:20px;">
            <p><?php echo $news['LatestNews']['description']; ?> </p> <br/>
            <!--p><?php echo $news['LatestNews']['design']; ?> </p--> <br/>
            <a href="<?php echo $this->Html->url($news['LatestNews']['file']); ?>" class="btn btn-default btn-yellow">Download Attachment</a>
        </div>
    </div>
</div>
