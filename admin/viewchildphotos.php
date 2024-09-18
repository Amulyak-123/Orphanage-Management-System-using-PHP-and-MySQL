
<?php
$childid=$_REQUEST["childid"];
$name=urldecode($_REQUEST["name"]);


//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays

$photoid=array();
$age=array();
$image=array();
$date=array();
//prepare select statements
$stmt=$conn->prepare("select photoid,age,image,imagedate from childphoto where childid=?;");
$stmt->bindParam(1,$childid);
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    array_push($photoid,$row["photoid"]);
    array_push($age,$row["age"]);
    array_push($image,$row["image"]);
    array_push($date,$row["imagedate"]);
    
}
$conn=null;
?>
<html>
    <head>
        <title>VIEW CHILD PHOTOS</title>
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
        <h3>CHILD PHOTO DETAILS</h3>
            <table class="table">
                <tr>
                    
                    <td>PHOTO ID</td>
                    <td>CHILD ID</td>
                    <td>NAME</td>
                    <td>AGE</td>
                    <td>IMAGE</td>
                    <td>IMAGE DATE</td>
                        
                 </tr>
                 <?php
                 $len=count($photoid);
                 for($i=0;$i<$len;$i++)
                 {
                    
                     echo "<tr>";
                     echo "<td>".$photoid[$i]."</td>";
                     echo "<td>".$childid."</td>";
                     echo "<td>".$name."</td>";
                     echo "<td>".$age[$i]."</td>";
                     echo "<td><img src=".$image[$i]." height=100 width=100/></td>";
                     echo "<td>".$date[$i]."</td>";
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