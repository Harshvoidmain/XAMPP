
<style>


    .info p {
        text-align:center;
        color: #999;
        text-transform:none;
        font-weight:600;
        font-size:15px;
        margin-top:2px
    }

    .info i {
        color:#F6AA93;
    }
    form h1 {
        font-size: 18px;
        background: #F6AA93 none repeat scroll 0% 0%;
        color: rgb(255, 255, 255);
        padding: 22px 25px;
        border-radius: 5px 5px 0px 0px;
        margin: auto;
        text-shadow: none; 
        text-align:left
    }

    form {
        border-radius: 5px;
        max-width:700px;
        width:100%;
        margin: 5% auto;
        background-color: #FFFFFF;
        overflow: hidden;
    }

    p span {
        color: #F00;
    }

    p {
        margin: 0px;
        font-weight: 500;
        //line-height: 2;
        color:#333;
    }

    h1 {
        text-align:center; 
        color: #666;
        text-shadow: 1px 1px 0px #FFF;
        margin:50px 0px 0px 0px
    }

    input {
        border-radius: 0px 5px 5px 0px;
        border: 1px solid #2BBAFC;
        margin-bottom: 15px;
        width: 75%;
        height: 40px;
        float: left;
        padding: 0px 15px;
    }

    a {
        text-decoration:inherit
    }

    textarea {
        border-radius: 0px 5px 5px 0px;
        border: 1px solid #2BBAFC;
        margin: 0;
        width: 75%;
        height: 130px; 
        float: left;
        padding: 0px 15px;
    }

    .form-group {
        overflow: hidden;
        clear: both;
    }

    .icon-case {
        width: 35px;
        float: left;
        border-radius: 5px 0px 0px 5px;
        background:#F5F5F5;
        height:42px;
        position: relative;
        text-align: center;
        line-height:40px;
    }

    i {
        color:#555;
    }

    .contentform {
        padding: 40px 30px;
    }

    .bouton-contact{
        background-color: #2BBAFC;
        color: #FFF;
        text-align: center;
        width: 100%;
        border:0;
        padding: 17px 25px;
        border-radius: 0px 0px 5px 5px;
        cursor: pointer;
        margin-top: 40px;
        font-size: 18px;
    }

    .leftcontact {
        width:49.5%; 
        float:left;
        border-right: 1px solid #87CEFA;
        box-sizing: border-box;
        padding: 0px 15px 0px 0px;
    }

    .rightcontact {
        width:49.5%;
        float:right;
        box-sizing: border-box;
        padding: 0px 0px 0px 15px;
    }

    .validation {
        display:none;
        margin: 0 0 10px;
        font-weight:400;
        font-size:13px;
        color: #DE5959;
    }

    #sendmessage {
        border:1px solid #fff;
        display:none;
        text-align:center;
        margin:10px 0;
        font-weight:600;
        margin-bottom:30px;
        background-color: #EBF6E0;
        color: #5F9025;
        border: 1px solid #B3DC82;
        padding: 13px 40px 13px 18px;
        border-radius: 3px;
        box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.03);
    }

    #sendmessage.show,.show  {
        display:block;
    }
</style>

<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="<?php echo $this->Html->url('/home'); ?>">Home</a></li>
                        <li>Contact_Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    
    <form id="ContactAddForm" method="post" action="<?php echo $this->html->url('/contact_us');?>">


        <div class="contentform">
            <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>


            <div class="leftcontact">

                <div class="form-group">
                    <p>Name <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-user" style="color:#57BC98"></i></span>
                    <input type="text" name="name" id="prenom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné."/>
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>E-mail <span>*</span></p>	
                    <span class="icon-case"><i class="fa fa-envelope-o"  style="color:#57BC98"></i></span>
                    <input type="email" name="email" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                    <div class="validation"></div>
                </div>	


                <div class="form-group">
                    <p>Phone No. <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-map-marker"  style="color:#57BC98"></i></span>
                    <input type="text" name="phone" id="postal" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Code postal' doit être renseigné."/>
                    <div class="validation"></div>
                </div>	


            </div>

            <div class="rightcontact">	


                <div class="form-group">
                    <p>Institute/Company <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-home"  style="color:#57BC98"></i></span>
                    <input type="text" name="company" id="society" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Société' doit être renseigné."/>
                    <div class="validation"></div>
                </div>



                <div class="form-group">
                    <p>Message <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-comments-o"  style="color:#57BC98"></i></span>
                    <textarea name="message" rows="14" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Message' doit être renseigné."></textarea>
                    <div class="validation"></div>
                </div>	
            </div>
        </div>
        <input type="submit" name="submit" class="btn-yellow" style=" text-align: center;
               width: 100%;
               border:0;
               padding: 17px 25px;
               border-radius: 0px 0px 5px 5px;
               cursor: pointer;
               margin-top: 40px;
               font-size: 18px;"> Send

    </form>	


</div>
<?php
$mysqli = new mysqli("localhost", "root", "", "icnte");

if(isset($_POST['submit'])) {
    $cname = $_POST['name'];
    $cemail = $_POST['email'];
    $cphone = $_POST['phone'];
    $cinst = $_POST['company'];
    $cmsg = $_POST['message'];
    
    $sql = "INSERT INTO contacts VALUES('$cname','$cemail','$cphone','$cinst','$cmsg')";
    
    if ($mysqli->query($sql) === TRUE) {
        //include ("../includes/admin_layout.php");
        //echo "<center>New record created successfully</center>";
        echo "<script>window.alert('Message saved')</script> ";
        
        
    } else {

        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>