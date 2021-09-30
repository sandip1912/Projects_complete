<?php
session_start();
include_once '../dashboard/config.php';
if (isset($_POST['submit'])){
    $count = date('y-m-d');
    $count = $_POST['count']; 
   $submit=$_POST['submit'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- LINKS -->
     <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     <script src="https:cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="../css/style_admin_users3.css">
    <title>Document</title>
</head>
<body>
    <!-------------------- heading -------------------->
     <section id="heading">
    <img src="../home/sarathi_logo12.png" alt="">
    <button id="logout"><h2><a href="logout.php">LOG OUT</a></h2></button>
    </section>
    <!-------------------- menu -------------------->
   
    <section id="menu">

    <!-------------------- options-output -------------------->
    <section id="options">
        <ul>
            <li><a href="../home.php">HOME</a></li>
        </ul>
    </section>
    <section id="output">
<!-------------------- output -------------------->
    <?php 
    if(isset($submit)){

        $queryCheck = "SELECT * FROM `users` WHERE DATE(created_at) = '$count'";
        $resultCheck = mysqli_query($conn,$queryCheck);        
        while ($response[] = mysqli_fetch_assoc($resultCheck)) {}
        $finalData = array_filter($response); 
    //     echo "<pre>";
    //     print_r($finalData);
    //     echo $count;
    //     echo $finalData['0']['created_at'];
    }

    if(!$_SESSION['is_login']){
        header("Location:logout.php");
    }else{
      $query1 = "SELECT * FROM admins WHERE  Sr_no =".$_SESSION['admin_id'];
      $result1 = mysqli_query($conn, $query1);
      $adminDetails = mysqli_fetch_assoc($result1);
    }
      
    ?>

  <div class="profile">
    <ul>
        <li><img src="../uploads/<?php echo $adminDetails['Profile_pic'] ?>"><?php echo "<span>".$adminDetails['UserName']."</span>" ?></li>
       <li><a href="adminregister.php"><span> +  ADD ADMIN</span></a></li>
    </ul>
    </div>
    <form method="post">
        <table style="border: none;width:30vw;">
            <tr>
                <td style="padding:0;border: none;"><input style="width: 15vw;margin-left:0vw;height:10vh" type="date" name="count" id="" placeholder="Initial value">
            </td>
                <td style="padding:0;border: none;"><input style="margin-bottom:8px;;margin-top:1vh;width: 8vw;height:10vh" type="submit" name="submit" value="SHOW"></td>
            </tr>
        </table>
    </form>   

    <?php
    if(isset($submit)){
        if($count == ''){
            echo  "<h3 style=color:red;margin-left:24vw >".'Enter Valid Date please'." </h3>";
          }  
        else{
            if(($resultCheck ->num_rows)>0){

                ?> <table>
                <tr><th style="text-align: center;" colspan="6">REGISTERED USERS</th></tr>
                <tr>
                    <td style="font-weight:800;">sr</td>
                    <td style="font-weight:800;">U.id</td>
                    <td style="font-weight:800;">FULL NAME</td>
                    <td style="font-weight:800;">USER ID</td>
                    <td style="font-weight:800;">PROFILE PHOTO</td>
                    <td style="font-weight:800;">ACTION</td>
                </tr>
                <?php
          for($i=0;$i<count($finalData);$i++){
              ?>
              <tr> <td><?php echo ($i+1)?></td>
                    <td><?php echo $finalData [$i]['sr_no']  ?></td>
                    <td><?php echo $finalData [$i]['full_name']  ?></td>
                    <td><?php echo $finalData [$i]['username']  ?></td>
                    <td style="width: 10vw;"><img src="../uploads/<?php echo $finalData [$i]['profile_pic']?>" width="80">
                    </td>
                    <td>
                    <form action="" method="post">
                    <button id="bt1" ><a style="color: white;" href="adminuserupdate.php?uid=<?php echo $finalData [$i]['sr_no']; ?>">Edit</a></button>
        
                <input type="hidden" name="user_id" value="<?php echo $finalData [$i]['sr_no']; ?>">
                <button id="bt1" style="width:80px"><a style="color: white;" href="adminlicensenumber.php?uid=<?php echo $finalData [$i]['sr_no']; ?>">GENERATE</a></button>
              <?php
                        if($finalData[$i]['is_status'] == 1){
                        ?>
                         <input style="background-color: green;" id="bt1" type="text" name="status" value="Approved"></input>
                        <?php
                            }    
                        else{
                       ?>
                      <input style="background-color: red;" id="bt1" type="text" name="status" value="Pending"></input>
                       <?php
                    }

                    if($finalData[$i]['is_reject'] == 1){
                        ?> 
                        <input type="button" style="border:none;border-radius:5px;background-color: black;color:white;width:80px;height:30px" value="REJECTED">
                        <?php
                    }
                    ?>
                  
                   </form>
                 </td>
              </tr>
             
              <?php
                  }

                  ?>
                   <tr>
                  <td style="color: red;" colspan="6">Total Number Of Applicants Data Available :- <?php echo "<span style= color:blue>".count($finalData)."</span>" ?></td>
              </tr>
              </table>
                <?php
            }
            else{
                ?><table>
                    <tr>
                        <td><h3 style="color:red">NO RECORD FOUND</h3></td>
                    </tr>
                </table><?php
            }              
          } //....
          
        }
        
        ?>
  
<!-------------------- output -------------------->
    </section> 

    </section> 
</body>
</html>