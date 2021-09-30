<?php

session_start();
    include_once '../dashboard/config.php';
if(isset($_POST['submit'])){
     $username = $_POST['username'];
     $fullName  = $_POST['fullname'];
     $Email = $_POST['email'];
     $mobile = $_POST['mobile'];
     $address = $_POST['address'];
     $dob = $_POST['dob'];
     $gender = $_POST['gender'];
    
     //--//--//--//--------------
      $photo =  $_FILES['photo'];
     $password = $_POST['password'];
     $cPassword = $_POST['cpassword'];
    //--//--//--//--------------
     if(strlen($mobile) != 10){
       $mobileError = "Please Enter 10 Digits Only";
     }
     //--//--//--//--------------
     $date1 = date("y-m-d");
     $diff = date_diff(date_create($dob),date_create(($date1)));
     if(($diff->y) <=18){
         $dobError = "You Are Minor To Register Or Check D.O.B.";
     }
    //--//--//--//--------------
    

    $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
    if($extension == "png" ||  $extension == "PNG" || $extension == "JPG" ||$extension == "jpg" || $extension == "jpeg"){
        $photoSize = number_format($photo['size']/1024);
        if($photoSize>=10 && $photoSize<=100){
            $photo;
        }else{
            $photoSizeEror = "Photo Size Invalid";
        }
    }else{
        $photoExtensionError = "Invalid Photo Type";
    }


	 $newPhotoName = "admins".$username.time().".".$extension;
    
     if (file_exists("uploads/". $newPhotoName)) {
	 		echo "Present";
             $photoExistError= "Please Upload Photo With Another File Name";
	 	} else {
	 		$photo;
	 	}
    //--//--//--//--------------
     $queryCheckEmail = "SELECT * FROM admins WHERE  Email = '$Email' ";
     $resultQ = mysqli_query($conn,$queryCheckEmail);
     if($resultQ->num_rows>0){
         $errorMail = "Email Exist";
     }else{
     $error1 = true;
     }
     //--//--//--//--------------
     $queryCheckName = "SELECT * FROM admins WHERE  UserName = '$username' ";
     $resultQU = mysqli_query($conn,$queryCheckEmail);
     if($resultQU->num_rows>0){
         $errorUser = "Username Exist";
     }else{
     $error2 = true;
     }
     //--//--//--//--------------

     if(strlen($password)<6){
         $errorPass = "Entered Password is too short";
                 if($password != $cPassword){
                     $errorCPass = "Please Enter Same Password";
                 }else{
                     $cPassword;
                 }
      }
      else{
         $password;
      }
    //--//--//--//--------------
     if(strlen($username)>10) {
         $errorUser = "Name is too long";
         }
     else{
         if (isset($error1) && isset($error2) && !isset($mobileError)&& (!isset($photoExtensionError) || !isset($photoSizeEror)) && !isset($photoExistError) && !isset($errorCPass) &&!isset($errorPass) && !isset($dobError) ) {
             $query =" INSERT INTO admins(`Full_name`, `UserName`, `Email`, `Mobile`, `address`, `gender`, `dob`, `Profile_pic`, `Password`)
             VALUES('$fullName' ,'$username' ,'$Email','$mobile','$address','$gender','$dob','$newPhotoName','$password')";        
             $result = mysqli_query($conn,$query);
        
             if ($result) {
                 move_uploaded_file($photo['tmp_name'], "../uploads/". $newPhotoName);
                 $_SESSION['Uphoto'] = $photo;
                 $message = "<h6 style='color: green; text-align: center;margin:0;'>User Registration Done</h6>";
                } else {
                  $message = "<h6 style='color: red; text-align: center;margin:0;'>Please Check Credentials</h6>";
             }
         } 
     }
     
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- LINKS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../css/style_admin_registration.css">
    <title>Document</title>
</head>
<body>
    <!-------------------- heading -------------------->
     <section id="heading">
    <img src="../home/sarathi_logo12.png" alt="">
    </section>
    <!-------------------- menu -------------------->
   
    <section id="menu">
    <!-------------------- options-output -------------------->
    <section id="options">
        <ul>
        <li><a href="../home.php">HOME</a></li>
            <li><a href="../admin/adminlogin.php">ADMIN LOGIN</a></li>
            <li><a href="../services/applicationststus.php">APPLICATION STATUS</a></li>
            <li><a href="../services/printlicense.php">PRINT LICENSE</a></li>
        </ul>
    </section>
    <section id="output">

        <!-------------------------------------->
        
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <th colspan="2">ADMIN REGISTER 
                    <?php if(isset($message)){
                        echo $message;
                    }?>
                </th>
            </tr>
            <tr>
                <td><span>*</span> FULL NAME :</td>
                <td><input type="text" name="fullname" id="" placeholder="Enter Full Name" required></td>
            </tr>
            <tr>
                <td><span>*</span> USERNAME :</td>
                <td><input type="text" name="username" id="" placeholder="Enter Username (Less Than 10 character)" required>
                <br><?php
                    if(isset($errorUser)){
                        echo "<span style=color:red>".$errorUser."<?span>";
                    }
                    ?>
                </td>
            </tr> 
             <tr>
                <td><span>*</span> EMAIL :</td>
                <td><input type="email" name="email" id="" placeholder="Enter Email" required>
                <br> <?php
                    if(isset($errorMail)){
                        echo "<span style=color:red>".$errorMail."<?span>";
                    }
                    ?>
            </td>
            </tr>
            <tr>
                <td><span>*</span> MOBILE NO.</td>
                <td><input type="number" name="mobile" id="Mnumber" placeholder="Enter Mobele Number (10-Digits only)" required>
                <br> <?php
                    if(isset($mobileError)){
                        echo "<span style=color:red>".$mobileError."<?span>";
                    }
                    ?>
            </td>
            </tr> 
            <tr>
                <td><span>*</span> GENDER :</td>
                <td style="text-align: center;">
                <input  type="radio" name="gender" value="male" required>MALE
                <input style="margin-left: 70px;" type="radio" name="gender" value="female" required>FEMALE</td>
            </tr>   
            <tr>
                <td><span>*</span> D.O.B.</td>
                <td><input  style="width:100%;" type="date" name="dob" id="dob"  required>
                <br> <?php
                    if(isset($dobError)){
                        echo "<span style=color:red>".$dobError."<?span>";
                    }
                    ?>
            </td>
            </tr>  
             <tr>
                <td><span>*</span> ADDRESS :</td>
                <td><textarea style="width: 100%;" name="address" id="address" rows="5" required></textarea ></td>
            </tr>
            <tr>
                <td><span>*</span> PASSPORT PHOTO :</td>
                <td><input type="file" value="" name="photo" required>
                <br> <?php
                    if(isset($photoSizeEror)){
                        echo "<span style=color:red>".$photoSizeEror."<?span>"."<br>";
                    } 

                    if(isset($photoExtensionError)){
                        echo "<span style=color:red>".$photoExtensionError."<?span>"."<br>";
                    } 

                    if(isset($photoExistError)){
                        echo "<span style=color:red>".$photoExistError."<?span>";
                    }
                    ?>
            </td>
            </tr> 
                
             <tr>
                <td><span>*</span> PASSWORD :</td>
                <td><input type="text" name="password" id="" placeholder="Enter Password (Not Lessthan 6 Character)"required><br>
                <?php
                    if(isset($errorPass)){
                        echo "<span style=color:red>".$errorPass."<?span>";
                    }
                    ?>
            
            </td>
            </tr>
            <tr>
                <td><span>*</span> CONFIRM PASSWORD :</td>
                <td><input type="text" name="cpassword" id="" placeholder="Enter Same Password"required><br>
                <?php
                    if(isset($errorCPass)){
                        echo "<span style=color:red>".$errorCPass."<?span>";
                    }
                    ?>
            </td>
            </tr>  
                <td   style="text-align: center;padding:8px" colspan="2"><input type="submit" name="submit" id="" VALUE="REGISTER">
                <br><br>
                Already Have an Account ? <b><a href="userLogin.php">LOGIN HERE..</a></b>                
                <p>please fill mandatory fields with <span>*</span> sign.</p>
            </td>
            </tr>
        </table>
    </form>
      <!-------------------------------------->
    </section> 

    </section> 
</body>
</html>