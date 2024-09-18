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
    $msg="login failed".$e->getMessage();
}
finally{
$conn=null;
}
?>
<html>
    <head>
        <title>MY DETAILS</title>
        <link rel="stylesheet" href="styless.css"/>
        <?php
    
          include("headerlink.php");
         ?>

        <style>
            input,
            textarea {
                background-color:#D5D7DA;
            }
        </style>
    </head>
    <script>
        function validate()
        {
            var fnamepattern=/^[A-Za-z]+$/;
            var fname=document.forms["regform"]["textfname"].value;
            if(fname.search(fnamepattern)==-1)
            {  
                document.getElementById("name").innerHTML="FIRST NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }
            var mnamepattern=/^[A-Za-z]+$/;
            var mname=document.forms["regform"]["textmname"].value;
            if(mname.search(mnamepattern)==-1)
            {
                document.getElementById("miname").innerHTML="MIDDLE NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }

            var lnamepattern=/^[A-Za-z]+$/;
            var lname=document.forms["regform"]["textlname"].value;
            if(lname.search(lnamepattern)==-1)
            {
                document.getElementById("laname").innerHTML="MIDDLE NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }
            var textphonepattern=/^[0-9]{10}$/;
            var phone=document.forms["regform"]["textphone"].value;
            if(phone.search(textphonepattern)==-1)
            {
                document.getElementById("pname").innerHTML="NUMBER SHOULD CONATIN ONLY DIGITS AND MINIMUM 10";
                return false;
                
            }
            
        }
    </script>

    <body>
        
        <div class="container">
            <div class="item">
                <?php
                include('header.php');
                ?>
            <br>
            </div>
            <?php 
         if(empty($_SESSION))
         {
             header('location:../usersigninform.php');
         }
         ?>
            <div class="item">
        <h3>MY DETAILS</h3>
        <button id="btn" onclick="enable()">EDIT</button>
        <form method="POST" action="mydetails.php" name="regform" onsubmit="return validate();">
            <table class="table">
            <tr>
                    <td>FIRST NAME</td>
                    <td><input type="text" name="textfname" id="textfname" value="<?php echo $firstname; ?>"readonly/>
                    <p id="name" style="color:orange;"></p></td>               
                 </tr>

                 <tr>
                    <td>MIDDLE NAME</td>
                    <td><input type="text" name="textmname" id="textmname" value="<?php echo $middlename; ?>"readonly/>
                    <p id="miname" style="color:orange;"></p></td>               
                 </tr>

                 <tr>
                    <td>LAST NAME</td>
                    <td><input type="text" name="textlname" id="textlname" value="<?php echo $lastname; ?>"readonly/>
                    <p id="laname" style="color:orange;"></p></td>               
                 </tr>

                <tr>
                 <td>EMAIL ID</td>
                    <td><input type="text" name="textemail" id="textemail" value="<?php echo $email; ?>"readonly/></td>               
                 </tr>
                 <tr>

                    <td>PHONE NUMBER</td>
                    <td><input type="text" name="textphone"  id="textphone" value="<?php echo $phonenumber; ?>"readonly/>
                    <p id="pname" style="color:orange;"></p></td>               
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
                    <td colspan="2"><input type="submit" value="update" id="btnupdate" disabled class="btn btn-primary"/></td>
                    
                                   
                 </tr>
                 
                 
            </table>
        </form>
        </div>
        </div>
        <script>
            function enable()
            {
                document.getElementById("textfname").readOnly=false;
                document.getElementById("textmname").readOnly=false;
                document.getElementById("textlname").readOnly=false;
                document.getElementById("textphone").readOnly=false;
                document.getElementById("textcity").readOnly=false;
                document.getElementById("textpin").readOnly=false;
                document.getElementById("textaddress").readOnly=false;

                document.getElementById("textmname").style.backgroundColor="white";
                document.getElementById("textlname").style.backgroundColor="white";
                document.getElementById("textphone").style.backgroundColor="white";
                document.getElementById("textcity").style.backgroundColor="white";
                document.getElementById("textpin").style.backgroundColor="white";
                document.getElementById("textaddress").style.backgroundColor="white";

                document.getElementById("btnupdate").disabled=false;
                document.getElementById("textname").focus();
            }
            </script>
            <?php
                include('footer.php');
                ?>

    </body>
</html>