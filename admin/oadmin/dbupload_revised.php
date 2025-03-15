<?php session_start();

require "../../connection.php";//connect to database
if(!$_SESSION["id"])
{
    header("location:login.php?notloggedin=You Are Not Logged In!");
}
else
{
    // echo "Secure Home Page opens".$_POST['UPLOAD_REVISED']."track ".$_POST['trackid']." session ".$_POST['sessionid']." paper ".$_POST['paperid'];
}
if(isset($_POST['UPLOAD_REVISED']))
{

    $pid=mysqli_real_escape_string($db,$_POST['paperid']);
    $tid=mysqli_real_escape_string($db,$_POST['trackid']);
    $sid=mysqli_real_escape_string($db,$_POST['sessionid']);

    $ssql="SELECT * FROM papers WHERE pid=$pid; ";
    
    $result=mysqli_query($db,$ssql);  
    if(mysqli_num_rows($result)==1)
    {
        $row = $result->fetch_assoc();
        $pfilename = $row['pfilename'];
        $ptitle = $row['ptitle'];
        $paperid = $row['paperid'];
        $source = '../../uploads/Track'.$tid.'/Session'.$sid.'/'.$pfilename;  
        
        $todaysdate=date("Y-m-d");
        $destination = '../../uploads/backup_revised_paper/'.$todaysdate.$pfilename;  

        if (file_exists($source)) {
        
            if( !copy($source, $destination) ) {  
                // echo "File can't be copied! \n";
                header("location: upload_revised.php?error=copy_error");  
            }  
            else {  

                // echo "File has been copied! \n";
                unlink($source);
                
                $extn = $_FILES["file"]['type'];
                // echo "FileType: ".$extn;
                if($extn=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                    $extn ='.docx';
                } 
                else if ($extn=='application/msword'){
                    $extn = '.doc';
                }
                else {
                    $extn = '.pdf';
                }
                
                //SPECIAL CHARS CHANGES
                function removeSpclChar($str) {
                    $res = str_replace( array('\'', '"', ',', ';', '<', '>',  ':', '.', '/', '-', '’'), '', $str);
                    return $res;
                }
                
                $ptitleNew = removeSpclChar($ptitle);
                
                $pfilename = $paperid."-".$ptitleNew;
                $newpfilename =  substr($pfilename, 0, 200).$extn;

                $filepath = '../../uploads/Track'.$tid.'/Session'.$sid.'/'.$newpfilename;
                if (move_uploaded_file($_FILES["file"]['tmp_name'], $filepath)) {
                    $sql = "UPDATE papers SET pfilename='$newpfilename' WHERE pid=$pid;";
                    if (mysqli_query($db, $sql)) {
                        // echo "Go to Sleep";
                        header("location: upload_revised.php?success=".$pfilename); 
                    } else {
                        header("location: upload_revised.php?error=db_error"); 
                    }
                } else {
                    header("location: upload_revised.php?error=move_error"); 
                }

                
                // echo "Uploaded File";
            }
        } else {

            $type = $_FILES["file"]['type'];
            // echo "FileType: ".$type;
            if($type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                $type='docx';
            }
            else if($type=='application/pdf') 
            {   
                $type = 'pdf';
            }
            else if ($type=='application/msword'){
                $type = 'doc';
            }
            else
            {
                $type = 'pdf';
            }

            //SPECIAL CHARS CHANGES

            function removeSpclChar($str) {
                $res = str_replace( array('\'', '"', ',', ';', '<', '>', ':', '.', '/', '-'), '', $str);
                return $res;
            }

            $ptitle = removeSpclChar($ptitle);

            $newpfilename =  $paperid.'-'.$ptitle.'.'.$type;

            echo $newpfilename;

            $filepath = '../../uploads/Track'.$tid.'/Session'.$sid.'/'.$newpfilename;

            echo $filepath;
            if (!move_uploaded_file($_FILES["file"]['tmp_name'], $filepath)) {
                header("location: upload_revised.php?error=file_upload_error".$_FILES["file"]['error']);
                exit();
            }

            $sql = "UPDATE papers SET pfilename='$newpfilename' WHERE pid=$pid;";
            if (mysqli_query($db, $sql)) {
                // echo "Go to Sleep";
                header("location: upload_revised.php?success=paper_updated"); 
            } else {
                header("location: upload_revised.php?error=db_error"); 
            }

        }

    } else {
        header("location: upload_revised.php?error=not_submit_error"); 
    }

}



// foreach($_FILES as $name=>$file){
//     if($top) $sub_name = $file['name'];
//     else    $sub_name = $name;
//     echo "\nNAME: ".$file['type'];
//     if(is_array($sub_name)){
//         foreach(array_keys($sub_name) as $key){
//             $files[$name][$key] = array(
//                 'name'     => $file['name'][$key],
//                 'type'     => $file['type'][$key],
//                 'tmp_name' => $file['tmp_name'][$key],
//                 'error'    => $file['error'][$key],
//                 'size'     => $file['size'][$key],
//             );
//             $files[$name] = multiple($files[$name], FALSE);
//         }
//     }else{
//         $files[$name] = $file;
//     }
// }

// $target_file = $target_dir.basename($_FILES["$file"]["name"]);
// $imageFileType = strtolower(pathinfo($_FILES["file"]['tmp_name'],PATHINFO_EXTENSION));
// echo "SARAS ".$imageFileType;