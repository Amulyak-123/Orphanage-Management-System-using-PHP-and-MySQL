<?php

//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$staffid=array();
$firstname=array();
$middlename=array();
$lastname=array();
$phonenumber=array();
$email=array();
$responsiblity=array();
$salary=array();
$address=array();
$city=array();
$pin=array();


//prepare select statements
$stmt=$conn->prepare("select * from staff");
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($staffid,$row["staffid"]);
    array_push($firstname,$row["firstname"]);
    array_push($middlename,$row["middlename"]);
    array_push($lastname,$row["lastname"]);
    array_push($phonenumber,$row["phonenumber"]);
    array_push($email,$row["email"]);
    array_push($responsiblity,$row["responsibility"]);
    array_push($salary,$row["salary"]);
    array_push($address,$row["address"]);
    array_push($city,$row["city"]);
    array_push($pin,$row["pin"]);


}
$conn=null;
?>
<html>
    <head>
        <title>VIEW STAFF DETAILS</title>
        <link rel="stylesheet" href="styless.css"/>
        <?php
        session_start();
          include("headerlink.php");
         ?>
    </head>
    <body>
    <?php 
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
        <div class="container">
            <div class="item">
                <?php
                include('header.php');
                ?>
            <br>
            </div>
            <div class="item">
        <h3>STAFF DETAILS</h3>
            <table class="table">
                <tr>
                    <td>STAFF ID</td> 
                    <td>FIRST NAME</td>
                    <td>MIDDLE NAME</td>
                    <td>LAST NAME</td>
                    <td>PHONE NUMBER</td>
                    <td>EMAIL</td>
                    <td>RESPONSIBILITY</td>
                    <td>SALARY</td>
                    <td>ADDRESS</td>
                    <td>CITY</td>
                    <td>PIN</td> 
                    <td>EDIT</td>             
                 </tr>
                 <?php
                 $len=count($staffid);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>".$staffid[$i]."</td>";
                     echo "<td>".$firstname[$i]."</td>";
                     echo "<td>".$middlename[$i]."</td>";
                     echo "<td>".$lastname[$i]."</td>";
                     echo "<td>".$phonenumber[$i]."</td>";
                     echo "<td>".$email[$i]."</td>";
                     echo "<td>".$responsiblity[$i]."</td>";
                     $resname=urlencode($responsiblity[$i]);
                     echo "<td>".$salary[$i]."</td>";
                     echo "<td>".$address[$i]."</td>";
                     $add=urlencode($address[$i]);

                     echo "<td>".$city[$i]."</td>";
                     echo "<td>".$pin[$i]."</td>";
                     echo "<td><a href=editstaffform.php?staffid=$staffid[$i]&firstname=$firstname[$i]&middlename=$middlename[$i]&lastname=$lastname[$i]&phonenumber=$phonenumber[$i]&email=$email[$i]&salary=$salary[$i]&address=$add&city=$city[$i]&pin=$pin[$i]&res=$resname>EDIT</a></td>";
                     echo "</tr>";

                 }
                 ?>
            </table>
        </div>
        </div>
        <?php
                include('footer.php');
                ?>

    </body>
</html>