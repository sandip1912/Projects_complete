<?php
session_start();
include_once '../dashboard/config.php';


if (isset($_GET['uid'])) {
    $userId = $_GET['uid'];

}

// -----------------------------


    if(isset($_POST['submit'])){  
       
        $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffle =  str_shuffle($string);
        $string_generate = substr($shuffle,0,3);
        $num_str = rand(10000,99999);
        $license_no = "Y$string_generate$num_str";

          $queryU = "UPDATE `users` SET `license_number`='$license_no' WHERE sr_no =".$userId;
            $result = mysqli_query($conn, $queryU);
    
            if ($result) {
                // move_uploaded_file($pic1['tmp_name'], "../uploads/". $new2);
                $message = "<h5 style='text-align: center; color: green;margin:0px''>Generated</h5>";
     
            } else {
                $message = "<h5 style='text-align: center; color: red;margin:0px''>Something Went Error</h5>";
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
   <link rel="stylesheet" href="../css/style_admin_license.css">
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
    $arrayeducation = explode(",", $userDetails['education']);
     // echo "<pre>";
        // print_r($userDetails);
        // echo $userDetails['license_number'];
}
   
        
       

        if($userDetails['license_number']== "" ) {

            ?>

            <form method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th colspan="2">GENERATE NUMBER
                            <?php if(isset($message)){
                                echo $message;
                            }?>
                        </th>
                    </tr>
                    <!-- table comment -->
                   <tr>
                        <td>FULL NAME :</td>
                        <td><span><?php echo $userDetails['full_name'] ?></span>
                    </tr>
                     <tr>
                        <td>USERNAME :</td>
                        <td><span><?php echo $userDetails['username'] ?></span>
                    </tr> 
                      <tr>
                        <td>EMAIL :</td>
                        <td><span><?php echo $userDetails['email'] ?></span>
                    </tr>
                    <tr>
                        <td>MOBILE NO.</td>
                        <td><span><?php echo $userDetails['mobile'] ?></span>
                    </tr> 
                    <tr>
                        <td>PROFILE PIC:</td>
                        <td><img src="../uploads/<?php echo $userDetails['profile_pic'] ?>" alt="" srcset="">
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
                     <button style="background-color: yellow;" id="bt1" type="submit" name="status" value="<?php echo $userDetails['is_status']; ?>">Pending</button>
                       <?php
                    }
                    ?>
                        
                        </form> 
                      
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
                      
                        <td   style="text-align: center;padding:8px" colspan="2"><input type="submit" name="submit" id="" VALUE="GENERATE">
                    </td>
                    </tr>
                </table>
            </form>
            <?php
        }else{
            ?>
           <table>
                <tr>
                    <td style="text-align:center;color :red;font-weight:800;" >YOU HAVE GENERATED LICENSE NUMBER.<br><span style="color: green;"> YOUR NUMBER IS :- <?php echo $userDetails['license_number']; ?></span>
                    </td>
                </tr>
            </table>
           <?php
        } 
        ?>
       

<!-------------------- output -------------------->
    </section> 

    </section> 
</body>
</html>