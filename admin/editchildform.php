<?php
//fetch url param
$childid=$_REQUEST["childid"];
$birthdate=$_REQUEST["birthdate"];
$age=$_REQUEST["age"];
$gender=$_REQUEST["gender"];
$addhar=$_REQUEST["addhar"];

$city=$_REQUEST["city"];
$pin=$_REQUEST["pin"];
$name=urldecode($_REQUEST["name"]);
$father=urldecode($_REQUEST["fathername"]);
$mother=urldecode($_REQUEST["mothername"]);
$education=urldecode($_REQUEST["education"]);
$address=urldecode($_REQUEST["address"]);
?>
<html>
    <head>
        <title>EDIT CHILD</title>
        <link rel="stylesheet" href="styless.css">
        <?php
        session_start();
          include("headerlink.php");
         ?>
    </head>
    <script>
        function validate()
        {
            var fnamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var fname=document.forms["regform"]["textname"].value;
            if(fname.search(fnamepattern)==-1)
            {  
                document.getElementById("name").innerHTML="NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }
            var fnamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var fname=document.forms["regform"]["textfather"].value;
            if(fname.search(fnamepattern)==-1)
            {
                document.getElementById("ftname").innerHTML="FATHER NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }

            var mnamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var mname=document.forms["regform"]["textmother"].value;
            if(mname.search(mnamepattern)==-1)
            {
                document.getElementById("maname").innerHTML="MOTHER NAME CONTAINS ONLY ALPHABETS WITHOUT SPACE";
                return false;
            }
            var textaddharpattern=/^[0-9]{12}$/;
            var addhar=document.forms["regform"]["textadhar"].value;
            if(addhar.search(textaddharpattern)==-1)
            {
                document.getElementById("addhar").innerHTML="ADDHAR NUMBER SHOULD CONATIN ONLY DIGITS AND MINIMUM 12";
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
    <?php 
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
         <div class="container">
            <div class="item">
        <?php
         include('header.php');
         ?>
         <br>
        </div>
        
    <div align="center">
            
            <form method="POST" action="editchild.php" name="regform" onsubmit="return validate();">
                <h3>EDIT CHILD</h3>
    
    
            <table class="table">
                <tr>
                    <td>CHILD ID</tb>
                    <td>
                        <input type="text" name="textid" value=<?php echo $childid;?> readonly/>
                        
    
                    </td>
                </tr>
                <tr>
                    <td> NAME</td>
                    <td>
                        <input type ="text" name="textname" id="textname" value="<?php echo $name;?>"  maxlength="20" minlength="3" autofocus required/>
                        <p id="name" style="color:orange;"></p>
                    </td>
                </tr>
                <tr>
                <td>DATE OF BIRTH</td>
                <td>
                    <input type="date" name="textcal" id="textcal" value="<?php echo $birthdate;?>"onchange="getdate()" required/>
                    

                </td>
            </tr>
            <tr>
                <td>AGE</td>
                <td>
                    <input type="number" name="textage" id="textage" value="<?php echo $age;?>"required/>
                    

                </td>
            </tr>
            <tr>
                <td>GENDER</td>
                <td>
                    <?php
                    if($gender=="Male")
                    {
                        ?>
                        <input type="radio" name="gender" id="gender" value="Male" checked/>MALE
                        <input type="radio" name="gender" id="gender" value="Female"/>FEMALE
                    
                        <?php
                    }
                    else{
                    ?>
                    <input type="radio" name="gender" id="gender" value="MALE"/>MALE
                    
                    <input type="radio" name="gender" id="gender" value="FEMALE" checked/>FEMALE
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>FATHER NAME</td>
                <td>
                    <input type="text" name="textfather" id="textfather" value="<?php echo $father;?>"  maxlength="20" minlength="3" required/>
                    <p id="ftname" style="color:orange;"></p>

                </td>
            </tr>
            <tr>
                <td>MOTHER NAME</td>
                <td>
                    <input type ="text" name="textmother" id="textmother" value="<?php echo $mother;?>"  maxlength="20" minlength="3" required/>
                    <p id="maname" style="color:orange;"></p>
                </td>
            </tr>
            <tr>
                <td>ADDHAR CARD NUMBER</td>
                <td>
                    <input type="text" name="textadhar" id="textadhar" value="<?php echo $addhar;?>"  maxlength="12" minlength="12" required/>
                    <p id="addhar" style="color:orange;"></p>


                </td>
            </tr>
            <tr>
                <td>EDUCATION</td>
                <td>
                    <input type="text" name="texteducation" id="texteducation" value="<?php echo $education;?>"   maxlength="20" minlength="3"required/>
                    


                </td>
            </tr>
            <tr>
                <td>ADDRESS</td>
                <td>
                 <textarea name="textaddress" required><?php echo $address;?></textarea>
                </td>
            </tr>
            <tr>
                <td>CITY</td>
                <td>
                    <input type ="text" name="textcity" value="<?php echo $city;?>" required/>
                </td>
            </tr>
            <tr>
                <td>PIN</td>
                <td>
                    <input type="text" name="textpin" value="<?php echo $pin;?>" maxlength="6" minlength="6" required/>
                    <p id="pin" style="color:orange;"></p>

                </td>
            </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="update" class="btn btn-primary"/>
                    </td>
                </tr>
            </table>
        </form> 
        </div>
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
        </body>
        <?php
         include('footer.php');
         ?>
</html>