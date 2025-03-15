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
 <!--<marquee behavior="alternate" scrollamount="10" style="color:#800000;"><h1>Registration Form Under Maintenance! Please Try Again Later.</h1></marquee> -->
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="javascript::">Registration</a></li>
                        <li class="active">Registration Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
    <body>
<div class="container">
    <h2 style="text-align: center;">Registration Form</h2>
    <hr class="style17">
    <h3 style="text-align: center; color:red;"> Please Pay Registration Fee before filling the Registration Form </h3>
</div>


 <div id="wrapper" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
			<form class="form" method="POST" action="uploadregistrationform.php" enctype="multipart/form-data">
            <div class="form-group">
                 <p>First Name <span>*</span></p>
				<div class="input-group">
					<span class="input-group-addon">
                    <span class="fa fa-user" style="color:#57BC98"></span></span>
					<input class="form-control" name="fname" id="prenom" required="required" aria-required="true" type="text">
				</div>
			</div>
        
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
            <input class="form-control" name="address" id="prenom" required="required" aria-required="true" type="text"></div></div>
			
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
                  		
			<div class="form-group">
             <p>E-mail <span>*</span></p>    

            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-envelope-o"  style="color:#57BC98"></span></span>

                    <input class="form-control" name="email" id="email" required="required" aria-required="true" type="email"></div>
            </div>
            
            <div class="form-group">

                    <p>Mobile No. <span>*</span></p>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-map-marker"  style="color:#57BC98"></span></span>

                    <input class="form-control" name="mobileno" id="postal" required="required" aria-required="true" type="text"></div>
            </div>

            <div class="form-group"><label for="sel1"> Select Category</label>
                    <div class="cols-sm-10">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                    <select class="form-control select-category" name="category_submission" id='category_submission'>
                    <option value="">Select...</option>
                    <option value="1">Pre-Conference Tutorials</option>
                    <option value="2">Conference Oral Presentation</option>
                    <option value="3">Poster Presentation</option>
                    </select>
                    </div>
                </div>
            </div>

            <!-- --------------------------------PreConference Tutorials------------------------------ -->
            
            <div id="preconf" style="display:none;">
                <div class="form-group"><label for="sel1"> Select Tutorial</label>
                        <div class="cols-sm-10">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                        <select class="form-control input-lg" style="font-size:15px" name="tutorial[]" id='tutorial' onchange="showfield(this.options[this.selectedIndex].value)" multiple size=3>
                        
                        <option value="" disabled>(Hold Ctrl to select multiple tracks)</option>
                        <option value="Medical Image Processing">Medical Image Processing</option>
                        <option value="Machine Learning and its applications">Machine learning and its applications</option>
                        <option value="Cyber Security">Cyber Security</option>
                      
                        </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- --------------------------------Oral Presentation------------------------------ -->                                            

            <div id="conforal" style="display:none;"> 
                <div class="form-group" ><label for="sel1"> Select Category</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="category_auth" id='category_auth' onchange="showfield(this.options[this.selectedIndex].value)">
                            <option value="">Select...</option>
                            <option value="Author">Author</option>
                            <option value="Coauthor">Co-Author</option>
                                                </select>
                            </div>
                    </div>
                </div>

                <div class="form-group"><label for="sel1"> Select Category</label>
                            <div class="cols-sm-10">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="member" id='member' onchange="showfield(this.options[this.selectedIndex].value)">
                            <option value="">Select...</option>
                            <option value="ieee_member">IEEE Member</option>
                            <option value="non_ieee_member">Non IEEE Member</option>
							<option value="SC/ST">SC/ST Category*</option>
                                                </select>
                            </div>
                            </div>
                            </div>
				<h5 style="text-align: center; color:red;">Note:Proof should be shown on the day of conference to claim the benefit</h5>

                <div class="form-group"><label for="sel1">Details</label>
                        <div class="cols-sm-10">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                        <select class="form-control input-lg" style="font-size:15px" name="details[]" id='details' onchange="showfield(this.options[this.selectedIndex].value)" multiple size=5>
                        
                        <option value="" disabled>(Hold Ctrl to select multiple tracks)</option>
                        <option value="Deligate/Utility/R&D/Govt">Deligate/Utility/R&D/Govt</option>
                        <option value="Deligate from Academic Organization">Deligate from Academic Organization</option>
                        <option value="Student Deligate">Student Deligate</option>
                        <option value="Deligate from Abroad">Deligate from Abroad</option>
                        </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group"><label for="sel1">Track</label>
                        <div class="cols-sm-10">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                        <select class="form-control input-lg" style="font-size:15px" name="track[]" id='track' onchange="showfield(this.options[this.selectedIndex].value)" multiple size=14>
                        
                        <option value="" disabled>(Hold Ctrl to select multiple tracks)</option>
                        <option value="Mechanical M1">Mechanical M1-Structural Design and Dynamics</option>
                        <option value="Mechanical M2">Mechanical M2-Thermal Engineering and Fluid Dynamics</option>
                        <option value="Mechanical M3">Mechanical M3-Manufacturing and Automation</option>
                        <option value="Computer CI1">Computer CI1-Networking</option>
                        <option value="Computer CI2">Computer CI2-Security</option>
                        <option value="Computer CI3">Computer CI3-Information and Computer Technologies</option>
                        <option value="Computer CI4">Computer CI4-Analysis and Design of Algorithms</option>
                        <option value="EXTC EC1">EXTC EC1-Signal Processing</option>
                        <option value="EXTC EC2">EXTC EC2-Communication Engineering</option>
                        <option value="EXTC EC3">EXTC EC3-Embeded Systems</option>
                        <option value="Electrical E1">Electrical E1-Electrical Machines and Drives</option>
                        <option value="Electrical E2">Electrical E2-Power Systems</option>
                        <option value="Electrical E3">Electrical E3-Power Electronics and Energy Conversion</option>
                        <option value="Humanities H1">Humanities H1-Advanced Materials and Physics of Devices</option>
                        </select>
                        </div>
                    </div>
                </div>
                    
            <div class="form-group">
                        <p>Paper ID </p>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fa fa-list"  style="color:#57BC98"></i></span></span>

                        <input class="form-control" name="paperid" id="id" type="text"></div>   
            </div> 

            <div class="form-group">
                        <p>Title of the Paper</p>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fa fa-list"  style="color:#57BC98"></i></span>
                    </span>
                    <input class="form-control" name="ptitle" id="ptitle" type="text">
                </div>   
            </div> 
        </div>

         <!-- --------------------------------Poster Presentation------------------------------ -->

        <div id="posterpresent" style="display:none;">
            <div class="form-group"><label for="sel1"> Select Category</label>
                            <div class="cols-sm-10">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="category_poster_auth" id='category_poster_auth' onchange="showfield(this.options[this.selectedIndex].value)">
                            <option value="">Select...</option>
                            <option value="poster_author">Author</option>
                            <option value="poster_coauthor">Co-Author</option>
                                                </select>
                            </div>
                            </div>
                            </div>

                <div class="form-group"><label for="sel1"> Select Category</label>
                            <div class="cols-sm-10">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="poster_member" id='poster_member' onchange="showfield(this.options[this.selectedIndex].value)">
                            <option value="">Select...</option>
                            <option value="poster_ieee_member">IEEE Member</option>
                            <option value="poster_non_ieee_member">Non IEEE Member</option>
                                                </select>
                            </div>
                            </div>
                            </div>

                <div class="form-group"><label for="sel1">Details</label>
                        <div class="cols-sm-10">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                        <select class="form-control input-lg" style="font-size:15px" name="poster_details[]" id='poster_details' onchange="showfield(this.options[this.selectedIndex].value)" multiple size=5>
                        
                        <option value="" disabled>(Hold Ctrl to select multiple tracks)</option>
                        <option value="Deligate/Utility/R&D/Govt">Deligate/Utility/R&D/Govt</option>
                        <option value="Deligate from Academic Organization">Deligate from Academic Organization</option>
                        <option value="Student Deligate">Student Deligate</option>
                        <option value="Deligate from Abroad">Deligate from Abroad</option>
                        </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group"><label for="sel1">Track</label>
                        <div class="cols-sm-10">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                        <select class="form-control input-lg" style="font-size:15px" name="poster_track[]" id='poster_track' onchange="showfield(this.options[this.selectedIndex].value)" multiple size=14>
                        
                        <option value="" disabled>(Hold Ctrl to select multiple tracks)</option>
                       <option value="Mechanical M1">Mechanical M1-Structural Design and Dynamics</option>
                        <option value="Mechanical M2">Mechanical M2-Thermal Engineering and Fluid Dynamics</option>
                        <option value="Mechanical M3">Mechanical M3-Manufacturing and Automation</option>
                        <option value="Computer CI1">Computer CI1-Networking</option>
                        <option value="Computer CI2">Computer CI2-Security</option>
                        <option value="Computer CI3">Computer CI3-Information and Computer Technologies</option>
                        <option value="Computer CI4">Computer CI4-Analysis and Design of Algorithms</option>
                        <option value="EXTC EC1">EXTC EC1-Signal Processing</option>
                        <option value="EXTC EC2">EXTC EC2-Communication Engineering</option>
                        <option value="EXTC EC3">EXTC EC3-Embeded Systems</option>
                        <option value="Electrical E1">Electrical E1-Electrical Machines and Drives</option>
                        <option value="Electrical E2">Electrical E2-Power Systems</option>
                        <option value="Electrical E3">Electrical E3-Power Electronics and Energy Conversion</option>
                        <option value="Humanities H1">Humanities H1-Advanced Materials and Physics of Devices</option>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                        <p>Poster ID </p>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fa fa-list"  style="color:#57BC98"></i></span></span>

                        <input class="form-control" name="posterid" id="posterid" type="text"></div>   
            </div> 

            <div class="form-group">
                        <p>Title of the Poster</p>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fa fa-list"  style="color:#57BC98"></i></span></span>

                        <input class="form-control" name="postertitle" id="postertitle" type="text"></div>   
            </div>
         </div>
         <!-- -------------------------------------------------------------------------------- -->
