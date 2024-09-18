<?php
session_start();
//fetch input
$email=$_POST["textemail"];
$pwd=$_POST["textpassword"];
$msg=null;
//open conn
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


try{
    //build the stmt to check
    $stmt=$conn->prepare("select * from admin where emailid=? and password=?");
    $stmt->bindParam(1,$email);
    $stmt->bindParam(2,$pwd);
    $stmt->execute();
    $c=$stmt->rowCount();

    //if found then goto adminhome.html else error msg
    if($c==1){
        //store admin details in session
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$pwd;
        header('location:admin/adminhome.php');
    

    }
    else{
        $msg="Invalid login";
    }
}catch(Exception $e){
    $msg="Invalid login,".$e->getMessage();

}
?>
<html>
    <head>
        <title>Signin</title>
        <?php
          include("loginlink.php");
         ?> 
    </head>
    <body>
        
         <?php 
         include('header.php')
         ?>
        <table align="center"> 
         <tr>
            <td style="font-size:50px;">
            <?php
            echo $msg;
         
        ?></td>
         </tr>
         <tr>

<td>&nbsp;</td>
</tr>
         <tr>
                <td>
                <div class="group">
                  <a href="adminsigninform.php"><input type="button" class="button" value="TRY AGAIN"/></a>

                </div>
                </td>
            </tr>
        </table> 
        <?php 
         include('footer.php')
         ?> 
    </body>
    </html>
