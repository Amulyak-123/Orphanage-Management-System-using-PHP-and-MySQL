<html>
    <head>
            <title>Sign in page</title>
            <?php
          include("loginlink.php");
         ?>


    </head>
    <body>
    <?php
          include("header.php");
         ?> 
    
        <div align="center">
            
        <form method="POST" action="usersignin.php">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">SIGN IN</label>
</br>



        <table class="table">
        <tr>
              
              <td>
              <div class="group">
                  <label for="user" class="label">Username</label>
                  <input type="email" name="textemail" class="input" id="user" required autofocus/>
              </div>

              </td>
              <br>
          </tr>
          <tr>
              <td>
              <div class="group">
                  <label for="pass" class="label">Password</label>
                  <input type ="password" name="textpassword"  class="input"  id="user" required />
              </div>
              </td>
          </tr>
          <tr>
          <tr>

<td>&nbsp;</td>
</tr>
            <td>
                    <a href="forgotpwdform.php">Forgot password?</a>
                </td>
            </tr>
            <tr>
                <td>
                <div class="group">
                    <input type="submit" class="button" value="login" />
                </div>
                </td>
                </tr>
                <tr>
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
         include('footer.php')
         ?>
    </body>
    </html>       
