<?php
//require('fpdf/fpdf.php');
 require "../../connection.php";
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
$dept=$_SESSION['id'];
	$track=$_SESSION['id'];	//connect to database
    $trackid="";
    if(isset($_POST['send']))
    {
    	$trackid=$_POST['trackid'];

    }          

                $sql="SELECT * FROM tracks WHERE dept='$dept'";
				$result1=mysqli_query($db,$sql);
if(isset($_POST['create_word']))
{
    header("Content-type:application/vnd.ms-word");
    header("Content-Disposition:attachment; Filename=plennary_summary.doc");
    header("Pragma:no-cache");
    //echo '<script>document.getElementByName("plenary");</script>';
    echo '<h1>Plenary Summary<h1>';

    $res=mysqli_query($db,"SELECT * FROM session");
$res1=mysqli_query($db,"SELECT * FROM pspapers WHERE tid IN(SELECT tid FROM tracks WHERE dept='$dept')");
while($data=mysqli_fetch_array($res) && $data1=mysqli_fetch_array($res1) )
{
    $tid=$data1['tid'];
    $psid=$data1['psid'];
    $tname=mysqli_fetch_array(mysqli_query($db,"SELECT trackname FROM tracks WHERE tid='$tid'"));
    $ses=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM session WHERE sid='$psid'"));
    $paperid1=$data1['pid1'];
    $ptitle1=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid1'"));
    $paperid2=$data1['pid2'];
    $ptitle2=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid2'"));
    $paperid3=$data1['pid3'];
    $ptitle3=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid3'"));
    $paperid4=$data1['pid4'];
    $ptitle4=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid4'"));
    $paperid5=$data1['pid5'];
    $ptitle5=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid5'"));
    $paperid6=$data1['pid6'];
    $ptitle6=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid6'"));





    echo '<center><table name="plenary" class="table table-bordered table-responsive" style="border:1px;width:800px;font-size:16px">
	<tr><td colspan="3"><b>Plenary Session Id:      </b>'.$data1['psid'].'</td></tr>
	<tr><td colspan="3"><b>Tracks Name:</b>'.$tname['trackname'].'</tr>
	<tr><td colspan="2"><b>Session Date-Time:</b>'.$ses['sdate'].'            '.$ses['stime'].'</td><td><b>Vennue:</b>'.$ses['svennue'].'</td></tr>
	<tr><td colspan="3"><b>Session Chair:</b>'.$ses['schair'].'</td></tr>
	<tr><td colspan="3"><b>Session Co-Chair:</b>'.$ses['scochair'].'</td></tr>
	<tr><td><b>Paper ID</td><td>Paper title</td><td>Page No.</b></td></tr>
	<tr><td>'.$data1['pid1'].'</td><td>'.$ptitle1['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid2'].'</td><td>'.$ptitle2['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid3'].'</td><td>'.$ptitle3['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid4'].'</td><td>'.$ptitle4['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid5'].'</td><td>'.$ptitle5['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid6'].'</td><td>'.$ptitle6['ptitle'].'</td><td></b></td></tr>
	
	</table></center><br><br>';


}
}



if(isset($_POST['print']))
{
     header("Content-type:application/vnd.ms-word");
    header("Content-Disposition:attachment; Filename=Camera_ready.doc");
    header("Pragma:no-cache");
    //echo '<script>document.getElementByName("plenary");</script>';
    echo '<h1>Camera Ready Summary<h1>';
    
    
    $query="SELECT * FROM papers WHERE pcameraready='yes' AND trackid IN(SELECT tid FROM tracks WHERE dept='$dept')";
        $result1=mysqli_query($db,$query);

    while($data1=mysqli_fetch_array($result1)){
        echo '<table style="font-size:16px" class="table table-bordered table-responsive-xl" >
            <tr><td>'.$data1['paperid'].'</td></tr>
            <tr><td><center><!--<b>Paper Title</b></br>-->'.$data1['ptitle'].'</center></td></tr>
            <tr><td><center>';
            $pid=$data1['pid'];
            $query1="SELECT name FROM coauthors WHERE pid='$pid'";
            $result2=mysqli_query($db,$query1);
            echo '<!--<b>Coauthors</b></br>-->';
            while($data2=mysqli_fetch_array($result2)){echo $data2['name'].',    ';}
            echo '</center></td></tr>
            <tr><td><center><!--<b>Paper Abstract</b></br>-->'.$data1['pabstract'].'</center></td>
        </tr></table><br><br>';
        }
        


    
}

?>