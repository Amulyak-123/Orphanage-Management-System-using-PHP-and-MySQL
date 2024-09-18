<?php
session_start();
$childid=$_POST["textid"];
$childname=$_POST["textname"];
$age=$_POST["textage"];
$appid=$_POST["textappid"];
$guardianname=$_POST["textfname"];
$email=$_POST["textemail"];
$phone=$_POST["textphone"];
$address=$_POST["textadd"];
$city=$_POST["textcity"];
$pin=$_POST["textpin"];
$dateofadoption=$_POST["textdate"];
$msg=null;

//connection
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//3.prepare statment to insert data into the category table
try{
    $stmt=$conn->prepare("insert into adoptedchild (childid,appid,age,guardianname,email,phonenumber,address,city,pin,dateofadoption) values (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1,$childid);
    $stmt->bindParam(2,$appid);
    $stmt->bindParam(3,$age);
    $stmt->bindParam(4,$guardianname);
    $stmt->bindParam(5,$email);
    $stmt->bindParam(6,$phone);
    $stmt->bindParam(7,$address);
    $stmt->bindParam(8,$city);
    $stmt->bindParam(9,$pin);
    $stmt->bindParam(10,$dateofadoption);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0){
        $msg="ADOPTION DETAILS ADDED";
    }
    else{
        $msg="ADOPTION DETAILS NOT ADDED";
    }
}catch(Exception $e){
  $msg=$e->getMessage();
}
//4.clos ethe connection to datebase
finally{

  $conn=null;
}

    
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>

<html>
    <head>
        <title>adoption add</title>
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
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
         <?php 
         include('footer.php')
         ?>
    </body>
    </html>



