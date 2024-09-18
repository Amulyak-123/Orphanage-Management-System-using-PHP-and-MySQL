<html>
    <head>
        <title>FORGET PASSWORD</title>
        <?php
          include("loginlink.php");
         ?>

    
    </head>
    <body>
    <?php
          include("header.php");
          ?>
           <div align="center">

        <form method="POST" action="forgotpwd.php">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">FORGOT PASSWORD</label>
            <table class="table">
            <tr>
                
                <div class="group">
					<label for="user" class="label">EMAIL ID</label>
                <input type="email" name="textemailid" id="textemailid" class="input" required autofocus>
                </div>
            </tr>
            <tr>
            <div class="group">
             <input type="submit" name="btn" class="button"  value="submit">
            </div>
        </form>
        <?php
          include("footer.php");
          ?>
           </div>
    </body>
</html>
