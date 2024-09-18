<?php
//session start

use JetBrains\PhpStorm\Internal\PhpStormStubsElementAvailable;

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
            $stmt=$conn->prepare("update user set password=? where email=?");
            $stmt->bindParam(1,$newpassword);
            $stmt->bindParam(2,$_SESSION["email"]);
            $stmt->execute();
            $c=$stmt->rowCount();
            if($c==1){
                //update session
                $_SESSION["password"]=$newpassword;
                $msg="PASSWORD CHANGED SUCESSFULLY";
            }
            else{
                $msg="PASSWORD CHANGE FAILED";
            }
            


        }
        catch(Exception $e)
        {
            $msg="PASSWORD UPDATE FAIELD".$e->getMessage();
        }
        finally{
            $conn=null;
        }
    }
    else{
        $msg="NEW AND CONFIORM PASSWORD DO NOT MATCH";
    }
}
else{
    $msg="CURRENT AND OLD PASSWORD DO NOT MATCH";
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
            <div class="item">
        <?php
         include('header.php');
         ?>

        </div>
        <br>
        <div class="item" align="center">
            <h4><?php
            echo $msg;
            ?></h4>
        </div>
        </div>
        <?php 
         if(empty($_SESSION))
         {
             header('location:../usersigninform.php');
         }
         ?>
         <?php
                include('footer.php');
                ?>

    </body>
</html>   
