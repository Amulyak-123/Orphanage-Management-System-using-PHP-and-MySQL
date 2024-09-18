<?php
//fetch url param
$staffid=$_REQUEST["staffid"];
$firstname=$_REQUEST["firstname"];
$middlename=$_REQUEST["middlename"];
$lastname=$_REQUEST["lastname"];
$phonenumber=$_REQUEST["phonenumber"];
$email=$_REQUEST["email"];
$salary=$_REQUEST["salary"];
$city=$_REQUEST["city"];
$pin=$_REQUEST["pin"];
$responsibility=urldecode($_REQUEST["res"]);
$address=urldecode($_REQUEST["address"]);




?>
<html>
    <head>
        <title>EDIT PRODUCT</title>
        <link rel="stylesheet" href="styless.css">
        <?php
        session_start();
          include("headerlink.php");
         ?>
    </head>
    <script>
        function validate()
        {
            var fnamepattern=/^[A-Za-z]+$/;
            var fname=document.forms["regform"]["firstname"].value;
            if(fname.search(fnamepattern)==-1)
            {  
                document.getElementById("name").innerHTML="FIRST NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }
            var mnamepattern=/^[A-Za-z]+$/;
            var mname=document.forms["regform"]["middlename"].value;
            if(mname.search(mnamepattern)==-1)
            {
                document.getElementById("miname").innerHTML="MIDDLE NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }

            var lnamepattern=/^[A-Za-z]+$/;
            var lname=document.forms["regform"]["lastname"].value;
            if(lname.search(lnamepattern)==-1)
            {
                document.getElementById("laname").innerHTML="LAST NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }
            var textphonepattern=/^[0-9]{10}$/;
            var phone=document.forms["regform"]["textphone"].value;
            if(phone.search(textphonepattern)==-1)
            {
                document.getElementById("pname").innerHTML="NUMBER SHOULD CONATIN ONLY DIGITS AND MINIMUM 10";
                return false;
                
            }
            var renamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var rename=document.forms["regform"]["textres"].value;
            if(rename.search(renamepattern)==-1)
            {  
                document.getElementById("rename").innerHTML="RESPONSIBILITY CONTAINS ONLY ALPHABETS";
                return false;
            }
            var textpinpattern=/^[0-9]{6}$/;
            var pin=document.forms["regform"]["textpin"].value;
            if(pin.search(textpinpattern)==-1)
            {
                document.getElementById("pin").innerHTML="PIN SHOULD CONATIN ONLY DIGITS AND MINIMUM 6";
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
    <div align="center">
    <form method="POST" action="editstaff.php"enctype="multipart/form-data" name="regform" onsubmit="return validate();">
        <table class="table">
        <tr>
                <td>staffid</td>
                <td>
                    <input type="text" name="staffid" id="staffid" value="<?php echo $staffid;?>" readonly/>
                    

                </td>
            </tr>
        <tr>
                <td>FIRST NAME</td>
                <td>
                    <input type="text" name="firstname" id="firstname" value="<?php echo $firstname;?>" maxlength="20" minlength="3" required autofocus/>
                    <p id="name" style="color:orange;"></p>

                </td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                    <input type="text" name="middlename" id="middlename" value="<?php echo $middlename;?>" maxlength="20" minlength="3" required />
                    <p id="miname" style="color:orange;"></p>

                </td>
            </tr>
            <tr>
                <td>LAST NAME</td>
                <td>
                    <input type="text" name="lastname" id="lastname" value="<?php echo $lastname;?>" maxlength="20" minlength="1" required />
                    <p id="laname" style="color:orange;"></p>

                </td>
            </tr>
            <tr>
                <td>PHONE NUMBER</td>
                <td>
                    <input type ="text" name="textphone" id="textphone" value="<?php echo $phonenumber;?>" maxlength="10" minlength="10" required />
                    <p id="pname" style="color:orange;"></p>
                </td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td>
                    <input type="text" name="textemail" id="textemail" value="<?php echo $email;?>" required />
                    

                </td>
            </tr>
            <tr>
                <td>RESPOSIBILITY</td>
                <td>
                    <input type="area" name="textres" id="textres" value="<?php echo $responsibility;?>" maxlength="20" minlength="3" required />
                    <p id="rename" style="color:orange;"></p>

                </td>
            </tr>
            <tr>
                <td>SALARY</td>
                <td>
                    <input type="text" name="textsalary" id="textsalary" value="<?php echo $salary;?>" required />
                    

                </td>
            </tr>
            <tr>
                <td>ADDRESS</td>
                <td>
                    <textarea name="textaddress" id="textaddress" required><?php echo $address;?></textarea>
       

                </td>
            </tr>
            <tr>
                <td>CITY</td>
                <td>
                    <input type="text" name="textcity" id="textcity" value="<?php echo $city;?>" required />
                    

                </td>
                <tr>
                <td>PIN</td>
                <td>
                    <input type="text" name="textpin" id="textpin" value="<?php echo $pin;?>" required />
                    

                </td>
            </tr>
            </tr>
            
            <tr>
                
                <td>
                    <input type="submit" name="btn" value="update" class="btn btn-primary"/>
                    

                </td>
            </tr>
            </table>
        </form>
        </div>
        </div>
        <?php 
    
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
        <?php
         include('footer.php');
         ?>
     </body>
</html>
    

            
          