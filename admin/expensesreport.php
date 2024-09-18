<?php
$from=$_POST["textdate1"];
$to=$_POST["textdate2"];
$total=0;
$expensestype=array();
$expenses=array();
$amount=array();
$date=array();
$id=array();

//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//prepare select statements
$stmt=$conn->prepare("select expensestype,expensesdescrption,expensesid,amount,expensesdate from expenses where expensesdate between ? and ?");
$stmt->bindParam(1,$from);
$stmt->bindParam(2,$to);
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($id,$row["expensesid"]);
    array_push($date,$row["expensesdate"]);
    array_push($expenses,$row["expensesdescrption"]);
    array_push($amount,$row["amount"]);
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
        <h3>TOTAL AMOUNT SUMMARY OF EXPENSES</h3>
        <?php
              if(count($id)>0)
              {
                ?>
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
                     echo "<td>".$date[$i]."</td>";
                     echo "<td>".$amount[$i]."</td>";
                     $total=$total+$amount[$i];

                 }

                 ?>
                 <tr>
            <td>TOTAL AMOUNT OF EXPENSES</td>
            <td><?php echo $total; ?></td>
           </tr>
            </table>
        </div>
        </div>
        <?php
              }
        else{
            echo "NO  OTHER DONATIONS FROM " .$from. " to " .$to;
        }
        ?>
        <?php
                include('footer.php');
                ?>
    </body>
</html>