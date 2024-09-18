<?php
$from=$_POST["textdate1"];
$to=$_POST["textdate2"];
$firstname=array();
$phonenumber=array();
$email=array();
$userid=array();
$donationid=array();
$date1=array();
$amount=array();
$transfertype=array();
$image=array();
$expensestype=array();
$expenses=array();
$date2=array();
$amount1=array();
$id=array();
$total1=0;
$total2=0;
$sum=0;
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
    array_push($date1,$row["donateddate"]);
    array_push($amount,$row["amount"]);
    array_push($transfertype,$row["transfertype"]);
    array_push($image,$row["image"]);
    
 
}
//prepare select statements
$stmt=$conn->prepare("select expensestype,expensesdescrption,expensesid,amount,expensesdate from expenses where expensesdate between ? and ?");
$stmt->bindParam(1,$from);
$stmt->bindParam(2,$to);
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($id,$row["expensesid"]);
    array_push($expenses,$row["expensesdescrption"]);
    array_push($date2,$row["expensesdate"]);
    array_push($amount1,$row["amount"]);
    array_push($expensestype,$row["expensestype"]);

 
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
        <br>
        <?php
              if(count($donationid)>0)
              {
                ?>

        <h4>DONATION REPORT</h4>
        
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
                     echo "<td>".$date1[$i]."</td>";
                     echo "<td>".$amount[$i]."</td>";
                     echo "<td>".$transfertype[$i]."</td>";
                     echo "<td><img src=".$image[$i]." height=100 width=100/></td>";
                     $total1=$total1+$amount[$i];

                 }
    
                 ?>    
            <tr>

            <td>TOTAL AMOUNT OF DONATIONS</td>
            <td><?php echo $total1; ?></td>
            </tr>
            </table>
            <h4>EXPENSES REPORT</h4>
            <table class="table">
            <tr>

           <td>EXPENSES ID</td>
           <td>EXPENSES TYPE</td>
           <td>EXPENSES DESCRIPTION</td>
           <td>DATE</td>
           <td>AMOUNT</td>
            
           <?php
                
                 $len=count($id);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>".$id[$i]."</td>";
                     echo "<td>".$expensestype[$i]."</td>";
                     echo "<td>".$expenses[$i]."</td>";
                     echo "<td>".$date2[$i]."</td>";
                     echo "<td>".$amount1[$i]."</td>";
                     $total2=$total2+$amount1[$i];

                 }
                 $sum=$total1-$total2;

                 ?>
                 <tr>
            <td>TOTAL AMOUNT OF EXPENSES</td>
            <td><?php echo $total2; ?></td>
           </tr>
            </table>
            <?php echo "TOTAL REPORT ON MONEY= $sum";?>
            <?php
              }
        else{
            echo "NO  DONATIONS FROM " .$from. " to " .$to;
        }
        ?>
 
        </div>
        </div>
              </body>

    <?php
       include("footer.php");
       ?>
</html>