<?php
$appid=$_REQUEST["appid"];
//set a connections
$conn=new PDO("mysql:host=localhost;dbname=orphangedb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$firstname=array();
$middlename=array();
$lastname=array();
$phonenumber=array();
$email=array();
$address=array();
$city=array();
$pin=array();
$userid=array();
$birthdate=array();
$age=array();
$gender=array();
$appdate=array();
$status=array();
$profession=array();
$proaddress=array();
$health=array();
$reasons=array();
$procity=array();
$propin=array();
$appid_array=array();
$image=array();


//prepare select statements
$stmt=$conn->prepare("select application.userid,Appid,Birthdate,Age,Appdate,Status,profession,doc,application.Address,application.City,application.Pin,HealthInsurance,Reasons,gender,firstname,middlename,lastname,phonenumber,email,user.address,user.city,user.pin from application inner join user on user.userid=application.userid where appid=?;");
$stmt->bindParam(1,$appid);
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($appid_array,$row["Appid"]);
    array_push($userid,$row["userid"]);
    array_push($firstname,$row["firstname"]);
    array_push($middlename,$row["middlename"]);
    array_push($lastname,$row["lastname"]);
    array_push($phonenumber,$row["phonenumber"]);
    array_push($email,$row["email"]);
    array_push($address,$row["address"]);
    array_push($city,$row["city"]);
    array_push($pin,$row["pin"]);
    array_push($birthdate,$row["Birthdate"]);
    array_push($age,$row["Age"]);
    array_push($gender,$row["gender"]);
    array_push($appdate,$row["Appdate"]);
    array_push($status,$row["Status"]);
    array_push($profession,$row["profession"]);
    array_push($proaddress,$row["Address"]);
    array_push($procity,$row["City"]);
    array_push($propin,$row["Pin"]);
    array_push($health,$row["HealthInsurance"]);
    array_push($reasons,$row["Reasons"]);
    array_push($image,$row["doc"]);
    }
    
$conn=null;
?>
<html>
    <head>
        <title>APPLICATION</title>
        <link rel="stylesheet" href="styless.css"/>
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
        <h3>ADOPTION APPLICATION</h3>
            <table class="table">
            <?php
                 $len=count($appid_array);
                 for($i=0;$i<$len;$i++)
                 {
                

                     ?>
            <tr>
                    <td>APPLICATION ID</td>
                    <td><input type="number" name="textid" id="textid" value="<?php echo $appid_array[$i]; ?>"readonly/></td>               
                 </tr>

            
            <tr>
                    <td>USER ID</td>
                    <td><input type="number" name="textuserid" id="textuserid" value="<?php echo $userid[$i]; ?>"readonly/></td>               
                 </tr>

                <tr>
                    <td>FIRST NAME</td>
                    <td><input type="text" name="textfname" id="textfname" value="<?php echo $firstname[$i]; ?>"readonly/></td>               
                 </tr>

                 <tr>
                    <td>MIDDLE NAME</td>
                    <td><input type="text" name="textmname" id="textmname" value="<?php echo $middlename[$i]; ?>"readonly/></td>               
                 </tr>

                 <tr>
                    <td>LAST NAME</td>
                    <td><input type="text" name="textlname" id="textlname" value="<?php echo $lastname[$i]; ?>"readonly/></td>               
                 </tr>

                <tr>
                 <td>EMAIL ID</td>
                    <td><input type="text" name="textemail" id="textemail" value="<?php echo $email[$i]; ?>"readonly/></td>               
                 </tr>
                 <tr>

                    <td>PHONE NUMBER</td>
                    <td><input type="text" name="textphone"  id="textphone" value="<?php echo $phonenumber[$i]; ?>"readonly/></td>               
                 </tr>

                 <tr>
                    <td>ADDRESS</td>
                    <td><textarea name="textaddress" id="textaddress" readonly><?php echo $address[$i]; ?></textarea></td>  

                 </tr>
                 <tr>
                    <td>CITY</td>
                    <td><input type="text" name="textcity" id="textcity" value="<?php echo $city[$i]; ?>"readonly/></td>               
                 </tr>

                 <tr>
                    <td>PIN</td>
                    <td><input type="text" name="textpin" id="textpin" value="<?php echo $pin[$i]; ?>"readonly/></td>               
                 </tr>

                 <tr>
                    <td>DATE OF BIRTH</td>
                    <td><input type="date" name="textbirth" id="textbirth" value="<?php echo $birthdate[$i] ?>" readonly/></td>               
                 </tr>

                 <tr>
                    <td>AGE</td>
                    <td><input type="number" name="textage" id="textpin" value="<?php echo $age[$i] ?>" readonly/></td>               
                 </tr>

                 <tr>
                <td>GENDER</td>
                   <td>
                   <input type="text" name="textage" id="textpin" value="<?php echo $gender[$i] ?>" readonly/>
                   </td>
                </tr>

                 <tr>
                    <td>APPLICATION DATE</td>
                    <td><input type="date" name="textdate" id="textdate" value="<?php echo $appdate[$i] ?>" readonly /></td>               
                 </tr>
                 <tr>   
                <td>STATUS</td>
                    <td>
                    <input type="text" name="textstatus" value="<?php echo $status[$i] ?>" readonly/>
                    
                    </td>
                </tr>
                <tr>

                    <td>PROFESSION</td>
                    <td><input type="text" name="textprofession" id="textprofession" value="<?php echo $profession[$i] ?>" readonly/></td>               
                 </tr>
                 <tr>

                    <td>PROFESSION ADDRESS</td>
                    <td><textarea row=5 name="proaddress" id="proaddress" readontl><?php echo $proaddress[$i] ?></textarea></td>               
                 </tr>

                 <tr>
                    <td>CITY</td>
                    <td><input type="text" name="textcity" id="textcity"  value="<?php echo $procity[$i] ?>" readonly/></td>               
                 </tr>
                
                 <tr>
                    <td>PIN</td>
                    <td><input type="text" name="textpin" id="textpin" value="<?php echo $propin[$i] ?>" readonly/></td>               
                 </tr>

                 <tr>
                    <td>HEALTH INSURANCE</td>
                    <td><input type="text" name="texthealth" id="texthealth" value="<?php echo $health[$i] ?>" readonly/></td>               
                 </tr>

                 <tr>
                    <td>REASONS FOR ADOPTION</td>
                    <td><textarea row=5 name="textreasons" id="textreasons" readonly><?php echo $reasons[$i] ?></textarea></td>               
                 </tr>
                 <tr>
                     <td>DOCUMENTS</td>
                     <td><?php echo "<a href=viewpdf.php?pdffile=$image[$i]>view pdf</a>"?></td>
                 </tr>
                 <?php
                 }
                 ?> 
                 
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
