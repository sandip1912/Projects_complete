<?php
    session_start();
    include_once '../dashboard/config.php';
   
    if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password =$_POST['password'];
//--------------------------------------------------------

    $queryu = "SELECT * FROM admins WHERE UserName  = '$username' ";
    $result1 = mysqli_query($conn, $queryu);

    $queryE = "SELECT * FROM admins WHERE Email  = '$username' ";
    $result2 = mysqli_query($conn, $queryE);

    if (  $result1->num_rows>0 || $result2->num_rows>0  ){
        $username;
    }else {
            $errorName =  "Wrong userid";
    }
//--------------------------------------------------------
    $queryCheck = "SELECT * FROM admins WHERE  password = '$password'";
    $resultCheck = mysqli_query($conn, $queryCheck);
	$userDetails = mysqli_fetch_assoc($resultCheck);
    // echo "<pre>";
    // print_r($resultCheck);
   
    if($resultCheck->num_rows>0) {
        $password;
    } 
    else {
        $errorPass =  "Wrong Password";
    }
//--------------------------------------------------------
    if(!isset($errorName) && !isset($errorPass) ){
        $_SESSION['admin_id'] = $userDetails['Sr_no'];
       
        $_SESSION['is_login'] = true;

        header("Location: adminuser.php");
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
   <link rel="stylesheet" href="../css/style_admin_login.css">
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
            <li><a href="../services/applicationststus.php">APPLICATION STATUS</a></li>
            <li><a href="../services/printlicense.php">PRINT LICENSE</a></li>
        </ul>
    </section>
    <section id="output">
<!-------------------- output -------------------->
<form method="POST">
        <table>
            <tr>
                <th colspan="2">LOG IN ADMIN</th>
            </tr>
            <tr>
                <td><span>*</span>username :</td>
                <td><input type="text" name="username" id="" placeholder="Enter Username or Email" required>
                <br> <?php
                    if(isset($errorName)){
                        echo "<span style=color:red>".$errorName."<?span>";
                    }
                    ?>
            </td>
            </tr>
            <tr>
                <td><span>*</span>password :</td>
                <td><input type="password" name="password" id="" placeholder="Enter Password" required>
                <br> <?php
                    if(isset($errorPass)){
                        echo "<span style=color:red>".$errorPass."<?span>";
                    }
                    ?>
            </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="submit" value="LOG IN" id="">
                <p>please fill mandatory fields with <span>*</span> sign.</p>
           
            </td>
            </tr>
           
        </table>
    </form>
<!-------------------- output -------------------->
    </section> 

    </section> 
</body>
</html>