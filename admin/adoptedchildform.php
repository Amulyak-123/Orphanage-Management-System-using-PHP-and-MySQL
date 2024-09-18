<?php
$childid=$_REQUEST["childid"];
$name=urldecode($_REQUEST["name"]);
$age=$_REQUEST["age"];
session_start();
$appid=$_SESSION["appid"];
$gname=$_SESSION["name"];
$userid=$_SESSION["userid"];
$email=$_SESSION["email"];
$address=$_SESSION["address"];
$phonenumber=$_SESSION["phonenumber"];
$city=$_SESSION["city"];
$pin=$_SESSION["pin"];


?>
<html>
    <head>
        <title>EDIT CHILD</title>
        <link rel="stylesheet" href="styless.css">
        <?php
        
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
    <?php 
         if(empty($_SESSION))
         {
             header('location:../adminsigninform.php');
         }
         ?>
    <div align="center">
            
            <form method="POST" action="adoptedchild.php">
                <h3>ADOPTED CHILD</h3>
    
    
            <table class="table">
                <tr>
                    <td>CHILD ID</tb>
                    <td>
                        <input type="text" name="textid" value="<?php echo $childid;?>" readonly />
                        
    
                    </td>

                </tr>
                <tr>
                    <td>USER ID</tb>
                    <td>
                        <input type="text" name="userid" value="<?php echo $userid;?>" readonly />
                        
    
                    </td>
                 </tr>
                 <tr>
                    <td>APLIICATION ID</td>
                    <td>
                        <input type ="number" name="textappid" value="<?php echo $appid;?>" readonly/>
                    </td>
                </tr>    
                <tr>
                    <td>CHILD NAME</td>
                    <td>
                        <input type ="text" name="textname" value="<?php echo $name;?>" readonly/>
                    </td>
                </tr>
                <tr>
                    <td>Present age</td>
                    <td>
                        <input type ="number" name="textage" value="<?php echo $age;?>" readonly/>
                    </td>
                </tr>
                
                <tr>
                    <td>GUARDIAN NAME</td>
                    <td>
                        <input type ="text" name="textfname" value="<?php echo $gname;?>" readonly/>
                    </td>
                </tr>
                <tr>
                    <td>ADOPTER EMAIL</td>
                    <td>
                        <input type ="text" name="textemail" value="<?php echo $email;?>" readonly/>
                    </td>
                </tr>
                <tr>
                    <td>ADOPTER CONTACT DETAILS</td>
                    <td>
                        <input type ="text" name="textphone" value="<?php echo $phonenumber;?>" readonly/>
                    </td>
                </tr>
                <tr>
                    <td>ADDRESS</td>
                    <td>
                        <textarea name="textadd"readonly><?php echo $address;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>CITY</td>
                    <td>
                        <input type ="text" name="textcity" value="<?php echo $city;?>" readonly/>
                    </td>
                </tr>
                <tr>
                    <td>PIN</td>
                    <td>
                        <input type ="text" name="textpin" value="<?php echo $pin;?>" readonly/>
                    </td>
                </tr>
                <tr>
                    <td>Date of adoption</td>
                    <td>
                        <input type ="date" name="textdate" autofocus required/>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" value="ADD" class="btn btn-primary"/>
                    </td>
                </tr>
            </table>
        </form> 
        </div>
        <?php
         include('footer.php');
         ?>
        </body>
    </body>
</html>