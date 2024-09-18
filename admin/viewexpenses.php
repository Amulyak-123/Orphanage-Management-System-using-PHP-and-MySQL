<?php
$total=0;
//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$date=array();
$expensestype=array();
$expenses=array();
$amount=array();
$id=array();


//prepare select statements
$stmt=$conn->prepare("select * from expenses;");
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
        <title>VIEW EXPENSES DETAILS</title>
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
        <h3>EXPENSES DETAILS</h3>
            <table class="table">
                <tr>

                    <td>EXPENSES ID</td> 
                    <td>DATE</td>
                    <td>EXPENSES TYPE</td>
                    <td>EXPENSES DESCRIPTION</td>
                    <td>AMOUNT</td>    
                    <td>EDIT</td>        
                 </tr>
                 <?php
                 $len=count($id);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>".$id[$i]."</td>";
                     echo "<td>".$date[$i]."</td>";
                     echo "<td>".$expensestype[$i]."</td>";
                     echo "<td>".$expenses[$i]."</td>";
                     $cname=urlencode($expenses[$i]);
                     echo "<td>".$amount[$i]."</td>";
                     echo "<td><a href=editexpensesform.php?expid=$id[$i]&expdate=$date[$i]&expdes=$cname&amount=$amount[$i]>EDIT</a></td>";
                     echo "</tr>";
                     $total=$total+$amount[$i];

                 }
                 echo "TOTAL EXPENSES =".$total;
                 ?>
            </table>
            <form method="POST" action="viewtype.php"enctype="multipart/form-data">
            <table>
        <tr>
                <td>SELECT EXPENSES VIEW TYPE</td>

                
               <td> <select name="texttype">
                    <option>FOOD</option>
                    <option>CLOTHS</option>
                    <option>MEDICAL</option>
                    <option>SALARY</option>
                    <option>OTHERS</option>
                    </select></td>
                   
            </tr>
            <tr>
                    <td colspan="2">
                        <input type="submit" value="VIEW" class="btn btn-primary"/>
                    </td>
                </tr>
            </table>
        </div>
        </div>
        <?php
                include('footer.php');
                ?>
    </body>
</html>