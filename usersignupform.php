<html>
    <head>
        <title>Sign up page</title>
        <?php
          include("loginlink.php");
         ?>

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
            //which should contain at least one lowercase latter,one uppercase,one numeric digit,and one special charater
            var npwdpattern=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,8}$/;
            var npwd=document.forms["regform"]["textpasword"].value;
            if(npwd.search(npwdpattern)==-1)
            {
                document.getElementById("pssname").innerHTML="PASSWORD SHOULD CONATAIN 1 LOWER CASE,1 UPPER CASE,1 SPECIAL,1 NUMBER";
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
          include("header.php");
          ?>    
        <div align="center">
            
        <form method="POST" action="usersignup.php" name="regform" onsubmit="return validate();">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">SIGN UP</label>


        <table class="table">
            <tr>
            <td>FIRST NAME</td>
                <td>
                  
                    <div class="group">
                    <input type="text" name="textfname"  id="textfname" class="input" maxlength="20" minlength="3"  required autofocus/>
                    <p id="name" style="color:orange;"></p>
                    </div>
                </td>
            </tr>
            <tr>
            <td>MIDDLE NAME</td>
                <td>
                    <div class="group"> 
                    <input type="text" name="textmname"  id="textmname" class="input" maxlength="20" minlength="3"  required/>
                    <p id="miname" style="color:orange;"></p>
                    </div>
                </td>
            </tr>
            <tr>
            <td>LAST NAME</td> 
                <td>
                <div class="group">
                    <input type="text" name="textlname"  id="textlname" class="input" maxlength="20" minlength="1"  required/>
                    <p id="laname" style="color:orange;"></p>
                </div>
                </td>
            </tr>
            <tr>
            <td>PHONE NUMBER</td>
                <td>
                <div class="group">
            
                    <input type ="text" name="textphone"  id="textph" class="input" maxlength="10" minlength="10" required/>
                    <p id="pname" style="color:orange;"></p>
                </div>    
                </td>
            </tr>
            <tr>
            <td>EMAIL</td>
                <td>
                <div class="group">
                    <input type="text" name="textemail"  id="textemail" class="input"  required/>
                </div>   

                </td>
            </tr>
            <tr>
            <td>NEW PASSWORD</td>
                <td>
                <div class="group">
                    <input type="password" name="textpasword" id="textpasword" class="input" maxlength="8" minlength="6"  required/>
                    <p id="pssname" style="color:orange;"></p>
                </div>    

                </td>
            </tr>
            <tr>
            <td>CONFORM PASSWORD</td>
                <td>
                <div class="group">
                    <input type="password" name="textcpassword" id="textcpassword" maxlength="8" minlength="6" class="input" required/>
                </div>   

                </td>
            </tr>
            <tr>
            <td>ADDRESS</td>
                <td>
                <div class="group">

                    <textarea row=5 name="textarea" id="textarea" class="input"  required></textarea>
                </div>    

                </td>
            </tr>
            <tr>
            <td>CITY</td>
                <td>
                <div class="group">
                    <input type="text" name="textcity" id="textcity" class="input" required/>
                    
                </div>
                </td>
            </tr>
            <tr>
            <td>PIN</td>
                <td>
                <div class="group">
                    <input type="text" name="textpin" id="textpin" class="input" maxlength="6" minlength="6" required/>
                    <p id="pin" style="color:orange;"></p>

                </div>    

                </td>
            </tr>
           
        
              <tr>
                <td>
                <div class="group">
                    <input type="submit" class="button" value="SIGN UP" />
                </div>
                </td>
                    
                <td>
                <div class="group">
                  <a href="loginhome.php"><input type="button" class="button" value="Back"/></a>
                </div>
                </td>
                </tr>
            
           
        </table>
        </form>
        </div>
        <?php
          include("footer.php");
          ?>
    </body>
</html>