<?php
//fetch posted data
$staffid=$_POST["staffid"];
$firstname=$_POST["firstname"];
$middlename=$_POST["middlename"];
$lastname=$_POST["lastname"];
$phone=$_POST["textphone"];
$email=$_POST["textemail"];
$responsibility=$_POST["textres"];
$salary=$_POST["textsalary"];
$address=$_POST["textaddress"];
$city=$_POST["textcity"];
$pin=$_POST["textpin"];

$msg=null;

try{
    $conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->prepare("update staff set firstname=?,middlename=?,lastname=?,phonenumber=?,email=?,responsibility=?,salary=?,
    address=?,city=?,pin=? where staffid=?");
    $stmt->bindParam(1,$firstname);
    $stmt->bindParam(2,$middlename);
    $stmt->bindParam(3,$lastname);
    $stmt->bindParam(4,$phone);
    $stmt->bindParam(5,$email);
    $stmt->bindParam(6,$responsibility);
    $stmt->bindParam(7,$salary);
    $stmt->bindParam(8,$address);
    $stmt->bindParam(9,$city);
    $stmt->bindParam(10,$pin);
    $stmt->bindParam(11,$staffid);
    $stmt->execute();
    $c=$stmt->rowCount();
      if($c==1){
          $msg="STAFF UPDATE DONE";
      }
      else{
          $msg="STAFF UPDATE FAILED";
      }
}catch(Exception $e){
    $msg="STAFF UPDATE FAILED".$e->getMessage();
}
//4.clos ethe connection to datebase
finally{
    
    $conn=null;
}
?>
<html>
    <head>
        <title>view staff</title>
        <link rel="stylesheet" href="styless.css">
        <?php
        session_start();
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
        <div class="item" align="center">
          <h4>
                <?php
            echo $msg;
            ?></h4>
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

