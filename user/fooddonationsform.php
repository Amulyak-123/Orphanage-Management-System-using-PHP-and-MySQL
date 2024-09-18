<?php
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
session_start();
$email=$_SESSION["email"];
$msg=null;
$firstname=null;
$phonenumber=null;
$userid=null;

try{

$stmt=$conn->prepare("select * from user where email=?");
$stmt->bindParam(1,$email);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $userid=$row["userid"];
    $firstname=$row["firstname"];
    $phonenumber=$row["phonenumber"];

}
}
catch(Exception $e){
    $msg="donation failed".$e->getMessage();
}
finally{
$conn=null;
}
?>
<html>
    <head>
        <title>FOOD DONATIONS</title>
        <link rel="stylesheet" href="styless.css"/>
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
            <div class="item">
        <h3>FOOOD DONATION</h3>
                <form method="POST" action="fooddonations.php" enctype="multipart/form-data">
            <table class="table">
            <tr>
                    <td>USER ID</td>
                    <td><input type="number" name="textuserid" id="textuserid" value="<?php echo $userid; ?>"readonly/></td>               
                 </tr>

                <tr>
                    <td> NAME</td>
                    <td><input type="text" name="textfname" id="textfname" value="<?php echo $firstname; ?>"readonly/></td>               
                 </tr>

                 
                <tr>
                 <td>EMAIL ID</td>
                    <td><input type="text" name="textemail" id="textemail" value="<?php echo $email; ?>"readonly/></td>               
                 </tr>
                 <tr>
                    <td>PHONE NUMBER</td>
                    <td><input type="text" name="textphone"  id="textphone" value="<?php echo $phonenumber; ?>"readonly/></td>               
                 </tr>
                 <tr>
                    <td>FOOD TYPE</td>
                    <td><input type="text" name="texttype"  id="texttype"></td>               
                 </tr>
                 <tr>
                    <td>QUANTITY</td>
                    <td><input type="text" name="textqty"  id="textqty"></td>               
                 </tr>
                 <tr>
                    <td>DONATION DATE</td>
                    <td><input type="date" name="textdate"  id="textdate"></td>               
                 </tr>
                  <tr>
                    <td colspan="2"><input type="submit" value="DONATE" id="btnupdate" class="btn btn-primary"/></td>
                    
                                   
                 </tr>
                 
                 
            </table>
        </form>
        </div>
        </div>
        <?php
                include('footer.php');
                ?>

           </body>
</html>