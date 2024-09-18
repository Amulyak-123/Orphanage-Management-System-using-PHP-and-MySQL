<?php
//1.fetch the input from html
$donationid=$_REQUEST["donationid"];
$msg = null;


//2. connect to mysql database
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//3.prepare statment to insert data into the category table
try{
      $stmt=$conn->prepare("delete from fooddonations where donationid=?");
      $stmt->bindParam(1,$donationid);
      $stmt->execute();
      $c=$stmt->rowCount();
      
      if($c>0){
          $msg="DONATION DELETED";
      }
      else{
          $msg="DONATION NOT DELETED";
      }
}catch(Exception $e){
    $msg=$e->getMessage();
}
//4.clos ethe connection to datebase
finally{
  
    $conn=null;
}
?>
<html>
    <head>
        <title>donation deleted</title>
        <?php
          include("headerlink.php");
         ?>
    </head>
    <body>
         <?php 
         include('viewfooddonations.php')
         ?>
        <br>
        <div class="item" align="center">
         <h4><?php
    
            echo $msg;
         
        ?></h4>
        </div>
        
           </body>
    </html>

