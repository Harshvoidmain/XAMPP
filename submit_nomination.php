<?php
include('connection.php');
                $sql="SELECT * FROM award_category";
                $result4=mysqli_query($db,$sql);   
?>

<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#category').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#sub_category').html(html);
                    }
            }); 
        }else{
            $('#sub_category').html('<option value="">Select country first</option>');
           
        }
    });
    
   });
</script>
<style>    .info p {       
    text-align:center;       
    color: #999;      
    text-transform:none;       
    font-weight:600;      
    font-size:15px;      
    margin-top:1px    }  
    .info i {       
    color:#F6AA93;    
               }    
    p span {    
    color: #F00;    }   
    p {        
    margin: 0px;        
    font-weight: 500;        
    /* line-height: 2; */        
    color:#333;    }    
    input {       
    border-radius: 0px 5px 5px 0px;        
    border: 1px solid #2BBAFC;        
    margin-bottom: 1px;        
    width: 75%;        
    height: 50px;        
    float: left;        
    padding: 0px 5px;    }    
    a {        
    text-decoration:inherit    }    
    textarea {        
    border-radius: 0px 5px 5px 0px;        
    border: 1px solid #2BBAFC;        
    margin: 0;        
    width: 75%;        
    height: 130px;        
    float: left;        
    padding: 0px 5px;    }    
    .form-group {        
    overflow: hidden;        
    clear: both;
    padding: 5px 5px;    }    
    .icon-case {        
    width: 35px;        
    float: left;        
    border-radius: 5px 0px 0px 5px;        
    background:#F5F5F5;        
    height:42px;       
    position: relative;        
    text-align: center;        
    line-height:40px;    }    
    i {        
    color:#555;    }    
                                        .contentform {        }    
                                        .bouton-contact{        
                                            background-color: #2BBAFC;        
                                            color: #FFF;        
                                            text-align: center;        
                                            width: 100%;        
                                            border:0;        
                                            padding: 5px 5px;        
                                            border-radius: 0px 0px 5px 5px;        
                                            cursor: pointer;        
                                            margin-top: 40px;        
                                            font-size: 25px;    }    
                                            .leftcontact {        
                                                width:49.5%;         
                                                float:left;        
                                                border-right: 1px solid #87CEFA;        
                                                box-sizing: border-box;        
                                                padding: 0px 5px 0px 0px;    }    
                                                .rightcontact {        
                                                    width:49.5%;        
                                                    float:right;        
                                                    box-sizing: border-box;        
                                                    padding: 0px 0px 0px 5px;    }    
                                                    .validation {        
                                                        display:none;        
                                                        margin: 0 0 10px;        
                                                        font-weight:400;        
                                                        font-size:13px;        
                                                        color: #DE5959;    }        
                                                        input[type=submit]{ 
                                                            font-size: 18px;}


</style>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="javascript::">Excellence Awards</a></li>
                        <li class="active">Submit Nomination</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
    <body>
        <div class="container">
    <h2 style="text-align: center;">Submit Nomination</h2>
    <hr class="style17">
</div>


 <div id="wrapper" class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
        <form class="form" method="POST" action="upload.php" enctype="multipart/form-data">
          
            <div class="form-group">
                    <p>First Name <span>*</span></p>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-user" style="color:#57BC98"></span></span>
        <input class="form-control" name="fname" id="prenom" required="required" aria-required="true" type="text"></div></div>
        
            <div class="form-group">
                    <p>Last Name <span>*</span></p>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-user" style="color:#57BC98"></span></span>
            <input class="form-control" name="lname" id="prenom" required="required" aria-required="true" type="text"></div></div>
            
            <div class="form-group">
                    <p>Name & Address of the Organization <span>*</span></p>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-user" style="color:#57BC98"></span></span>
            <input class="form-control" name="oname" id="prenom" required="required" aria-required="true" type="text"></div></div>
			
			<div class="form-group">
                    <p>Present Position in the Organization <span>*</span></p>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-user" style="color:#57BC98"></span></span>
            <input class="form-control" name="position" id="prenom" required="required" aria-required="true" type="text"></div></div>
            
            <div class="form-group">
			
			<p>Date of Birth<span>*</span></p>    
              <div class="input-group">
              <span class="input-group-addon">
              <span class="fa fa-birthday-cake"  style="color:#57BC98"></span></span>
              <input class="form-control" name="dob" id="dob" required="required" aria-required="true" type="date"></div>
             </div>

                    <p>E-mail <span>*</span></p>    

    <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-envelope-o"  style="color:#57BC98"></span></span>

                    <input class="form-control" name="email" id="email" required="required" aria-required="true" type="email"></div>
</div>
            
            <div class="form-group">

                    <p>Phone No. <span>*</span></p>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-map-marker"  style="color:#57BC98"></span></span>

                    <input class="form-control" name="phone" id="postal" required="required" aria-required="true" type="text"></div>
</div>

            <div class="form-group">      
    <label style="font-size:16px;" for="Description" class="cols-sm-2 control-label">Select Award Category: <span>*</span></label>
            <div class="cols-sm-10">              
            <div class="input-group">
                <span class="input-group-addon" style="color:#57BC98" >
              <i class="fa fa-th-list  fa" aria-hidden="true" style="color:#57BC98">          </i></span>
             <select required  id="category" style="font-size:16px" class="form-control" name="category" >
             <?php
                echo '<option value="null">'.'Select Category'.'</option>';
                    while($row = mysqli_fetch_array($result4))
                    {
                        $category=$row['category'];
                        echo '<option value='.$row['id'].'>'.$category.'</option>';         
                    }           
                    ?>               
                </select></div></div></div>
                
            <div class="form-group"> 
 <label for="Description" class="cols-sm-2 control-label">Select Award Sub Category: <span>*</span></label>
 <div class="cols-sm-10">
<div class="input-group">
<span class="input-group-addon" style="color:#57BC98">           
<i class="fa fa-th-list  fa" aria-hidden="true" style="color:#57BC98">            </i>                </span>
<select required style='font-size:16px;'  name="sub_category" id="sub_category" class="form-control">
    <option value="">Select category first</option>
</select></div></div></div>

 <!--<div class="form-group">
        <p>Justification (Max. 3000 words)<span>*</span></p>
            <div class="input-group">
    <span class="input-group-addon"><span class="icon-case"><i class="fa fa-comments-o"  style="color:#57BC98"></i> </span></span>
<textarea type="textarea" rows="11" class="form-control" name="justification" required="required" aria-required="true"> </textarea>
</div> </div>-->

<div class="form-group">
                    <p>Attach PDF document justifying the candidature (File Size is upto 3MB)<span>*</span></p>
    <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-upload"  style="color:#57BC98"></span></span>
        <input name="attach_declaration" id="fileToUpload" required="required" aria-required="true" type="file" size="5120000">
		<!--<input name="attach_declaration" id="fileToUpload" required="required" aria-required="true" type="file" accept="images/pdf" size="512000">-->
    </div>   
</div>
   <!--<p style="font-size:16px">( Only .pdf format allowed )</p> to a max size of .)-->
        <br>

            <div class="form-group">
                    <p>Nomination Fee Payment Transaction No. <span>*</span></p>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-list"  style="color:#57BC98"></i></span></span>

                    <input class="form-control" name="transaction_id" id="society" required="required" aria-required="true" type="text"></div>   
</div>  <!--<p style="font-size:16px">( Pay the nomination fee and enter the Payment Transaction No.)</p> <!-- to a max size of .)-->
        <br>
     <div class="form-group">
                    <p>Declaration <span>*</span></p>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-list"  style="color:#57BC98"></i></span></span>
					 <button class="btn btn-success" onclick=" window.open('./read_declaration.php','_blank')"> Read Declaration</button>
					 &nbsp&nbsp&nbsp
					<input type="checkbox" required="required" aria-required="true" name="accept" value="accept" width="18" height="48">Accept Declaration

 </div>   
</div>
            <div class="form-group ">
          <input class="btn btn-info btn-block login" type="submit" name="Submit" data-toggle="modal" data-target="#myModal" id="submitBtn"    value="Submit"> 
 </div>             
</form>
</div></div></div>
 <?php include("footer.php");?>
</body>
</html>