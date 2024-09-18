<?php
//session start

session_start();
//get the input
$currentpassword=$_POST["textpassword"];
$newpassword=$_POST["textnpassword"];
$confirmpassword=$_POST["textcpassword"];
//compare  session and current pwd
if($currentpassword==$_SESSION["password"])
{
    if($newpassword==$confirmpassword){
        //update
        try{
            $conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt=$conn->prepare("update admin set password=? where emailid=?");
            $stmt->bindParam(1,$newpassword);
            $stmt->bindParam(2,$_SESSION["email"]);
            $stmt->execute();
            $c=$stmt->rowCount();
            if($c==1){
                //update session
                $_SESSION["password"]=$newpassword;
                $msg="PASSWORD CHANGED SUCCESSFULLY";
            }
            else{
                $msg="PASSWORD CHANGE FAILED";
            }
            


        }
        catch(Exception $e)
        {
            $msg="PASSWORD UPDATE FAILED".$e->getMessage();
        }
        finally{
            $conn=null;
        }
    }
    else{
        $msg="NEW AND CONFIRM PASSWORD DO NOT MATCH";
    }
}
else{
    $msg="CURRENT PASSWORD AND OLD PASSWORD DO NOT MATCH";
}

if(empty($_SESSION))
{
    header('location:../adminsigninform.php');
}
?>
<html>
    <head>
        <title>password change</title>
        <link rel="stylesheet" href="styless.css">
        <?php
    
          include("headerlink.php");
         ?>
    </head>
    <body>
        <div class="container">
            <div class="item" align="center">
        <?php
         include('header.php');
         ?>
         <br>
        </div>
        <div class="item">
          <h4>  <?php
            echo $msg;
            ?></h4>
        </div>
        </div>
        <br>
        <?php
         include('footer.php');
         ?>
    </body>
</html>   
