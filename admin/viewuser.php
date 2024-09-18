<?php
//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$userid=array();
$firstname=array();
$middlename=array();
$lastname=array();
$phonenumber=array();
$email=array();
$address=array();
$city=array();
$pin=array();
//prepare select statements
$stmt=$conn->prepare("select * from user");
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($userid,$row["userid"]);
    array_push($firstname,$row["firstname"]);
    array_push($middlename,$row["middlename"]);
    array_push($lastname,$row["lastname"]);
    array_push($phonenumber,$row["phonenumber"]);
    array_push($email,$row["email"]);
    array_push($address,$row["address"]);
    array_push($city,$row["city"]);
    array_push($pin,$row["pin"]);

}
$conn=null;
?>
<html>
    <head>
        <title>USER DETAILS</title>
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
        <h3>USER LIST</h3>
            <table class="table">
                <tr>
                    <td>USER ID</td>
                    <td>FIRST NAME</td>
                    <td>MIDDLE NAME</td>
                    <td>LAST NAME</td>
                    <td>PHONE NUMBER</td>
                    <td>EMAIL</td>
                    <td>ADDRESS</td>
                    <td>CITY</td>
                    <td>PIN</td>

                 </tr>
                 <?php
                 $len=count($userid);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>".$userid[$i]."</td>";
                     echo "<td>".$firstname[$i]."</td>";
                     echo "<td>".$middlename[$i]."</td>";
                     echo "<td>".$lastname[$i]."</td>";
                     echo "<td>".$phonenumber[$i]."</td>";
                     echo "<td>".$email[$i]."</td>";
                     echo "<td>".$address[$i]."</td>";
                     echo "<td>".$city[$i]."</td>";
                     echo "<td>".$pin[$i]."</td>";
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