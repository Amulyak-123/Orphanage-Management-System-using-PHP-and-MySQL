<?php
session_start();
$userid=$_POST["textuserid"];
$birthdate=$_POST["textcal"];
$age=$_POST["textage"];
$gender=$_POST["gender"];
$appdate=$_POST["textdate"];
$sta=$_POST["textstatus"];
$profession=$_POST["textprofession"];
$address=$_POST["proaddress"];
$health=$_POST["texthealth"];
$reasons=$_POST["textreasons"];
$city=$_POST["textcity"];
$pin=$_POST["textnpin"];
$status=null;

try{
    if(isset($_FILES["file2"]["type"]))
    {
        $validextensions=array("pdf");
         //split file,extension and store into $temporary
         $temporary=explode(".",$_FILES["file2"]["name"]);
         //get file extension from $temporary variable
         $file_extension=end($temporary);
         //check the mine type provided by the browser
         if((($_FILES["file2"]["type"]=="application/pdf"))
             &&in_array($file_extension,$validextensions))
             {
                 //if file was not upload correctly or partially uploaded,returns 0 if valid
                 if($_FILES["file2"]["error"]>0)
                 $msg=$_FILES["file2"]["error"];
                 //check if file is already uploaded
                 else if(file_exists("../photo/".$_FILES["file2"]["name"]))
                 $msg="THIS FILE ALREADY EXITS.";
                 else
                 {
                     $sourcePath=$_FILES['file2']['tmp_name'];
                     $targetPath="../photo/".$_FILES['file2']['name'];
                     move_uploaded_file($sourcePath,$targetPath);
                     $photos=$targetPath;
                     $status="ok";
                 }
             }
             else
             {
                 $msg="INVALID FILE SIZE OR TYPE";
             }
         }
    else{
        $msg="PLEASE SELECT FILE";
    }
    if($status=="ok"){
        
        $conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);   
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt=$conn->prepare("insert into application(userid,Birthdate,Age,Appdate,Status,profession,Address,City,Pin,HealthInsurance,Reasons,doc,gender)values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$userid);
        $stmt->bindParam(2,$birthdate);
        $stmt->bindParam(3,$age);
        $stmt->bindParam(4,$appdate);
        $stmt->bindParam(5,$sta);
        $stmt->bindParam(6,$profession);
        $stmt->bindParam(7,$address);
        $stmt->bindParam(8,$city);
        $stmt->bindParam(9,$pin);
        $stmt->bindParam(10,$health);
        $stmt->bindParam(11,$reasons);
        $stmt->bindParam(12,$photos);
        $stmt->bindParam(13,$gender);
        
        $stmt->execute();
        $msg="APPLICATION SUBMITED";
    }
}catch(Exception $e){
    $msg="APPLICATION NOT SUBMITED".$e->getMessage();
}finally{
    $conn=null;
}

        
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>

<html>
    <head>
        <title>ADD CHILD INFO</title>
        <link rel="stylesheet" href="styless.css">
        <?php
          include("headerlink.php");
         ?>

    </head>
    <body>
    <?php 
         if(empty($_SESSION))
         {
             header('location:../usersigninform.php');
         }
         ?>
        <div class="container">
            <div class="item">
            <?php
              include('header.php');
            ?>
            <br>
        </div>
        <div class="item" align="center">
          <h4><?php echo $msg; ?></h4>
        </div>
        </div>
        <?php
                include('footer.php');
                ?>

    </body>
</html>
