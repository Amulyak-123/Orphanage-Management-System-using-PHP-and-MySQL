<?php
$from=$_POST["textdate1"];
$to=$_POST["textdate2"];

//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$firstname=array();
$phonenumber=array();
$email=array();
$address=array();
$city=array();
$pin=array();
$userid=array();
$birthdate=array();
$age=array();
$gender=array();
$appdate1=array();
$status=array();
$profession=array();
$appid=array();

//prepare select statements
$stmt=$conn->prepare("select application.userid,Appid,Birthdate,Age,Appdate,Status,profession,application.Address,application.City,application.Pin,HealthInsurance,Reasons,gender,firstname,middlename,lastname,phonenumber,email,user.address,user.city,user.pin from application inner join user on user.userid=application.userid where Appdate between ? and ?;");
$stmt->bindParam(1,$from);
$stmt->bindParam(2,$to);

$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($appid,$row["Appid"]);
    array_push($userid,$row["userid"]);
    array_push($firstname,$row["firstname"]);
    array_push($phonenumber,$row["phonenumber"]);
    array_push($email,$row["email"]);
    array_push($birthdate,$row["Birthdate"]);
    array_push($age,$row["Age"]);
    array_push($gender,$row["gender"]);
    array_push($appdate1,$row["Appdate"]);
    array_push($status,$row["Status"]);
    array_push($profession,$row["profession"]);
    array_push($address,$row["address"]);
    array_push($city,$row["city"]);
    array_push($pin,$row["pin"]);
    
    

}
$conn=null;
?>
<html>
    <head>
        <title>VIEW applications</title>
        <link rel="stylesheet" href="styless.css"/>
        <?php
        
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
            <div class="item">
        <h3>REPORT ON APPLICATION DETAILS</h3>
            <table class="table">
                <tr>
                    <td>APPLICATION ID</td> 
                    <td>USER ID</td>
                    <td>NAME</td>
                    <td>PHONE NUMBER</td>
                
                    <td>DATE OF BIRTH</td>       
                    <td>AGE</td>
                    <td>GENDER</td>
                    <td>APPLICATION DATE</td>
                    <td>STATUS</td>
                    <td>PROFESSION</td>
                    <td>ADDRESS</td>
                    <td>CITY</td>
                    <td>PIN</td>
                    <td>MORE INFORMATION</td>
                    <td>CHILD ADOPTION</td>
                    
                        
                 </tr>
                 <?php
                 $len=count($appid);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>".$appid[$i]."</td>";
                     echo "<td>".$userid[$i]."</td>";
                     echo "<td>".$firstname[$i]."</td>";
                     echo "<td>".$phonenumber[$i]."</td>";
                     
                     echo "<td>".$birthdate[$i]."</td>";
                     echo "<td>".$age[$i]."</td>";
                     echo "<td>".$gender[$i]."</td>";
                     echo "<td>".$appdate1[$i]."</td>";
                     echo "<td>".$status[$i]."</td>";
                     echo "<td>".$profession[$i]."</td>";
                     echo "<td>".$address[$i]."</td>";
                     $add=urlencode($address[$i]);
                     echo "<td>".$city[$i]."</td>";
                     echo "<td>".$pin[$i]."</td>";
                     echo "<td><a href=moreinformation.php?appid=$appid[$i]>CLICK HERE</a></td>";
                     echo "<td><a href=viewchild.php?appid=$appid[$i]&name=$firstname[$i]&userid=$userid[$i]&email=$email[$i]&phonenumber=$phonenumber[$i]&address=$add&city=$city[$i]&pin=$pin[$i]>ADD</a></td>";

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