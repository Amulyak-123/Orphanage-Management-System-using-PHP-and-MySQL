<?php
$from=$_POST["textdate1"];
$to=$_POST["textdate2"];
$childid=array();
$name=array();
$birthdate=array();
$age=array();
$gender=array();
$fathername=array();
$mothername=array();
$addhar=array();
$education=array();
$childdatearray=array();
$address=array();
$city=array();
$pin=array();
$image=array();

$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);   
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
$stmt=$conn->prepare("select * from children where childdate between ? and ?");
$stmt->bindParam(1,$from);
$stmt->bindParam(2,$to);
$stmt->execute();
$c=$stmt->rowCount();

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
    array_push($childdatearray,$row["childdate"]);
    array_push($address,$row["address"]);
    array_push($city,$row["city"]);
    array_push($pin,$row["pin"]);
    array_push($image,$row["Image"]);
    

}
$conn=null;
?>
<html>
    <head>
        <title>VIEW child</title>
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

            </div>
            <?php 
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
         <br>
            <div class="item">
        <h3>CHILD LIST</h3>
        <?php
              if(count($childid)>0)
              {
                ?>

            <table class="table">
                <tr>
                    <td>CHILD ID</td> 
                    <td>NAME</td>
                    <td>BIRTH DATE</td>
                    <td>AGE</td>
                    <td>GENDER</td>
                    <td>FATHER NAME</td>
                    <td>MOTHER NAME</td>
                    <td>ADDHAR NUMBER</td>
                    <td>EDUCATION</td>
                    <td>ADDRESS</td>
                    <td>CITY</td>
                    <td>PIN</td>
                    <td>ADDED DATE</td>
                    <td>IMAGE</td>  
                              
                 </tr>
                 <?php
                 $len=count($childid);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>".$childid[$i]."</td>";
                    
                     echo "<td>".$name[$i]."</td>";
                     echo "<td>".$birthdate[$i]."</td>";
                     echo "<td>".$age[$i]."</td>";
                     echo "<td>".$gender[$i]."</td>";
                     echo "<td>".$fathername[$i]."</td>";
                     
                     echo "<td>".$mothername[$i]."</td>";
                    
                     echo "<td>".$addhar[$i]."</td>";
                     echo "<td>".$education[$i]."</td>";
                     echo "<td>".$address[$i]."</td>";
                     echo "<td>".$city[$i]."</td>";
                     echo "<td>".$pin[$i]."</td>";
                     echo "<td>".$childdatearray[$i]."</td>";
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
            echo "NO  CHILD ADDED FROM " .$from. " to " .$to;
        }
        ?>
        <?php
                include('footer.php');
                ?>

    </body>
</html>