<?php
session_start();
include_once '../dashboard/config.php';
if (isset($_GET['uid'])) {
    $userId = $_GET['uid'];
}
if(isset($_POST['submit'])){
    $rejmessage = $_POST['rmessage'];
    if($rejmessage != ''){

        $query ="UPDATE `users` SET `rej_message`= '$rejmessage',`is_reject`= 1  WHERE sr_no=".$userId;
        $result = mysqli_query($conn,$query);
        if($result){
           $message ="" ;
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
   <link rel="stylesheet" href="../css/style_reject.css">
    <title>Document</title>
</head>
<body>
    <!-------------------- heading -------------------->
     <section id="heading">
    <img src="../home/sarathi_logo12.png" alt="">
    <button id="logout"><a href="adminuser.php">BACK</a></button>
    </section>
    <!-------------------- menu -------------------->
    <?php
      if(!$_SESSION['is_login']){
        header("Location:logout.php");
    }else{
  $query = "SELECT * FROM users WHERE sr_no=".$userId;
  $result = mysqli_query($conn,$query);
  $userDetails = mysqli_fetch_assoc($result);
  $arraydocuments = explode(",", $userDetails['documents']);
    }
    ?>

<h1 style="width:95%;text-align:center;color:red">
   <?php if(isset($message)){
       echo $message = "REJECTED SUCCESSFULLY";
    }else{
        echo $message = "Reject";
    }
   ?></h1>

    <section id="menu">
    <section id="tr">
        <img src="../home/warning.jpg" alt="!" srcset="">
    </section>
    <section id="output">
        <form action="" method="post">
            <h1 style="color:#0586cc"><?php echo $userDetails['full_name'] ?></h1>            
            <textarea name="rmessage" style="width:100%;height:40%" cols="20" rows="10"></textarea>
            <input type="submit" name="submit" id="">
        </form>
    </section>
</section>  
   <!-------------------- output -------------------->
   
  

</body>
</html>