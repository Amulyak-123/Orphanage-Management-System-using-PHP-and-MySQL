<html>
    <head>
        <title>ADD CHILD</title>
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
                document.getElementById("addhar").innerHTML="ADDHAR NUMBER SHOULD CONATIN ONLY DIGITS AND MINIMUM 10";
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
        </div>
        <?php 
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
         <br>
        <div class="item">
            <h3>ADD CHILD</h3>
        <form method="POST" action="addchild.php"enctype="multipart/form-data" name="regform" onsubmit="return validate();">
        <table class="table">
            <tr>
                <td>NAME</td>
                <td>
                    <input type="text" name="textname" id="textname" maxlength="20" minlength="3" required autofocus/>
                    <p id="name" style="color:orange;"></p>

                    

                </td>
            </tr>
            <tr>
                <td>DATE OF BIRTH</td>
                <td>
                    <input type="date" name="textcal" id="textcal" onchange="getdate()" />
                    

                </td>
            </tr>
            <tr>
                <td>AGE</td>
                <td>
                    <input type="number" name="textage" id="textage" required/>
                    

                </td>
            </tr>
            <tr>
                <td>GENDER</td>
                <td>
                    <input type="radio" name="gender" id="gender" value="male"/>MALE
                    <input type="radio" name="gender" id="gender" value="female"/>FEMALE

                </td>
            </tr>
            <tr>
                <td>FATHER NAME</td>
                <td>
                    <input type="text" name="textfather" id="textfather" maxlength="20" minlength="3" value="NULL"/>
                    <p id="ftname" style="color:orange;"></p>
                </td>
            </tr>
            <tr>
                <td>MOTHER NAME</td>
                <td>
                    <input type ="text" name="textmother" id="textmother" maxlength="20" minlength="3" value="NULL"/>
                    <p id="maname" style="color:orange;"></p>
                </td>
            </tr>
            <tr>
                <td>ADDHAR CARD NUMBER</td>
                <td>
                    <input type="text" name="textadhar" id="textadhar" maxlength="12" minlength="12" required/>
                    <p id="addhar" style="color:orange;"></p>
                    

                </td>
            </tr>
            <tr>
                <td>EDUCATION</td>
                <td>
                    <input type="text" name="texteducation" id="texteducation" maxlength="20" minlength="3" required/>
                    
                </td>
            </tr>
            <tr>
                <td>ADDRESS</td>
                <td>
                <textarea name="textaddress" id="textaddress" required></textarea>                    

                </td>
            </tr>
            <tr>
                <td>CITY</td>
                <td>
                    <input type ="text" name="textcity" id="textcity" required/>
                </td>
            </tr>
            <tr>
                <td>PIN</td>
                <td>
                    <input type="text" name="textpin" id="textpin" maxlength="6" minlength="6" required/>
                    <p id="pin" style="color:orange;"></p>

                </td>
            </tr>
            
            <tr>
                <td>IMAGE</td>
                <td>
                    <input type="file" name="file1" id="file1" required/>
                    

                </td>
            </tr>
            <tr>
                
                <td colspan="2">
                    <input type="submit" name="btn" value="ADD" class="btn btn-primary"/>
                    

                </td>
            </tr>
            </table>
        </form>
        </div>
        </div>
        <?php
         include('footer.php');
         ?>
 
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
</html>
    
