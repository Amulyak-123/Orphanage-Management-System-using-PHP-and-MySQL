<?php
session_start();

$childid=$_POST["textid"];
$age=$_POST["textage"];
$date=$_POST["textdate"];

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
              $msg="THIS FILE ALREADY EXITS.";
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
        $stmt=$conn->prepare("insert into childphoto(childid,image,age,imagedate)values(?,?,?,?)");
        $stmt->bindParam(1,$childid);
        $stmt->bindParam(2,$photos);
        $stmt->bindParam(3,$age);
        $stmt->bindParam(4,$date);
        $stmt->execute();
        $msg="CHILD PHOTO ADD";
    }
}catch(Exception $e){
    $msg="CHILD PHOTO NOT ADD".$e->getMessage();
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
        <div class="container">
            <div class="item">
            <?php
              include('header.php');
            ?>
            <br>
        </div>
        <div class="item" align=center>
          <h4><?php echo $msg; ?></h4>
        </div>
        </div>
        <?php 
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
        <?php
         include('footer.php');
         ?>
 
    </body>
</html>
