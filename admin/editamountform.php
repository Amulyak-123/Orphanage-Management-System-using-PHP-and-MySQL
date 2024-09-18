<?php
$donationid=$_REQUEST["donationid"];
$name=$_REQUEST["name"];
$amount=$_REQUEST["amount"];
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
            
            <form method="POST" action="editamount.php">
                <h3>EDIT AMOUNT</h3>
    
    
            <table class="table">
                <tr>
                    <td>DONATION ID</tb>
                    <td>
                        <input type="text" name="textid" value=<?php echo $donationid;?> readonly/>
                        
    
                    </td>
                </tr>
                <tr>
                    <td> NAME</td>
                    <td>
                        <input type ="text" name="textname" id="textname" value="<?php echo $name;?>" readonly />                    </td>
                </tr>
                <tr>
            </tr>
            <tr>
                <td>AMOUNT</td>
                <td>
                    <input type="number" name="textamount" id="textamount" value="<?php echo $amount;?>"required/>
                    

                </td>
            </tr>
            </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="update" class="btn btn-primary"/>
                    </td>
            </tr>
            </table>
        </form> 
    </div>
    <?php
         include('footer.php');
         ?>
</body>
        
</html>
    