<?php
session_start();
include_once '../dashboard/config.php';
//--//--//--//--------------


    if(isset($_POST['submit'])){  
        
            $documents = $_FILES['documents'];
            $uname = $_POST['uname'];
            $fullName  = $_POST['fullname'];    
            $Email = $_POST['mail'];
            $mobile = $_POST['mobile'];
            $Password = $_POST['Password'];


            if(isset($_POST['education1'])){
            $education1 = $_POST['education1'];
            if($education1 == ''){
                $queryCheck4 = "SELECT `documents` FROM users WHERE  sr_no = ".$_SESSION['user_id'];
                $resultCheck4 = mysqli_query($conn, $queryCheck4);
                $userDetails4 = mysqli_fetch_assoc($resultCheck4);
                $education1 = $userDetails2['education'] ;
              }else{
                 $education1 =implode(",",$education1);
              } 
              
            }
            //--//--//--//--------------
            if(isset($documents)){
                $extension2 = pathinfo($documents['name'], PATHINFO_EXTENSION);
                // echo "<pre>";
                // print_r($documents);
                // die;
                if($documents['error'] == 4){
                    $queryCheck2 = "SELECT `documents` FROM users WHERE  sr_no = ".$_SESSION['user_id'];
                    $resultCheck2 = mysqli_query($conn, $queryCheck2);
                    $userDetails2 = mysqli_fetch_assoc($resultCheck2);
                    $doc2 = $userDetails2['documents'] ;
                   
                }else{
                    if($extension2 == "pdf" || $extension2 == "PDF"){
                        $docsize = number_format($documents['size']/1024);
                        if($docsize >=100 || $docsize <=2000){
                            $documents;
                        }else{
                            $docsizeerror = "Document Size In-Valid";
                        }
                    }else{
                        $docexterror = "Invalid File Type";
                    }
                }
                
                $doc2 = $uname.time()."_Document".".".$extension2;
                              
            }
            
            if(isset($_FILES['pic1'])){
                $pic1 =$_FILES['pic1'];
                if($pic1['error'] == 4){
                    $queryCheck1 = "SELECT `profile_pic` FROM users WHERE  sr_no = ".$_SESSION['user_id'];
                    $resultCheck1 = mysqli_query($conn, $queryCheck1);
                    $userDetails1 = mysqli_fetch_assoc($resultCheck1);
                    $new2 = $userDetails1['profile_pic'] ;
                }else{
                    $extension = pathinfo($pic1['name'], PATHINFO_EXTENSION);
                    if($extension == "png" ||  $extension == "PNG" || $extension == "JPG" |$extension == "jpg" || $extension == "jpeg"){
                        $photoSize = number_format($pic1['size']/1024);
                        if($photoSize>=10 && $photoSize<=100){
                            $photo;
                        }else{
                            echo  $photoSizeEror = "Photo Size Invalid";
                        }
                    }else{
                        echo $photoExtensionError = "Invalid Photo Type";
                    }
                    $new2 = $uname.time().".".$extension;
                }
            } 
            
    //--//--//--//--------------

            $query = "UPDATE `users` SET `full_name`='$fullName',`documents`='$doc2',`username`='$uname',`education`='$education1',`email`='$Email',`profile_pic`='$new2',`mobile`='$mobile',`Password`='$Password' WHERE sr_no =".$_SESSION['user_id'];
            $result = mysqli_query($conn, $query);
    
            if ($result && !isset($docexterror) && !isset($docsizeerror)) {
                move_uploaded_file($pic1['tmp_name'], "../uploads/". $new2);
                move_uploaded_file($documents['tmp_name'], "../uploads/". $doc2);
                $message = "<h5 style='text-align: center; color: green;margin:0px''>Updated</h5>";
     
            } else {
                $message = "<h5 style='text-align: center; color: red;margin:0px''>Something Error</h5>";
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
   <link rel="stylesheet" href="../css/style_users_dashboard.css">
    <title>Document</title>
</head>
<body>
    <!-------------------- heading -------------------->
     <section id="heading">
    <img src="../home/sarathi_logo12.png" alt="">
    <button id="logout"><a href="../dashboard/logout.php">LOG OUT</a></button>
    </section>
    
    <!-------------------- menu -------------------->
   
    <section id="menu">
    <!-------------------- options-output -------------------->
    <section id="options">
        <ul>
            <li><a href="../home.php">HOME</a></li>
            <li><a href="../services/computertest.php">COMPUTER TEST</a></li>
            <li><a href="../services/drivingtest.php">DRIVING TEST</a></li>
        </ul>
    </section>
    <!-------------------- output -------------------->
    
    <?php

    if(!$_SESSION['is_login']){
        header("Location: ../dashboard/logout.php");
    }else{

        $queryCheck = "SELECT * FROM users WHERE  sr_no = ".$_SESSION['user_id'];
        $resultCheck = mysqli_query($conn, $queryCheck);
        $userDetails = mysqli_fetch_assoc($resultCheck);
        $arrayeducation = explode(",", $userDetails['education']);

        if(!$userDetails['documents'] = ''){
             $docm = "Document Submitted";
        }
        // echo "<pre>";
        // print_r($arrayeducation);
        // print_r($userDetails); 
        // die;
    }
     
    ?>
    
    <section id="output">
        <div id="profile">
            <img src="../uploads/<?php echo $userDetails['profile_pic'] ?>" style="border-radius: 50px;"  width="60">
            <div class="hero"><?php echo "<h1>".$userDetails['username']."</h1>" ?></div>
            </div>   

    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <th colspan="2">PROFILE UPDATE 
                    <?php if(isset($message)){
                        echo $message;
                    }?>
                </th>
            </tr>
            <!-- table comment -->
           <tr>
                <td>FULL NAME :</td>
                <td><input type="text" name="fullname" id="" value="<?php echo $userDetails['full_name'] ?>"></td>
            </tr>
             <tr>
                <td>USERNAME :</td>
                <td><input type="text" name="uname" id="" value="<?php echo $userDetails['username'] ?>"></td>
            </tr> 
              <tr>
                <td>EMAIL :</td>
                <td><input type="email" name="mail" id="" value="<?php echo $userDetails['email'] ?>"></td>
            </tr>
            <tr>
                <td>MOBILE NO.</td>
                <td><input type="number" name="mobile" id="" value="<?php echo $userDetails['mobile'] ?>">
            </tr> 
            <tr>
                <td>PROFILE PIC:</td>
                <td><input type="file" name="pic1" id="" value="<?php echo $userDetails['profile_pic'] ?>">
                
            </td>
            </tr>
            <tr>
                <td>education :</td>
                <td style="text-align: left;">
                <!-- <input type="text" name="education" id="" value="<?php echo $userDetails['education'] ?>"><br> -->
                
                
                <input type="checkbox" name="education1[]" value="8th"  <?php if (in_array("8th", $arrayeducation)) {
                       echo "checked";
                    } ?>>8th
                    <input  style="margin-left: 55px;" type="checkbox" name="education1[]" value="10th"  <?php if (in_array("10th", $arrayeducation)) {
                       echo "checked";
                    } ?>>10th <br>
                    <input type="checkbox" name="education1[]" value="12th"  <?php if (in_array("12th", $arrayeducation)) {
                       echo "checked";
                    } ?>>12th
                    <input style="margin-left: 45px;"  type="checkbox" name="education1[]" value="Other"  <?php if (in_array("Other", $arrayeducation)) {
                       echo "checked";
                    } ?>>Other
             

                </td>
            </tr> 
           <tr>
               <td>Documents :</td>
               <td><input type="file" name="documents" id="documents" > <br><br>
               <?php 
               if(isset($docm)){
               echo "<span style='color:red;font-weight:600'>".$docm."</span>";
               }?>
                     <?php
                    if(isset($docexterror)){
                        echo "<span style=color:red>".$docexterror."<?span>";
                    }
                    if(isset($docsizeerror )){
                        echo "<span style=color:red>".$docsizeerror."<?span>";
                    }?>
                    <br>
                    <span style="color:green ; font-size:15px">please upload listed files in given order :- <br>
                        1)Adhar Card <br>
                        2)Age Proof (Leaving certificate,birth certificate)  <br>
                        3)Address Proof (Ration Card,Electricity Bill)<br>
                        4)Education Proof (Last Qualification Marksheet)<br>
                        5)Medical Certificate (if Age>50 years)<br>
                    </span>
            </td>
           </tr>
           
            <tr>
                <td>DATE OF DRIVING TEST :</td>
                <td><input type="text" name="fullname" id="" value="<?php 
                if(isset($userDetails['driving_slot'] )){
                    if( $userDetails['driving_slot'] == 0 ){
                        echo "PLEASE CONFIRM DATE";
                    }else{
                      echo $userDetails['driving_slot'];
                    }
                }
                
                
                
                ?>"></td>
            </tr>
            <tr>
                <td>DATE OF COMPUTER TEST :</td>
                <td><input type="text" name="fullname" id="" value="<?php 
                if(isset($userDetails['computer_slot'] )){
                    if( $userDetails['computer_slot'] == 0 ){
                        echo "PLEASE CONFIRM DATE";
                    }else{
                      echo $userDetails['computer_slot'];
                    }
                }
                ?>"></td>
            </tr>
          
            <tr>
                <td>PASSWORD :</td>
                <td><input type="password" name="Password" id="" value="<?php echo $userDetails['Password'] ?>"></td>
            </tr>
              
                <td   style="text-align: center;padding:8px" colspan="2"><input type="submit" name="submit" id="" VALUE="UPDATE">
            </td>
            </tr>
        </table>
    </form>

    
    </section> 

    </section> 
</body>
</html>