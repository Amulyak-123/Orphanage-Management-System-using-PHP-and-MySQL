<?php
$to=$_POST["textemailid"];
//from="amulya123kollipara@gmail.com";
//to="";
$msg=null;
try {
     
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$conn->prepare("select password from admin where emailid=?");
$stmt->bindParam(1,$to);
$stmt->execute();
$r=$stmt->rowCount();
if($r==1){
        
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $password=$row["password"];
    $subject="FORGOT PASSWORD";
    $message="<b>YOUR PASSWORD is $password</b>";
    $header="From:amulya123kollipara@gmail.com \r\n";
    
    $returnval=mail($to,$subject,$message,$header);
    
    if($returnval==true){
        $msg="password sent to your email.";
    }else
    {
        $msg="mail failed";
    }
}

}
catch(Exception $e){
    $msg=$e->getMessage();
}
?>
<html>
   <head>    
    <title>FORGOT PASSWORD</title>
    <?php
          include("loginlink.php");
         ?>
   </head>
<body>
<?php
          include("header.php");
         ?>
         <table align="center">
            
            <tr>
                <td><?php echo $msg?>
            </td>
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
          include("footer.php");
         ?>

</body>
</html>