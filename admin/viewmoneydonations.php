<?php
$total=0;



//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$firstname=array();
$phonenumber=array();
$email_array=array();
$userid=array();
$donationid=array();
$amount=array();
$transfertype=array();
$image=array();
$dateofdontion=array();
//prepare select statements
$stmt=$conn->prepare("select firstname,email,moneydonations.userid,donationid,amount,donateddate,transfertype,image,phonenumber from moneydonations inner join user on user.userid=moneydonations.userid;");

$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($firstname,$row["firstname"]);
    array_push($email_array,$row["email"]);
    array_push($userid,$row["userid"]);
    array_push($phonenumber,$row["phonenumber"]);
    array_push($donationid,$row["donationid"]);
    array_push($amount,$row["amount"]);
    array_push($dateofdontion,$row["donateddate"]);
    array_push($transfertype,$row["transfertype"]);
    array_push($image,$row["image"]);
    
}
$conn=null;
?>
<html>
    <head>
        <title>VIEW MONEY DONATIONS</title>
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
        <h3>MONEY DONATION DETAILS</h3>
            <table class="table">
                <tr>
                    <td>USER ID</td>
                    <td>DONATED ID</td>
                    <td>NAME</td>
                    <td>PHONE NUMBER</td>
                    <td>AMOUNT</td>
                    <td>DONATION DATE</td>
                    <td>TRANSFER TYPE</td>
                    <td>IMAGE</td>
                    
                    
                        
                 </tr>
                 <?php
                 $len=count($donationid);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>".$userid[$i]."</td>";
                     echo "<td>".$donationid[$i]."</td>";
                     echo "<td>".$firstname[$i]."</td>";
                     echo "<td>".$phonenumber[$i]."</td>";
                      echo "<td>".$amount[$i]."</td>";
                     echo "<td>".$dateofdontion[$i]."</td>";
                     echo "<td>".$transfertype[$i]."</td>";
                     echo "<td><img src=".$image[$i]." height=100 width=100/></td>";
                    
                     $total=$total+$amount[$i];
                                          
                               }
                               echo "TOTAL AMOUNT DONATED =".$total; 
                     
                 ?>

            </table>
            
        </div>
        </div>
        <?php
                include('footer.php');
                ?>

    </body>
</html>