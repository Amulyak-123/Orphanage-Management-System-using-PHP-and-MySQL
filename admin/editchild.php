<?php
//fetch posted data
$childid=$_POST["textid"];
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
$msg=null;
try{
    $conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->prepare("update children set name=?,birthdate=?,age=?,gender=?,fathername=?,mothername=?,addharnumber=?,
    education=?,address=?,city=?,pin=? where childid=?");
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
    $stmt->bindParam(12,$childid);
    $stmt->execute();
    $c=$stmt->rowCount();
      if($c==1){
          $msg="CHILD UPDATE DONE";
      }
      else{
          $msg="CHILD UPDATE FAILED";
      }
}catch(Exception $e){
    $msg="CHILD update failed".$e->getMessage();
}
//4.clos ethe connection to datebase
finally{
    
    $conn=null;
}
?>
<html>
    <head>
        <title>EDIT Child</title>
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

