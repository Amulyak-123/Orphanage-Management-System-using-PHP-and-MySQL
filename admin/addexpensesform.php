<html>
    <head>
        <title>ADD CHILD</title>
        <link rel="stylesheet" href="styless.css">
        <?php
        session_start();
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
            <h3>ADD EXPENSES</h3>
        <form method="POST" action="addexpenses.php"enctype="multipart/form-data">
        <table class="table">
        <tr>
                <td>DATE</td>
                <td>
                    <input type="date" name="textdate" required/>
                    

                </td>
            </tr>
            <tr>
                <td>EXPENSES TYPE</td>
                <td>
                   <select name="texttype">
                    <option>FOOD</option>
                    <option>CLOTHS</option>
                    <option>MEDICAL</option>
                    <option>SALARY</option>
                    <option>OTHERS</option>

                   </select>
                    

                </td>
            </tr>
        
            <tr>
                <td>EXPENSES DESCRIPTION</td>
                <td>
                <textarea name="textexpen" id="textexpen" autofocus required></textarea>
                    

                </td>
            </tr>
            <tr>
                <td>AMOUNT</td>
                <td>
                    <input type="number" name="textamount" maxlength="10" minlength="1" required/>
                    
                </td>
            </tr>
            <tr>
                
                <td>
                    <input type="submit" name="btn" value="ADD" class="btn btn-primary" />
                    

                </td>
            </tr>
            </table>
        </form>
        </div>
        </div>
        <?php
         include('footer.php');
         ?>
        
        <?php 
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
 
    </body>
</html>
    
