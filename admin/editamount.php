<?php
//fetch posted data
$donationid=$_POST["textid"];
$amount=$_POST["textamount"];
$msg=null;
try{
    $conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->prepare("update moneydonations set amount=? where donationid=?");
    $stmt->bindParam(1,$amount);
    $stmt->bindParam(2,$donationid);
    $stmt->execute();
    $c=$stmt->rowCount();
      if($c==1){
          $msg="Amount update done";
      }
      else{
          $msg="Amount updatefailed";
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

