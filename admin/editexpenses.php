<?php
//fetch posted data
$id=$_POST["expid"];
$date=$_POST["expdate"];
$expenses=$_POST["expdes"];
$amount=$_POST["amount"];
$msg=null;

try{
    $conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->prepare("update expenses set expensesdescrption=?,amount=?,expensesdate=? where expensesid=?");
    $stmt->bindParam(1,$expenses);
    $stmt->bindParam(2,$amount);
    $stmt->bindParam(3,$date);
    $stmt->bindParam(4,$id);
    $stmt->execute();
    $c=$stmt->rowCount();
      if($c==1){
          $msg="EXPESES UPDATE DONE";
      }
      else{
          $msg="EXPENSESUPDATE FAILD";
      }
}catch(Exception $e){
    $msg="expenses update failed".$e->getMessage();
}
//4.clos ethe connection to datebase
finally{
    
    $conn=null;
}
?>
<html>
    <head>
        <title>expenses</title>
        <link rel="stylesheet" href="styless.css">
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
        <div class="item" align="center">
          <h4>
                <?php
            echo $msg;
            ?></h4>
        </div>
        <?php
         include('footer.php');
         ?>
        </div>
        
         
        
    </body>
</html>

