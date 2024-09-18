<html>
    <head>
        <title>REPORT</title>
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
            <h3>TOTAL MONEY DONATION AMOUNT SUMMARY</h3>
        <form method="POST" action="donationreport.php"enctype="multipart/form-data">
        <table class="table">
        <tr>
                <td>REPORT FROM</td>
                <td>
                    <input type="date" name="textdate1" required/>
                    

                </td>
            </tr>
            <tr>
                <td>REPORT TO</td>
                <td>
                    <input type="date" name="textdate2" required/>
                    

                </td>
            </tr>
        
            <tr>
                
                <td>
                    <input type="submit" name="btn" value="VIEW" class="btn btn-primary" />
                    

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
    
