<!--  page header section -->
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="<?php echo $this->Html->url('/home'); ?>">Home</a></li>
                        <li class="active">Portals</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner start-->
<div class="container">
  <div class="col-md-6" style="height:500px;margin-left:px;margin-top:30px;border-right:1px solid lightskyblue;">
    <div style="vertical-align:middle;width:380px;margin:auto;">
      <a href="javascript::" onclick="document.getElementById('activediv').innerHTML=document.getElementById('adlogin').innerHTML;">
      <div class="loginbtn">
        <div class="btxt">
          Administrator Login
        </div>
        <div class="bimg">
          <?php echo $this->Html->image('admn.png',array('alt' => 'FCRIT', 'height' => '100%', 'width' => '100%')); ?>
        </div>
      </div></a>
      <a href="javascript::" onclick="document.getElementById('activediv').innerHTML=document.getElementById('athrlogin').innerHTML;">
      <div class="loginbtn">
        <div class="btxt">
          Author Login
        </div>
        <div class="bimg">
          <?php echo $this->Html->image('athr.png',array('alt' => 'FCRIT', 'height' => '100%', 'width' => '100%')); ?>
        </div>
      </div></a>
      <a href="javascript::" onclick="document.getElementById('activediv').innerHTML=document.getElementById('rlogin').innerHTML;">
      <div class="loginbtn">
        <div class="btxt">
          Reviewer Login
        </div>
        <div class="bimg">
          <?php echo $this->Html->image('rvwr.png',array('alt' => 'FCRIT', 'height' => '90%', 'width' => '100%', 'margin-bottom' => '0')); ?>
        </div>
      </div></a>
    </div>
  </div>
  <div class="col-md-6" style="height:500px;display:table;margin-top:10px;" id="activediv">
    <!--respective login-->
    <div style="text-align:center;vertical-align:middle;display:table-cell">Choose login type to login into respective portal </div>
  </div>

</div>
<div style="display:none;" id=adlogin>
  <div class="login-container">
            <div id="output"></div>
            <div class="avatar">
                <?php echo $this->Html->image('admn.png',array('alt' => 'FCRIT', 'height' => '100%', 'width' => '100%')); ?>
            </div>
            <div class="form-box">
                <form action="" method="">
                    <input name="user" type="text" placeholder="username">
                    <input type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                </form>
            </div>
        </div>
</div>
<div style="display:none;" id="athrlogin">
  <div class="login-container">
            <div id="output"></div>
            <div class="avatar">
                <?php echo $this->Html->image('athr.png',array('alt' => 'FCRIT', 'height' => '100%', 'width' => '100%')); ?>
            </div>
            <div class="form-box">
                <form action="" method="">
                    <input name="user" type="text" placeholder="username">
                    <input type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                    <div class="col-md-12" style="margin-top:4px;">
                        <div class="col-md-6" > 
                        <p ><a style="font-size:13px;color:  #39B3D7" href="javascript::">Sign Up</a></p>
                    </div>
                        
                    <div class="col-md-6">
                   <p > <a style="font-size:13px;color: #39B3D7" href="javascript::">Forgot Password</a></p>
                    </div>
            </div>
                </form>
            </div>
        </div>
</div>

<div style="display:none;" id="rlogin">
  <div class="login-container">
            <div id="output"></div>
            <div class="avatar">
                <?php echo $this->Html->image('rvwr.png',array('alt' => 'FCRIT', 'height' => '100%', 'width' => '100%')); ?>
            </div>
            <div class="form-box">
                <form action="" method="">
                    <input name="user" type="text" placeholder="username">
                    <input type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                </form>
            </div>
        </div>
</div>
<!--banner end-->
