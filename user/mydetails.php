<?php
session_start();
$email=$_SESSION["email"];
//fetch posted data
$firstname=$_POST["textfname"];
$middlename=$_POST["textmname"];
$lastname=$_POST["textlname"];
$address=$_POST["textaddress"];
$phone=$_POST["textphone"];
$city=$_POST["textcity"];
$pin=$_POST["textpin"];
$msg=null;

try{
    $conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("update user set firstname=?,middlename=?,lastname=?,phonenumber=?,address=?,city=?,pin=? where email=?");
      $stmt->bindParam(1,$firstname);
      $stmt->bindParam(2,$middlename);
      $stmt->bindParam(3,$lastname);
      $stmt->bindParam(4,$phone);
      $stmt->bindParam(5,$address);
      $stmt->bindParam(6,$city);
      $stmt->bindParam(7,$pin);
      $stmt->bindParam(8,$email);
      $stmt->execute();
      $c=$stmt->rowCount();
      if($c==1){
          $msg="USER DETAILS UPDATE DONE";
      }
      else{
          $msg="USER DETAILS UPDATE FAILED";
      }
}catch(Exception $e){
    $msg="User update failed".$e->getMessage();
}
//4.clos ethe connection to datebase
finally{
    
    $conn=null;
}
?>
<html>
    <head>
        <title>USER details</title>
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
          <h4>  <?php
            echo $msg;
            ?></h4>
        </div>
        </div>
        <?php
                include('footer.php');
                ?>

    </body>
</html>
