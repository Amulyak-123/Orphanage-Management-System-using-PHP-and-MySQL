<?php
$appid=$_REQUEST["appid"];
$gname=$_REQUEST["name"];
$userid=$_REQUEST["userid"];
$email=$_REQUEST["email"];
$phonenumber=$_REQUEST["phonenumber"];
$add1=urldecode($_REQUEST["address"]);
$city1=$_REQUEST["city"];
$pin1=$_REQUEST["pin"];
//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$childid=array();
$name=array();
$birthdate=array();
$age=array();
$gender=array();
$fathername=array();
$mothername=array();
$addhar=array();
$education=array();

$address=array();
$city=array();
$pin=array();
$image=array();

//prepare select statements
$stmt=$conn->prepare("select * from children where childid not in (select childid from adoptedchild);");
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($childid,$row["childid"]);
    array_push($name,$row["name"]);
    array_push($birthdate,$row["birthdate"]);
    array_push($age,$row["age"]);
    array_push($gender,$row["gender"]);
    array_push($fathername,$row["fathername"]);
    array_push($mothername,$row["mothername"]);
    array_push($addhar,$row["addharnumber"]);
    array_push($education,$row["education"]);

    array_push($address,$row["address"]);
    array_push($city,$row["city"]);
    array_push($pin,$row["pin"]);
    array_push($image,$row["Image"]);

}
$conn=null;
?>
<html>
    <head>
        <title>VIEW products</title>
        <link rel="stylesheet" href="styless.css"/>
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
            <?php 
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
            <div class="item">
        <h3>CHILD LIST</h3>
            <table class="table">
                <tr>
                    <td>childid</td> 
                    <td>name</td>
                    <td>birthdate</td>
                    <td>age</td>
                    <td>gender</td>
                    <td>father name</td>
                    <td>mother name</td>
                    <td>addhar number</td>
                    <td>education</td>
                    <td>address</td>
                    <td>city</td>
                    <td>pin</td>
                    <td>image</td>  
                    <td>edit</td>
                    <td>adopted children</td> 
                     </tr>
                 <?php
                 $len=count($childid);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>".$childid[$i]."</td>";
                     $cname=urlencode($name[$i]);
                     echo "<td>".$name[$i]."</td>";
                     echo "<td>".$birthdate[$i]."</td>";
                     echo "<td>".$age[$i]."</td>";
                     echo "<td>".$gender[$i]."</td>";
                     echo "<td>".$fathername[$i]."</td>";
                     $father=urlencode($fathername[$i]);
                     echo "<td>".$mothername[$i]."</td>";
                     $mother=urlencode($mothername[$i]);
                     echo "<td>".$addhar[$i]."</td>";
                     echo "<td>".$education[$i]."</td>";
                     $edu=urlencode($education[$i]);
                     
                     echo "<td>".$address[$i]."</td>";
                     $add=urlencode($address[$i]);
                     echo "<td>".$city[$i]."</td>";
                     echo "<td>".$pin[$i]."</td>";
                     echo "<td><img src=".$image[$i]." height=100 width=100/></td>";
                     echo "<td><a href=editchildform.php?childid=$childid[$i]&name=$cname&birthdate=$birthdate[$i]&age=$age[$i]&gender=$gender[$i]&fathername=$father&mothername=$mother&city=$city[$i]&pin=$pin[$i]&address=$add&education=$edu&addhar=$addhar[$i]>edit</a></td>";
                     echo "<td><a href=adoptedchildform.php?childid=$childid[$i]&name=$cname&age=$age[$i]>Add</a></td>";
                     echo "</tr>";

                 }
                $_SESSION["appid"]=$appid;
                $_SESSION["name"]=$gname;
                $_SESSION["userid"]=$userid;
                $_SESSION["email"]=$email;
                $_SESSION["address"]=$add1;
                $_SESSION["phonenumber"]=$phonenumber;
                $_SESSION["city"]=$city1;
                $_SESSION["pin"]=$pin1;


                 ?>
            </table>
        </div>
        </div>
        <?php
                include('footer.php');
                ?>
    </body>
</html>