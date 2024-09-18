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
        <title>MONEY DONATIONS</title>
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
        <h3>MONEY DONATATIONS</h3>
                <form method="POST" action="moneydonation.php" enctype="multipart/form-data">
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
                    <td>AMOUNT</td>
                    <td><input type="text" name="textamt"  id="textamt"></td>               
                 </tr>
                 <tr>
                    <td>DATE OF DONATION</td>
                    <td><input type="date" name="textdate"  id="textdate"></td>               
                 </tr>
                 <tr>
                    <td>TRANSFER TYPE</td>
                    <td><input type="text" name="texttype"  id="texttype"></td>               
                 </tr>
                 <tr>
                <td>IMAGE OF DONATION</td>
                <td>
                    <input type="file" name="file1" id="file1" required/>
                    

                </td>
            </tr>
                  <tr>
                    <td colspan="2"><input type="submit" value="DONATE" id="btnupdate" class="btn btn-primary"/></td>
                    
                                   
                 </tr>
                 
                 
            </table>
        </form>
        <table class="table">
        <tr>
                <td>DONATION VIA BANK PHONE NUMBER</td>
            </tr>
            <tr>
                <td>PHONE NUMBER:9986978199</td>
            </tr>
             <tr>
                <td>DONATION VIA BANK TRANSFER</td>
            </tr>
            <tr>
                <td>ACCOUNT NO : 30928615533</td>
            </tr>    
            <tr>
                <td>A/C NAME:JESUS SIKSHANA SAMSTHE</td>
            </tr>
            <tr>
                <td>STATE BANK OF INDIA</td>
            </tr>
            <tr>
                <td>IFSC CODE:SBINOOO7861</td>
            </tr>
            <tr>
                <td>BRANCH : SINDHANUR</td>
            </tr>


        </table>
        </div>
        </div>
        <?php
                include('footer.php');
                ?>

           </body>
</html>