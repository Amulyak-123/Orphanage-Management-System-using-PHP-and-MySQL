<?php
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
session_start();
$email=$_SESSION["email"];
$msg=null;
$firstname=null;
$middlename=null;
$lastname=null;
$phonenumber=null;
$address=null;
$city=null;
$pin=null;
$userid=null;

try{

$stmt=$conn->prepare("select * from user where email=?");
$stmt->bindParam(1,$email);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $userid=$row["userid"];
    $firstname=$row["firstname"];
    $middlename=$row["middlename"];
    $lastname=$row["lastname"];
    $phonenumber=$row["phonenumber"];
    $address=$row["address"];
    $city=$row["city"];
    $pin=$row["pin"];
    

}
}
catch(Exception $e){
    $msg="Application failed".$e->getMessage();
}
finally{
$conn=null;
}
?>
<html>
    <head>
        <title>APPLICATION</title>
        <link rel="stylesheet" href="styless.css"/>
        <?php
        
          include("headerlink.php");
         ?>

        
    </head>
    <script>
        function validate()
        {
            var pnamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var pname=document.forms["regform"]["textprofession"].value;
            if(pname.search(pnamepattern)==-1)
            {  
                document.getElementById("proname").innerHTML="PROFESSION NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }
            var textpinpattern=/^[0-9]{6}$/;
            var pin=document.forms["regform"]["textnpin"].value;
            if(pin.search(textpinpattern)==-1)
            {
                document.getElementById("pin").innerHTML="PIN SHOULD CONATIN ONLY DIGITS AND MINIMUM 6";
                return false;
                
            }
            var inamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var iname=document.forms["regform"]["texthealth"].value;
            if(iname.search(inamepattern)==-1)
            {  
                document.getElementById("hname").innerHTML="HEALTH INSURAENCE TYPE NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }
                        
        }
    </script>
    <body>
    <?php 
         if(empty($_SESSION))
         {
             header('location:../usersigninform.php');
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
        <h3>ADOPTION APPLICATION</h3>
                <form method="POST" action="application.php" enctype="multipart/form-data" name="regform" onsubmit="return validate();">
            <table class="table">
            <tr>
                    <td>USER ID</td>
                    <td><input type="number" name="textuserid" id="textuserid" value="<?php echo $userid; ?>"readonly/></td>               
                 </tr>

                <tr>
                    <td>FIRST NAME</td>
                    <td><input type="text" name="textfname" id="textfname" value="<?php echo $firstname; ?>"readonly/></td>               
                 </tr>

                 <tr>
                    <td>MIDDLE NAME</td>
                    <td><input type="text" name="textmname" id="textmname" value="<?php echo $middlename; ?>"readonly/></td>               
                 </tr>

                 <tr>
                    <td>LAST NAME</td>
                    <td><input type="text" name="textlname" id="textlname" value="<?php echo $lastname; ?>"readonly/></td>               
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
                    <td>ADDRESS</td>
                    <td><textarea name="textaddress" id="textaddress" readonly><?php echo $address; ?></textarea></td>  

                 </tr>
                 <tr>
                    <td>CITY</td>
                    <td><input type="text" name="textcity" id="textcity" value="<?php echo $city; ?>"readonly/></td>               
                 </tr>

                 <tr>
                    <td>PIN</td>
                    <td><input type="text" name="textpin" id="textpin" value="<?php echo $pin; ?>"readonly/></td>               
                 </tr>

                 <tr>
                    <td>DATE OF BIRTH</td>
                    <td><input type="date" name="textcal" id="textcal" onchange="getdate()" required autofocus/></td>               
                 </tr>

                 <tr>
                    <td>AGE</td>
                    <td><input type="number" name="textage" id="textage" required/></td>               
                 </tr>

                 <tr>
                <td>GENDER</td>
                   <td>
                    <input type="radio" name="gender" value="MALE"/>MALE
                    <input type="radio" name="gender" value="FEMALE"/>FEMALE

                   </td>
                </tr>

                 <tr>
                    <td>APPLICATION DATE</td>
                    <td><input type="date" name="textdate" id="textdate" required/></td>               
                 </tr>
                 <tr>   
                <td>STATUS</td>
                    <td>
                    <input type="radio" name="textstatus" value="MARRIED"/>MARRIED
                    <input type="radio" name="textstatus" value="SINGLE"/>SINGLE
                    <input type="radio" name="textstatus" value="DIVORCED"/>DIVORCED

                    </td>
                </tr>
                <tr>

                    <td>PROFESSION</td>
                    <td><input type="text" name="textprofession" id="textprofession" maxlength="30" minlength="3" required/>  
                    <p id="proname" style="color:orange;"></p>  </td>           
                 </tr>
                 <tr>

                    <td>PROFESSIONAL ADDRESS</td>
                    <td><textarea row=5 name="proaddress" id="proaddress" required></textarea></td>               
                 </tr>

                 <tr>
                    <td>CITY</td>
                    <td><input type="text" name="textcity" id="textcity" required/></td>               
                 </tr>
                
                 <tr>
                    <td>PIN</td>
                    <td><input type="text" name="textnpin" id="textnpin" maxlength="6" minlength="6" required/>
                    <p id="pin" style="color:orange;"></p></td>               
                 </tr>

                 <tr>
                    <td>HEALTH INSURANCE TYPE</td>
                    <td><input type="text" name="texthealth" id="texthealth" maxlength="20" minlength="3" required/>   
                    <p id="hname" style="color:orange";></p></td>            
                 </tr>

                 <tr>
                    <td>REASONS FOR ADOPTION</td>
                    <td><textarea row=5 name="textreasons" id="textreasons" required></textarea></td>               
                 </tr>
                 <tr>
                    <td>ALL DOCUMENTS BELOW MENTIONED SHOULD BE ADDED IN THE PDF</br>1.PHOTO</br>2.ADDHAR CARD</br>3.INCOME</br>4.VOTING CARD</br>5.HEALTH INSURANCE</br>6.Bank statements</td>
                    <td><input type="file" name="file2" id="file2"/></td>               
                 </tr>

                <tr>
                    <td colspan="2"><input type="submit" value="SUBMIT" id="btnupdate" class="btn btn-primary"/></td>
                    
                                   
                 </tr>
                 
                 
            </table>
        </form>
        </div>
        </div>
        <?php
                include('footer.php');
                ?>

           </body>
           <script>
    function getdate(){
                 var cal=document.getElementById("textcal");
                document.getElementById("textcal").value=cal.value;
                var birthdate=cal.value;
                var ageinmilliseconds=new Date()-new Date(birthdate);
                age=Math.floor(ageinmilliseconds/1000/60/60/24/365);
                document.getElementById("textage").value=age;
            }
            </script>
</html>