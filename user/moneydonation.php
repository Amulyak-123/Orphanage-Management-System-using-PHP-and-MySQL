<?php
session_start();
$userid=$_POST["textuserid"];
$amount=$_POST["textamt"];
$dateofdonation=$_POST["textdate"];
$transfertype=$_POST["texttype"];

$msg=null;
$status=null;
try{
  if(isset($_FILES["file1"]["type"])){
      $validextensions=array("jpeg","jpg","png");
      //split file extension and store into $temporary
      $temporary=explode(".",$_FILES["file1"]["name"]);
      //get file extension from $temporary variable
      $file_extension=end($temporary);
      //check the mime type provided by the browser
      if((($_FILES["file1"]["type"]=="image/png")
      ||($_FILES["file1"]["type"]=="image/jpg")
      ||($_FILES["file1"]["type"]=="image/jpeg"))
      &&($_FILES["file1"]["size"]<500000)&& in_array($file_extension,$validextensions)){
      //if file was not uploaded correctly or partially uploaded,returns 0 if valid
      if($_FILES["file1"]["error"]>0)
             $msg=$_FILES["file1"]["error"];
      //check is file is alerady uploaded
      else if(file_exists("../photo/".$_FILES["file1"]["name"]))
            $msg="THIS FILE ALREADY EXITS .";
      else{
          $sourcePath=$_FILES['file1']['tmp_name'];
          $targetPath="../photo/".$_FILES['file1']['name'];
          move_uploaded_file($sourcePath,$targetPath);
          $photos=$targetPath;
          $status="ok";
      }              
  }else{
      $msg="INVALID FILE SIZE OR TYPE";
  }

  
  }else{
      $msg="PLEASE SELECT FILE";
  }
  if($status=="ok"){
    $conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("insert into moneydonations(userid,amount,donateddate,transfertype,image) values (?,?,?,?,?)");
    $stmt->bindParam(1,$userid);
    $stmt->bindParam(2,$amount);
    $stmt->bindParam(3,$dateofdonation);
    $stmt->bindParam(4,$transfertype);
    $stmt->bindParam(5,$photos);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0){
        $msg="DONATION DONE THANK YOU";
    }
    else{
        $msg="DONATION NOT ADD";
    }
     
  }
}
catch(Exception $e){
  $msg=$e->getMessage();
}
//4.clos ethe connection to datebase
finally{

  $conn=null;
}

    
         if(empty($_SESSION))
         {
             header('location:../usersigninform.php');
         }
         ?>

<html>
    <head>
        <title>expenses add</title>
        <?php
        
          include("headerlink.php");
         ?>
    </head>
    <body>
         <?php 
         include('header.php')
         ?>
         <br>
         <div class="item" align="center">
         <h4><?php
    
            echo $msg;
        ?></h4>
         </div>
        <?php
                include('footer.php');
                ?>

    </body>
    </html>



