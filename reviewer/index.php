<?php 
//insert.php
$connect = mysqli_connect("localhost", "root", "", "icnte2");
if(isset($_POST["framework"]))
{
 $framework = '';
 foreach($_POST["framework"] as $row)
 {
  $framework .= $row . ', ';
 }
 $framework = substr($framework, 0, -2);
 $query = "INSERT INTO multiple(framework) VALUES('".$framework."')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>




<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Bootstrap Multi Select Dropdown with Checkboxes using Jquery in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 align="center">Bootstrap Multi Select Dropdown with Checkboxes using Jquery in PHP</h2>
   <br /><br />
   <form method="post" id="framework_form">
    <div class="form-group">
     <label>Select Tracks</label>
     <select id="framework" name="framework[]" multiple class="form-control" onChange="getSession(this.value);" >
	  <option value="Structural Control, Dynamics, and Health Monitoring">Structural Control, Dynamics, and Health Monitoring</option>
      <option value="Codeigniter">Codeigniter</option>
      <option value="CakePHP">CakePHP</option>
      <option value="Laravel">Laravel</option>
      <option value="YII">YII</option>
      <option value="Zend">Zend</option>
      <option value="Symfony">Symfony</option>
      <option value="Phalcon">Phalcon</option>
      <option value="Slim">Slim</option>
     </select>
    </div>
	
	<div class="form-group">
     <label>Select Sessions</label>
     <select id="framework"  multiple class="form-control" name="sessionid" id="session-list";" >
	  <option value="Zend">Zend</option>
     </select>
    </div>
	
	
    <div class="form-group">
     <input type="submit" class="btn btn-info" name="submit" value="Submit" />
    </div>
   </form>
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 $('#framework_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#framework option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#framework').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>
