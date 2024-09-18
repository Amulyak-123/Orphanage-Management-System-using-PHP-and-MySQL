<?php
session_start();
$date=$_POST["textdate"];
$expenses=$_POST["textexpen"];
$expensestype=$_POST["texttype"];
$amount=$_POST["textamount"];
$msg=null;

//connection
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//3.prepare statment to insert data into the category table
try{
    $stmt=$conn->prepare("insert into expenses(expensesdate,expensesdescrption,amount,expensestype) values (?,?,?,?)");
    $stmt->bindParam(1,$date);
    $stmt->bindParam(2,$expenses);
    $stmt->bindParam(3,$amount);
    $stmt->bindParam(4,$expensestype);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0){
        $msg="EXPENSES ADDED";
    }
    else{
        $msg="EXPENSES NOT ADDED";
    }
}catch(Exception $e){
  $msg=$e->getMessage();
}
//4.clos ethe connection to datebase


    
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
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
        <div class="item" align=center> 
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



