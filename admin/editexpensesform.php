<?php
//fetch url param
$id=$_REQUEST["expid"];
$date=$_REQUEST["expdate"];
$amount=$_REQUEST["amount"];
$expsenses=urldecode($_REQUEST["expdes"]);

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
    <body>
    <div class="container">
            <div class="item">
        <?php
         include('header.php');
         ?>
         <br>
        </div>
    <div align="center">
    <form method="POST" action="editexpenses.php"enctype="multipart/form-data">
        <table class="table">
        <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="expid" id="expid" value="<?php echo $id;?>" readonly/>
                    

                </td>
            </tr>
        <tr>
                <td>DATE</td>
                <td>
                    <input type="date" name="expdate" id="expdate" value="<?php echo $date;?>" required autofocus/>
                    

                </td>
            </tr>
            <tr>
                <td>EXPENSES DESCRIPTION</td>
                <td>
                    <textarea name="expdes" required ><?php echo $expsenses;?></textarea>
                    

                </td>
            </tr>
            <tr>
                <td>AMOUNT</td>
                <td>
                    <input type="number" name="amount" id="amount" value="<?php echo $amount;?>" required/>
                    

                </td>
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
    

            
          