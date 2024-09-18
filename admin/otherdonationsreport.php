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
$userid=array();
$donationid=array();
$donationtype=array();
$date=array();
$donationdescrption=array();
//prepare select statements
$stmt=$conn->prepare("select firstname,email,otherdonations.userid,donateid,donationtype,description,donateddate,phonenumber,donateddate from otherdonations inner join user on user.userid=otherdonations.userid where donateddate between ? and ? ;");
$stmt->bindParam(1,$from);
$stmt->bindParam(2,$to);
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($firstname,$row["firstname"]);
    array_push($email,$row["email"]);
    array_push($userid,$row["userid"]);
    array_push($phonenumber,$row["phonenumber"]);
    array_push($date,$row["donateddate"]);
    array_push($donationid,$row["donateid"]);
    array_push($donationtype,$row["donationtype"]);
    array_push($donationdescrption,$row["description"]);
    
}
$conn=null;
?>
<html>
    <head>
        <title>VIEW OTHERDONATIONS</title>
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
        <h3>OTHER DONATIONS DETAILS</h3>
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
                    <td>DONATION TYPE</td>
                    <td>DONATION DESCRIPTION</td>
                        
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
                     echo "<td>".$donationtype[$i]."</td>";
                     echo "<td>".$donationdescrption[$i]."</td>";
                    
                     
            }
                 ?>
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