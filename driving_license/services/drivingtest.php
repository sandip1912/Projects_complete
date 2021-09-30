
<?php
session_start();
include_once '../dashboard/config.php';

if(isset($_POST['save'])){
    $mail =  $_POST['mail'];
    
    $slot =  $_POST['slot'];
    $date1 = date("y-m-d");
   

    if(date_create($slot)  >  date_create($date1)){

        $diff = date_diff(date_create($date1),date_create(($slot)));
        // echo "<pre>";
        // print_r($diff);
        if(($diff->m)>1){
            $dateError = "Choose date less than 30 days";
        }else{
            $queryemail = "SELECT * FROM users WHERE email = '$mail'";
            $result1 = mysqli_query($conn, $queryemail);
           $user = mysqli_fetch_assoc($result1);
        //    echo "<pre>";
        //    print_r($user);
           $queryslot = "UPDATE `users` SET `driving_slot`='$slot',`driving_ststus`= '1' WHERE sr_no = ".$user['sr_no'];
           $result2 = mysqli_query($conn, $queryslot);
        }   
    }else{
        echo $error  ="Choose date After Current Date";
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
   <link rel="stylesheet" href="../css/style_drivingtest.css">
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
            <li><a href="../user/userdashboard.php">GO TO PROFILE</a></li>
            <li><a href="../services/computertest.php">COMPUTER TEST</a></li>
            <li><a href="../services/drivingtest.php">DRIVING TEST</a></li>
        </ul>
    </section>
    <section id="output">
<!-------------------- options-output -------------------->

<?php
  
        $queryCheck = "SELECT * FROM users WHERE  sr_no = ".$_SESSION['user_id'];
        $resultCheck = mysqli_query($conn, $queryCheck);
        $userDetails = mysqli_fetch_assoc($resultCheck);
    
 
    if (  $resultCheck->num_rows>0){

        if($userDetails['driving_ststus'] == 1){
           ?> <table>
                <tr>
                    <td style="text-align:center;color :red;font-weight:800;" >YOUR DRIVING BASED TEST IS SET ON GIVEN DATE PLEASE LOGIN AND CHECK</td>
                </tr>
            </table>
        <?php
           
        }else{

       
        
        ?>
        <form action="" method="POST">
    <table>
    <tr>
                <td>FULL NAME :</td>
                <td><input type="text" name="fullname" id="" value="<?php echo $userDetails['full_name'] ?>"></td>
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
                <td><img style="width: 60px;
               height: 70px;" src="../uploads/<?php echo $userDetails['profile_pic'] ?>" alt="" srcset="">
            </td>
            </tr>
          
            <tr>
                <td>DATE</td>
                <td><input type="date" name="slot" value="<?php echo $userDetails['driving_slot'] ?>">
                <input style="width: 30%;height:28px;" type="text" name="" value="<?php echo $userDetails['driving_slot'] ?>">
                <?php if(isset($error)){
                  echo "<span style='color:red;font-weight:600'>".$error."</span>";
                }?>

                <?php if(isset($dateError)){
                   echo "<span style='color:red;font-weight:600'>".$dateError."</span>";
                }?>
            </td>
                
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" name="save" value="SELECT" id=""></td>
            </tr>
    </table>
    </form>
        <?php
    }  }

?>
<!-------------------- options-output -------------------->
    </section> 

</section> 
</body>
</html>