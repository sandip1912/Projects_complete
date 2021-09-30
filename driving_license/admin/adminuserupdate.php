<?php
session_start();
include_once '../dashboard/config.php';


if (isset($_GET['uid'])) {
    $userId = $_GET['uid'];

}
// -----------------------------
if (isset($_POST['status'])) {
    if (isset($userId)) {
        $status = $_POST['status'];
        
        if ($status==1) {
            $queryStatus = "UPDATE users SET is_status = 0 WHERE sr_no=".$userId;
        } else {
            $queryStatus = "UPDATE users SET is_status = 1 WHERE sr_no=".$userId;
        }
        mysqli_query($conn,$queryStatus);
    }
}


// -----------------------------


    if(isset($_POST['submit'])){  
            $uname = $_POST['uname'];
            $fullName  = $_POST['fullname'];    
            $Email = $_POST['mail'];
            $mobile = $_POST['mobile'];
            $Password = $_POST['Password'];
            
    if(isset($_FILES['pic1'])){
        $pic1 =$_FILES['pic1'];
       if($pic1['error'] == 4){
        $queryCheck1 = "SELECT `profile_pic` FROM users WHERE  sr_no = ".$userId;
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
    
    if (isset($_POST['delete'])) {
        $queryDelete = "UPDATE `users` SET `is_reject`=1 WHERE sr_no=".$userId;
        mysqli_query($conn,$queryDelete);
    }

          $queryU = "UPDATE `users` SET `full_name`='$fullName',`username`='$uname',`email`='$Email',`profile_pic`='$new2',`mobile`='$mobile',`Password`='$Password' WHERE sr_no =".$userId;
            $result = mysqli_query($conn, $queryU);
    
            if ($result) {
                move_uploaded_file($pic1['tmp_name'], "../uploads/". $new2);
                // move_uploaded_file($documents['tmp_name'], "../uploads/". $doc2);
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
   <link rel="stylesheet" href="../css/style_admin_user_update2.css">
    <title>Document</title>
</head>
<body>
    <!-------------------- heading -------------------->
     <section id="heading">
    <img src="../home/sarathi_logo12.png" alt="">
    <button id="logout"><a href="logout.php">LOG OUT</a></button>
    </section>
    <!-------------------- menu -------------------->
   
    <section id="menu">
    <!-------------------- options-output -------------------->
    <section id="options">
        <ul>
            <li><a href="adminuser.php">BACk</a></li>
            <li><a href="../home.php">HOME</a></li>
        </ul>
    </section>
    <section id="output">
<!-------------------- output -------------------->
<?php
      if(!$_SESSION['is_login']){
        header("Location:logout.php");
    }else{
        $query = "SELECT * FROM users WHERE sr_no=".$userId;
        $result = mysqli_query($conn,$query);
        $userDetails = mysqli_fetch_assoc($result);
        $arraydocuments = explode(",", $userDetails['documents']);
        // echo "<pre>";
        // print_r($userDetails);
    
    }
      
    ?>
       
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
                <td>
                    <img style="width:100px;margin-right:60px" src="../uploads/<?php echo $userDetails['profile_pic'] ?>" alt="" srcset="">
                    <input type="file" name="pic1" id="" value="<?php echo $userDetails['profile_pic'] ?>">
                
            </td>
            </tr>
            <tr>
                <td>EDUCATION :</td>
                <td style="text-align: left;">
                <input type="checkbox" name="documents1[]" value="8th"  <?php if (in_array("8th", $arraydocuments)) {
                       echo "checked";
                    } ?>>8th
                    <input  style="margin-left: 70px;" type="checkbox" name="documents1[]" value="10th"  <?php if (in_array("10th", $arraydocuments)) {
                       echo "checked";
                    } ?>>10th <br>
                    <input type="checkbox" name="documents1[]" value="12th"  <?php if (in_array("12th", $arraydocuments)) {
                       echo "12th";
                    } ?>>12th
                    <input style="margin-left: 60px;" type="checkbox" name="documents1[]" value="other"  <?php if (in_array("other", $arraydocuments)) {
                       echo "checked";
                    } ?>>Other
               
                </td>
            </tr>
            <tr>
                <td>DOCUMENTS :</td>
                <td><a href="../uploads/<?php echo $userDetails['documents'] ?>" download="<?php echo $userDetails['documents'] ?>">
                        <button style="width:100px;border-radius:5px" type="button">Download</button>
                    </a>
                
            </td>
            </tr>
            <tr>
                <td>STATUS</td>
                <td>
                <form action="" method="post">
                <?php
                if($userDetails['is_status'] == 1){
                ?>
                 <button style="background-color: green;" id="bt1" type="submit" name="status" value="<?php echo $userDetails['is_status']; ?>">Approved</button>
                <?php
                    }    
                else{
               ?>
             <button style="background-color: yellow;color:#0586cc;font-weight:600" id="bt1" type="submit" name="status" value="<?php echo $userDetails['is_status']; ?>">Pending</button>
               <?php
                }
                ?>                
                
                </form>
                
            </td>
            </tr> 
          <tr>
              <td>REJECT  :</td>
              <td> <?php
                    if($userDetails['is_reject'] == 1){
                       ?> <a href="adminuserupdate.php?uid=<?php echo $userDetails['sr_no']; ?>"><button style="background-color: black;color:white" type="button" id="bt1" name="delete">REJECTED</button></a><?php
                    }else{
                        ?><a href="reject_user.php?uid=<?php echo $userDetails['sr_no']; ?>"><button style="background-color: red;" type="button" id="bt1" name="delete">REJECT</button></a><?php
                    }
              ?>   
               </td>
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

<!-------------------- output -------------------->
    </section> 

    </section> 
</body>
</html>