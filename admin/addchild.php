<?php
session_start();
$name=$_POST["textname"];
$birthdate=$_POST["textcal"];
$age=$_POST["textage"];
$gender=$_POST["gender"];
$father=$_POST["textfather"];
$mother=$_POST["textmother"];
$addhar=$_POST["textadhar"];
$education=$_POST["texteducation"];

$address=$_POST["textaddress"];
$city=$_POST["textcity"];
$pin=$_POST["textpin"];
$childdate=date('y/m/d');
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
        $msg="INVALID  FILE SIZE OR TYPE";
    }

    
    }else{
        $msg="PLEASE SELECT FILE";
    }
    if($status=="ok"){
        
        $conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);   
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt=$conn->prepare("insert into children(name,birthdate,age,gender,fathername,mothername,addharnumber,education,address,city,pin,Image,childdate)values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$birthdate);
        $stmt->bindParam(3,$age);
        $stmt->bindParam(4,$gender);
        $stmt->bindParam(5,$father);
        $stmt->bindParam(6,$mother);
        $stmt->bindParam(7,$addhar);
        $stmt->bindParam(8,$education);
        $stmt->bindParam(9,$address);
        $stmt->bindParam(10,$city);
        $stmt->bindParam(11,$pin);
        $stmt->bindParam(12,$photos);
        $stmt->bindParam(13,$childdate);
        $stmt->execute();
        $msg="CHILD ADD";
    }
}catch(Exception $e){
    $msg="CHILD NOT ADD".$e->getMessage();
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
