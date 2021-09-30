<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINKS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style_home2.css">
    <title>Document</title>
</head>
<body>
  <!-- HEADER -->
 <section id="heading">
    <img src="home/logo-parivahan-sewa-en.png" alt="">
    <div class="head">
    <h4>Government of India</h4>
    <h2>MINISTRY OF ROAD TRANSPORT & HIGHWAYS</h2>
  </div>
  </section>
    <!-- NAVBAR -->
 <section id="navbar">
    <ul>
      <li><a href="home.php"> HOME</a></li>
      <li><a href="dashboard/dashboard.php">LOGIN-REGISTRATION</a></li>
      <li><a href="#about_us">ABOUT US</a></li>
      <li><a href="#contact_us">CONTACT US</a></li>
     
    </ul>

  </section> 
   <!-- CAROUSEL -->
   <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="home/Azadi-Ka-Amrit-Mahotsav-3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="home/banner-echallan-4.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="home/banner-mparivahan-1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="home/banner-national-permit-2.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>

    <!-- LICENSE SERVICE -->
     <div id="licenseService">
      <h2>License Related Services</h2>
      <p>Various services related to new/old driving licence or learner's licence like Appointment Booking, Duplicate driving licence, Application Status, Online test for learner's licence, etc.</p>
    <section id="cards">
      <div class="Lservice">
        <img src="home/Lservice/v-driving-license.png" alt="" srcset="">
        <h3>License Status</h3>
        <p>know Your Status of Driving License In Just One Click</p>
        <button style="  transform: translate(5.5vw,6vh);"><a href="services/applicationststus.php">Click Here</a></button>
      </div>
      <div class="Lservice">
        <img src="home/Lservice/v-learners-license-services.png" alt="" srcset="">
        <h3>Drivers License </h3>
        <p>License registration on your fingertips</p>
        <button style="  transform: translate(5.5vw,10vh);" ><a href="user/userregistration.php">Click Here</a></button>
      </div>
      <div class="Lservice">
        <img src="home/Lservice/v-online-test-appointment.png" alt="" srcset="">
        <h3>Online Test/ Appointment</h3>
        <p>Book Online test appointments</p>
        <button style="  transform: translate(5.5vw,5vh);"><a href="user/userLogin.php">Click Here</a></button>
      </div>

    </section> 
  </div>
  
  <!-- about us -->
  <section id="about_us">
  <h3>ABOUT US</h3>
 <p> The Ministry of Road Transport & Highways (MoRTH) has been facilitating computerization of over 1300+ Road Transport Offices (RTOs) across the country. RTOs issue Driving License (D.L.) that are mandatory requirements and are valid across the country, subject to certain provisions and permissions.</p>

  <h4>  Our Mission </h4>
<p> To automate all Vehicle Registration and Driving License related activities in transport authorities of country with introduction of smart card technology to handle issues like inter state transport vehicle movement and to create state and national level registers of vehicles/DL information</p>

<h4> Our Objectives</h4>
<p> To provide :</p>
<li>Better services to Transport Department as well as citizen</li>
<li>Quick implementation of government policies from time to time</li>
<li>Improved image of Government & Department</li>
<li>Instant access of Vehicle/DL information to other government departments</li>

  </section>
  <!-- contact us -->
  
  <section id="contact_us">
    <h3>CONTACT US</h3>
     <table>
       <tr>
         <td>           
           For any Technical Problems related to:
         </td>
         <td>Email-id</td>
         <td>Contact Number</td>
         <td>Timings</td>
        </tr>
        <tr>
          <td>Vehicle registration, fitness, Tax, Permit, Fancy, Dealer etc</td>
          <td>helpdesk-vahan[at]gov[dot]in</td>
          <td>+91-120-2459168<br>+91-120-6995901</td>
          <td>6:00 AM - 10:00 PM</td>
        </tr>
        <tr>
          <td>Learner License, Driving Licence etc</td>
          <td>helpdesk-sarathi[at]gov[dot]in</td>
          <td>+91-120-2459169 <br>+91-120-6995902</td>
          <td>6:00 AM - 10:00 PM</td>
        </tr>
        <tr>
          <td>mParivahan Related</td>
          <td>helpdesk-mparivahan[at]gov[dot]in/td>
          <td>+91-120-2459171 <br> +91-120-6995903</td>
          <td>6:00 AM - 10:00 PM</td>
        </tr>
        <tr>
          <td>eChallan Related</td>
          <td>helpdesk-echallan[at]gov[dot]in</td>
          <td>+91-120-2459171 <br>+91-120-6995903</td>
          <td>6:00 AM - 10:00 PM</td>
        </tr>
     </table>
  </section>


    <!-- FOOTER -->
<section id="footer">
<h6>This Website belongs to Ministry of Road Transport & Highways (MoRTH)
  Government of India </h6>
</section>
</body>
</html>