
<?php
session_start();
include_once '../dashboard/config.php';
if (isset($_POST['submit'])) {
    $submit = $_POST['submit'];
    $dob =  $_POST['DateD'];
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
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&display=swap" rel="stylesheet"> 


     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../css/style_printlicense.css">
    <title>Document</title>
    <style>
        spam{
            font-size: 20px;
            font-weight: 600;
        }
        #dataprint table{
         background-image: url(../home/license2.jpg);
            background-position: center;
            background-size: cover;
            background-color: rgba(255, 255,255, 0.7);
            background-blend-mode: lighten;
            width: 45vw;
            margin: 5vh auto;
            border-collapse: collapse;
            border-radius: 20px;
            border :none;
        }
        #dataprint table td{
           border:none;
           padding: 0;
          color: rgb(2, 79, 109);
          font-size: 1rem;
    }
    #dataprint table td img{
        width: 100px;
        height: 100px;
    }
   span{
        font-size: 20px;
        font-weight: 600;
    }
    </style>
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
        </ul>
    </section>
    <section id="output" >
        
<!-------------------- output -------------------->

<form action="" method="post">
        <table>
            <tr><td style="text-align: center;" colspan="2"><h5>ENTER USER DETAILS :</h5> </td></tr>
                  <td><input type="text" name="number"  placeholder="Enter Mobile/UID Number"></td>
                   <td >
                     <input type="date" name="DateD">DOB
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


        $queryu = "SELECT * FROM users WHERE mobile = '$number' AND dob = '$dob'  AND is_status = '1' OR sr_no = '$number' AND dob = '$dob' AND is_status = '1' " ;
        $result1 = mysqli_query($conn, $queryu);
        $userDetails = mysqli_fetch_assoc($result1);
        $arrayeducation = explode(",", $userDetails['education']);
        // echo "<pre>";
        // print_r($userDetails);
        $newdate = date("d-m-Y", strtotime($userDetails['dob']));
     
        if(isset($result1)){
        if ($result1 ->num_rows>0 ){
        
                ?>
           <div id="dataprint" >
           <table>
           <tr>
            <td colspan="2" style="border-radius: 20px 20px 0 0;font-size:40px;text-align: center;height: 50px;font-weight:600;font-family: 'IBM Plex Mono', monospace;">DRIVING LICENSE</td></tr>
           <tr>
                <td rowspan="5" style="text-align: center;width:15vw">
                <img style="  width: 100px;height: 100px;" src="../uploads/<?php echo $userDetails['profile_pic'] ?>" alt="" srcset="">
                <td>FULL NAME : <span><?php echo $userDetails['full_name'] ?></span></td>

            </tr>
            <tr><td>GENDER : <span><?php echo $userDetails['gender'] ?></span></td></tr>

            <tr><td>DOB : <span><?php echo $newdate ?></span></td></tr>

            <tr><td><span><?php echo $userDetails['license_number'] ?></span></td></tr>
            <tr><td ><?php echo $userDetails['address'] ?></td></tr>
            <tr>
                <td colspan="2"   style="padding-bottom: 5px;text-align: center;border-radius: 0 0 20px 20px;background-color: rgb(3, 139, 192);color: white;">gujarat authority of road and transport</td>
            </tr>       
            </table>
            <!-------------------- script -------------------->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js">
        </script>
         <script>
            
            var element = document.getElementById('dataprint');
            html2pdf(element);
            html2pdf(element, {
                margin:       10,
                filename:     'license_download.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 1, logging: true, dpi: 192, letterRendering: true },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
                });
             </script>
               <!-------------------- script -------------------->
           
                <?php
            }
            else{
                ?><table>
                    <tr>
                        <td style="padding:  8px;text-align:center;"><h5 style="color:red"><?php echo "NO RECORD FOUND"; ?></h5></td>
                    </tr>  
                </table>
                </div>
                <?php
            }
        }
    
}
?>
 
</section> 

</section> 

<!-------------------- output -------------------->


</script>
</body>
</html>