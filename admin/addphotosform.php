<?php
$childid=$_REQUEST["childid"];
$name=urldecode($_REQUEST["name"]);
$age=$_REQUEST["age"];
?>
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
            <h3>ADD PHOTOS</h3>
        <form method="POST" action="addphotos.php"enctype="multipart/form-data">
        <table class="table">
        <tr>
                <td>CHILD ID</td>
                <td>
                    <input type="text" name="textid"  value="<?php echo $childid?>" readonly>
                    

                </td>
            </tr>
            
            <tr>
                <td>CHILD NAME</td>
                <td>
                <input type="text" name="textname"  value="<?php echo $name?>" readonly>
                    

                </td>
            </tr>
            <tr>
                <td>AGE</td>
                <td>
                    <input type="number" name="textage" value="<?php echo $childname?>" required/>
                    

                </td>
            </tr>
            <tr>
                <td>IMAGE</td>
                <td>
                    <input type="file" name="file1" required/>
                    

                </td>
            </tr>
            <tr>
                <td>DATE OF IMAGE</td>
                <td>
                    <input type="date" name="textdate" required/>
                    

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
    
