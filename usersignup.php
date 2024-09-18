<?php
//fetch from html
$firstname=$_POST["textfname"];
$middlename=$_POST["textmname"];
$lastname=$_POST["textlname"];
$phone=$_POST["textphone"];
$email=$_POST["textemail"];
$new=$_POST["textpasword"];
$conform=$_POST["textcpassword"];
$add=$_POST["textarea"];
$city=$_POST["textcity"];
$pin=$_POST["textpin"];
$msg=null;
if($new==$conform)
{

//connection
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//3.prepare statment to insert data into the category table
try{
    $stmt=$conn->prepare("insert into user(firstname,middlename,lastname,email,password,address,city,pin,phonenumber) values (?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1,$firstname);
    $stmt->bindParam(2,$middlename);
    $stmt->bindParam(3,$lastname);
    $stmt->bindParam(4,$email);
    $stmt->bindParam(5,$new);
    $stmt->bindParam(6,$add);
    $stmt->bindParam(7,$city);
    $stmt->bindParam(8,$pin);
    $stmt->bindParam(9,$phone);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0){
        $msg="sign up sucessfull";
    }
    else{
        $msg="sign up unsucessful";
    }
}catch(Exception $e){
  $msg=$e->getMessage();
}
//4.clos ethe connection to datebase
finally{

  $conn=null;
}
}
else{
    $msg="NEW  AND CONFORM PASSWORD DO NOT MATCH";
    
}

?>
<html>
    <head>
        <title>Signin</title>
        <?php 
         include('loginlink.php')
         ?>
    </head>
    <body>
         <?php 
         include('header.php')
         ?>
        <table align="center">
         <tr>
            <td style="font: size 50px;"><?php
         
            echo $msg;
        ?></td>
         </tr>
         <tr>

<td>&nbsp;</td>
</tr>
         <tr>
                <td>
                <div class="group">
                  <a href="loginhome.php"><input type="button" class="button" value="BACK"/></a>

                </div>
                </td>
            </tr>
         </table>
        <?php 
         include('footer.php')
         ?>
    </body>
    </html>





