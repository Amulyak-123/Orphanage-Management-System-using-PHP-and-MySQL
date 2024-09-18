<?php
session_start();
$firstname=$_POST["firstname"];
$middlename=$_POST["middlename"];
$lastname=$_POST["lastname"];
$phone=$_POST["textphone"];
$email=$_POST["textemail"];
$responsiblity=$_POST["textres"];
$salary=$_POST["textsalary"];
$address=$_POST["textaddress"];
$city=$_POST["textcity"];
$pin=$_POST["textpin"];
$msg=null;

//connection
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//3.prepare statment to insert data into the category table
try{
    $stmt=$conn->prepare("insert into staff(firstname,middlename,lastname,phonenumber,email,responsibility,salary,address,city,pin) values (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1,$firstname);
    $stmt->bindParam(2,$middlename);
    $stmt->bindParam(3,$lastname);
    $stmt->bindParam(4,$phone);
    $stmt->bindParam(5,$email);
    $stmt->bindParam(6,$responsiblity);
    $stmt->bindParam(7,$salary);
    $stmt->bindParam(8,$address);
    $stmt->bindParam(9,$city);
    $stmt->bindParam(10,$pin);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0){
        $msg="STAFF ADDED";
    }
    else{
        $msg="STAFF NOT ADDED";
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
        <title>staff add</title>
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
         </table>
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



