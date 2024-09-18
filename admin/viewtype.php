<?php
$total=0;
$type=$_POST["texttype"];
//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$date=array();
$expenses=array();
$exptype=array();
$amount=array();
$id=array();


//prepare select statements
$stmt=$conn->prepare("select expensesdate,expensesdescrption,amount,expensesid,expensestype from expenses where expensestype=?");
$stmt->bindParam(1,$type);
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($id,$row["expensesid"]);
    array_push($date,$row["expensesdate"]);
    array_push($expenses,$row["expensesdescrption"]);
    array_push($exptype,$row["expensestype"]);
    array_push($amount,$row["amount"]);
   
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
                            
                 </tr>
                 <?php
                 $len=count($id);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>".$id[$i]."</td>";
                     echo "<td>".$date[$i]."</td>";
                     echo "<td>".$exptype[$i]."</td>";
                     echo "<td>".$expenses[$i]."</td>";
                     $cname=urlencode($expenses[$i]);
                     echo "<td>".$amount[$i]."</td>";
                    
                     echo "</tr>";
                     $total=$total+$amount[$i];

                 }
                 echo "TOTAL EXPENSES OF ".$type."=".$total; 
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