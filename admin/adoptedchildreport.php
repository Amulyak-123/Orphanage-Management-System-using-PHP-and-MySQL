<?php
$from=$_POST["textdate1"];
$to=$_POST["textdate2"];
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$childid=array();
$name=array();
$birthdate=array();
$age=array();
$gender=array();
$addhar=array();
$emailid=array();
$phonenumber=array();
$address=array();
$city=array();
$pin=array();
$guardianname=array();
$date=array();
$profession=array();
$appid=array();
$adoptedid=array();
$image=array();

//prepare select statements
$stmt=$conn->prepare("select adoptedchild.adoptedid,adoptedchild.appid,adoptedchild.childid,children.name,children.birthdate,adoptedchild.age,
children.gender,adoptedchild.email,adoptedchild.phonenumber,children.addharnumber,application.profession,adoptedchild.address,adoptedchild.city,
adoptedchild.pin,children.Image,adoptedchild.guardianname,adoptedchild.dateofadoption from adoptedchild inner join application on application.appid=adoptedchild.appid inner join children on children.childid=adoptedchild.childid where dateofadoption between ? and ?;");
$stmt->bindParam(1,$from);
$stmt->bindParam(2,$to);
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($adoptedid,$row["adoptedid"]);
    array_push($appid,$row["appid"]);
    array_push($childid,$row["childid"]);
    array_push($name,$row["name"]);
    array_push($birthdate,$row["birthdate"]);
    array_push($age,$row["age"]);
    array_push($gender,$row["gender"]);
    array_push($guardianname,$row["guardianname"]);
    array_push($emailid,$row["email"]);
    array_push($phonenumber,$row["phonenumber"]);
    array_push($addhar,$row["addharnumber"]);
    array_push($profession,$row["profession"]);
    array_push($address,$row["address"]);
    array_push($city,$row["city"]);
    array_push($pin,$row["pin"]);
    array_push($date,$row["dateofadoption"]);
    array_push($image,$row["Image"]);
    

}
$conn=null;

?>
<html>
    <head>
        <title>VIEW ADOPTED CHILD DETAILS</title>
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
        <h3>ADOPTED CHILD DETAILS</h3>
            <?php
              if(count($adoptedid)>0)
              {
                ?>
            <table class="table">
                <tr>
                    <td>ADOPTED ID</td> 
                    <td>APPLICATION ID</td>
                    <td>CHILD ID</td>
                    <td>CHILD NAME</td>
                    <td>DATE OF BIRTH</td>
                    <td>AGE</td>
                    <td>GENDER</td>
                    <td>GUARDIAN NAME</td>
                    <td>ADOPTED DATE</td>
                    <td>PHONE NUMBER</td>
                    <td>ADDHAR NUMBER</td>
                    <td>GUARDIAN PROFESSION</td>
                    <td>ADDRESS</td>
                    <td>CITY</td> 
                    <td>PIN</td>
                    
                    <td>CHILD IMAGE</td>
                    
                    
                                 
                 </tr>
                 <?php
                 $len=count($adoptedid);
                 for($i=0;$i<$len;$i++)
                 {
        
                     echo "<tr>";
                     echo "<td>".$adoptedid[$i]."</td>";
                     echo "<td>".$appid[$i]."</td>";
                     echo "<td>".$childid[$i]."</td>";
                     echo "<td>".$name[$i]."</td>";
                     echo "<td>".$birthdate[$i]."</td>";
                     echo "<td>".$age[$i]."</td>";
                     echo "<td>".$gender[$i]."</td>";
                     echo "<td>".$guardianname[$i]."</td>";
                     echo "<td>".$date[$i]."</td>";
                     echo "<td>".$phonenumber[$i]."</td>";
                     echo "<td>".$addhar[$i]."</td>";
                     echo "<td>".$profession[$i]."</td>";
                     echo "<td>".$address[$i]."</td>";
                     echo "<td>".$city[$i]."</td>";
                     echo "<td>".$pin[$i]."</td>";
                    
                     echo "<td><img src=".$image[$i]." height=100 width=100/></td>";
                     
                     echo "</tr>";

                 }
                 ?>
            </table>
        </div>
        </div>
        <?php
              }
        else{
            echo "NO ADOPTED CHILD FROM " .$from. " to " .$to;
        }
        ?>
        
        <?php
                include('footer.php');
                ?>
    </body>
</html>