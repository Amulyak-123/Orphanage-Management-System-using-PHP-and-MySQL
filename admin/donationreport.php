<?php
$from=$_POST["textdate1"];
$to=$_POST["textdate2"];
$total=0;
$firstname=array();
$phonenumber=array();
$email=array();
$userid=array();
$donationid=array();
$amount=array();
$date=array();
$transfertype=array();
$image=array();

//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//prepare select statements
$stmt=$conn->prepare("select firstname,email,moneydonations.userid,donationid,amount,transfertype,image,phonenumber,donateddate from moneydonations inner join user on user.userid=moneydonations.userid where donateddate between ? and ?");
$stmt->bindParam(1,$from);
$stmt->bindParam(2,$to);
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($firstname,$row["firstname"]);
    array_push($email,$row["email"]);
    array_push($userid,$row["userid"]);
    array_push($phonenumber,$row["phonenumber"]);
    array_push($donationid,$row["donationid"]);
    array_push($amount,$row["amount"]);
    array_push($transfertype,$row["transfertype"]);
    array_push($date,$row["donateddate"]);
    array_push($image,$row["image"]);
    
 
}

$conn=null;
?>
<html>
    <head>
        <title>VIEW REPORT DETAILS</title>
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
        <h3>TOTAL AMOUNT SUMMARY</h3>
        <?php
              if(count($donationid)>0)
              {
                ?>

            <table class="table">
            <tr>
                    
                    <td>USER ID</td>
                    <td>DONATED ID</td>
                    <td>NAME</td>
                    <td>PHONE NUMBER</td>
                    <td>EMAIL</td>
                    <td>DATE</td>
                    <td>AMOUNT</td>
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
                     echo "<td>".$email[$i]."</td>";
                     echo "<td>".$date[$i]."</td>";
                     echo "<td>".$amount[$i]."</td>";
                     echo "<td>".$transfertype[$i]."</td>";
                     echo "<td><img src=".$image[$i]." height=100 width=100/></td>";
                     $total=$total+$amount[$i];

                 }
    
                 ?>    
            <tr>

            <td>TOTAL AMOUNT OF DONATIONS</td>
            <td><?php echo $total; ?></td>
            </tr>
            </table>
        </div>
        </div>
        <?php
              }
        else{
            echo "NO  DONATIONS FROM " .$from. " to " .$to;
        }
        ?>
        <?php
         include('footer.php');
         ?>
    </body>
</html>