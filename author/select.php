<?php   session_start();
require "../connection.php";
  /*In this page dynamic selection of coauthors is done in the update page
     @author: sinimol
   */ 
 $output = '';  
 $pid=$_SESSION['sini'];
 $sql = "SELECT cid,name,email,affiliation FROM coauthors WHERE pid='$pid'"; 
 $result = mysqli_query($db, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="40%">Name</th>  
                     <th width="40%">Email</th>  
                     <th width="40%">Affiliation</th>  
                     <th width="10%">Add/Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                    <td class="name1"  data-id3="'.$row["cid"].'" contenteditable>'.$row["name"].'</td> 
                     <td class="email" type="email" data-id1="'.$row["cid"].'" contenteditable>'.$row["email"].'</td>  
                     <td class="affiliation" data-id2="'.$row["cid"].'" contenteditable>'.$row["affiliation"].'</td>  
                     <td><center><button type="button" name="delete_btn" data-id4="'.$row["cid"].'" class="btn btn-sm btn-danger btn_delete"><i class="glyphicon glyphicon-remove"></i></button></center></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr> 
				<td id="name1" contenteditable></td> 
                <td id="email" contenteditable></td>  
                <td id="affiliation" contenteditable></td>  
                <td><center><button type="button" name="btn_add" id="btn_add" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i></button></center></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>