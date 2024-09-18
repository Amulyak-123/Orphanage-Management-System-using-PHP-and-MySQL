<?php
session_start();
$userid=$_POST["textuserid"];
$donationtype=$_POST["texttype"];
$donationdescrption=$_POST["textdes"];
$dateofdonation=$_POST["textdate"];
$msg=null;

//connection
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//3.prepare statment to insert data into the category table
try{
    $stmt=$conn->prepare("insert into otherdonations(userid,donationtype,description,donateddate) values (?,?,?,?)");
    $stmt->bindParam(1,$userid);
    $stmt->bindParam(2,$donationtype);
    $stmt->bindParam(3,$donationdescrption);
    $stmt->bindParam(4,$dateofdonation);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0){
        $msg="DONATION DONE THANK YOU";
    }
    else{
        $msg="DONATION NOT ADD";
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
         include('footer.php')
         ?>
         
        
    </body>
    </html>



