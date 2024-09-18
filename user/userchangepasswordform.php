<html>
    <head>
        <title>password change</title>
        <link rel="stylesheet" href="styless.css">
        <?php
        session_start();
          include("headerlink.php");
         ?>

    </head>
    <script>
        function validate()
        {
            //which should contain at least one lowercase latter,one uppercase,one numeric digit,and one special charater
            var npwdpattern=/^(?=.\d)(?=.[a-z])(?=.[A-Z])(?=.[^a-zA-Z0-9])(?!.*\s).{6,8}$/;
            var npwd=document.forms["regform"]["textnpassword"].value;
            if(npwd.search(npwdpattern)==-1)
            {
                document.getElementById("pssname").innerHTML="PASSWORD MUST CONTAIN AT LEAST 1 LOWER,1 UPPER,1 DIGIT,1 SPECIAl";
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
            <h3>CHANGE PASSWORD</h3>
        <form method="POST" action="userchangepassword.php">


        <table class="table">
            <tr>
                <td>CURRENT PASSWORD</tb>
                <td>
                    <input type="password" name="textpassword" id="textpassword" required autofocus/>
                    

                </td>
            </tr>
            <tr>
                <td>NEW PASSWORD</td>
                <td>
                    <input type="password" name="textnpassword" id="textnpassword" required />
                    <p id="pssname" style="color:info;"></p>

                </td>
            </tr>
            <tr>
                <td>CONFIRM PASSWORD</td>
                <td>
                    <input type="password" name="textcpassword" id="textcpassword" required />
                    

                </td>
            </tr>
            <tr>
                <td colspan="2">

                    <input type ="submit" name="btn" value="change" class="btn btn-primary"/>
                </td>
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
