<?php
session_start();
$email=$_SESSION["email"];


//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$firstname=array();
$phonenumber=array();
$email_array=array();
$userid=array();
$donationid=array();
$foodtype=array();
$qunantity=array();
$dateofdontion=array();
//prepare select statements
$stmt=$conn->prepare("select firstname,email,fooddonations.userid,donationid,foodtype,quantity,dateofdonation,phonenumber from fooddonations inner join user on user.userid=fooddonations.userid where email=?;");
$stmt->bindParam(1,$email);
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($firstname,$row["firstname"]);
    array_push($email_array,$row["email"]);
    array_push($userid,$row["userid"]);
    array_push($phonenumber,$row["phonenumber"]);
    array_push($donationid,$row["donationid"]);
    array_push($foodtype,$row["foodtype"]);
    array_push($qunantity,$row["quantity"]);
    array_push($dateofdontion,$row["dateofdonation"]);
    
}
$conn=null;
?>
<html>
    <head>
        <title>VIEW FOOD DONATIONS</title>
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
        <h3>FOOD DONATION DETAILS</h3>
            <table class="table">
                <tr>
                    
                  
                    <td>DONATED ID</td>
                    <td>FOOD TYPE</td>
                    <td>QUANTITY</td>
                    <td>DATE OF DONATION</td>
                                           
                 </tr>
                 <?php
                 $len=count($donationid);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     
                     
                     echo "<td>".$donationid[$i]."</td>";
                     echo "<td>".$foodtype[$i]."</td>";
                     echo "<td>".$qunantity[$i]."</td>";
                     echo "<td>".$dateofdontion[$i]."</td>";
                                          
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