</div>  
            <div class="form-group">
                    <p>Regsitration Fee Payment Transaction No. <span>*</span></p>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-list"  style="color:#57BC98"></i></span></span>

                    <input class="form-control" name="transactionno" id="society" required="required" aria-required="true" type="text">
                    </div> 
                    </div>  


     
        <div class="form-group ">
          <input class="btn btn-info btn-block login" type="submit" name="Submit" data-toggle="modal" data-target="#myModal" id="submitBtn"    value="Submit">  
        </div> 
</div>	
</form>
	
</div></div></div>
 <?php include("footer.php");?>
</body>

<script>
preconf = document.getElementById("preconf");
conforal = document.getElementById("conforal");
posterpresent = document.getElementById("posterpresent");

document.getElementById("category_submission").onchange = (cat) => {
    preconf.style["display"]='none';
    conforal.style["display"]='none';
    posterpresent.style["display"]='none';
    if (cat.target.value==1)
        preconf.style["display"]='inline';
    else if(cat.target.value==2)
        conforal.style["display"]='inline';
    else if(cat.target.value==3)
        posterpresent.style["display"]='inline';
};


// $(document).ready(function(){
//     $('#select-category').on('change',function(){
//         var catID = $(this).val();
//         if(catID==1){
            
//         }else if(catID==2){
            
           
//         }else{

//         }
//     });
    
//    });
</script>
</html>