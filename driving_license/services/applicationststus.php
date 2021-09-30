
<?php
session_start();
include_once '../dashboard/config.php';
if (isset($_POST['submit'])) {
    $submit = $_POST['submit'];
 //    $status =  $_POST['status'];
    $dob =  $_POST['Date'];
    $number =  $_POST['number'];
    
 
   
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- LINKS -->
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../css/style_applicationststus.css">
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
            <li><a href="../services/printlicense.php">PRINT LICENSE</a></li>
        </ul>
    </section>
    <section id="output" >
        
<!-------------------- output -------------------->

<form action="" method="post">
        <table>
            <tr><td style="text-align: center;" colspan="2"><h5>ENTER USER DETAILS :</h5> </td></tr>
            <!-- <tr><td colspan="2" style="text-align: center;">
                <input style="margin:0 0 0 2vw;" type="radio" name="status" value="mobile">MOBILE 
                <input style="margin:0 0 0 2vw;" type="radio" name="status" value="uid">UID</td>                
              <tr> -->
                  <td><input type="text" name="number"  placeholder="Enter Mobile/UID Number"></td>
                   <td >
                     <input type="date" name="Date">DOB
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2">
                <input type="submit" name="submit" value="SEARCH">
                </td>
           </tr>            
          
        </table>
    </form>
<?php
    if(isset($submit)){


        $queryu = "SELECT * FROM users WHERE mobile = '$number' AND dob = '$dob' OR sr_no = '$number' AND dob = '$dob'" ;
        $result1 = mysqli_query($conn, $queryu);
        $userDetails = mysqli_fetch_assoc($result1);
        $arrayeducation = explode(",", $userDetails['education']);

    
        if(isset($result1)){
            if ( $result1 ->num_rows>0 ){
        
                ?>
            <table id="dataknow">
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
                        <td><img style="width: 60px;
                       height: 70px;" src="../uploads/<?php echo $userDetails['profile_pic'] ?>" alt="" srcset="">
                    </td>
                    </tr>
                    <tr>
                        <td>education :</td>
                        <td style="text-align: left;">
                         
                        
                        <input type="checkbox" name="education1[]" value="football"  <?php if (in_array("football", $arrayeducation)) {
                               echo "checked";
                            } ?>>FOOTBALL
                            <input  style="margin-left: 45px;" type="checkbox" name="education1[]" value="basketball"  <?php if (in_array("basketball", $arrayeducation)) {
                               echo "checked";
                            } ?>>BASKETBALL <br>
                            <input type="checkbox" name="education1[]" value="cricket"  <?php if (in_array("cricket", $arrayeducation)) {
                               echo "checked";
                            } ?>>CRICKET
                            <input style="margin-left: 60px;" type="checkbox" name="education1[]" value="walleyball"  <?php if (in_array("walleyball", $arrayeducation)) {
                               echo "checked";
                            } ?>>WALLEYBALL
                       
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><h5>CURRENT STATUS IS <?php 
                        if($userDetails['is_status'] == 1){
                            ?>
                             <input style="background-color: green;border:none;color:white" id="bt1" type="text" name="status" value="APPROVED YOU CAN DOWNLOAD DRIVING LICENSE"></input>
                            <?php
                                }    
                            else{
                           ?>
                         <input style="background-color: yellow;border:none;color:white" id="bt1" type="text" name="status" value="PENDING FROM OFFICER"></input>
                           <?php
                        }
                        ?>      
                    </h5></td>
                        
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type='button' id='btn' value='Print'>
                        </td>
                    </tr>
            </table>
                <?php
            }else{
                ?><table>
                    <tr>
                        <td style="padding:  8px;text-align:center;"><h5 style="color:red"><?php echo "NO RECORD FOUND"; ?></h5></td>
                    </tr>
                </table><?php
            }
        }
    
}
?>
 
</section> 

</section> 

<!-------------------- output -------------------->
<script>
    
    function printData()
{
   var divToPrint=document.getElementById("dataknow");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('#btn').click ( function(){
printData();
});
    </script>
</body>
</html>