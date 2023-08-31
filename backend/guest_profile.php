<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Start Meta -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="The Sharp - Luxury Hotel Booking"/>
	<meta name="author" content="aman">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Title of Site -->
	<title>The Sharp - Luxury Hotel Booking </title>
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="assets/img/logo0.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="assets/css/all.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<!-- Swiper Bundle CSS -->
	<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- Mean Menu CSS -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/sass/style.css"> 
	<style>body {
		margin: 0;
		padding: 0;
		font-family: Arial, sans-serif;
		background-color: #f0f0f0;
	}
	
	.profile {
		max-height: 200px;
		max-width: 500px;
		
		background-color:black;
		
		border-radius: 5px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	}
	
	.profile-header {
		text-align: center;
		margin-bottom: 10px;
	}
	
	.profile-options {
		display: flex;
		justify-content: center;
		gap: 20px;
		margin-bottom: 100px;
		
	}
	
	.btn {
		display: inline-block;
		padding: 10px 20px;
		background-color:black;
		color:white;
		text-decoration: none;
		border-radius: 5px;
		transition: background-color:0.3s;
	}
	
	.btn:hover {
		background-color: #FFDB58;
	}
	
	.profile-footer {
		text-align: center;
		margin-top: 20px;
	}
	/* ... (existing code) ... */
.profile-header {
    text-align: center;
    margin-bottom: 20px;
    position: relative;
}
.user Ic

.user-photo img {
    width: 100%;
    height: auto;
    display: block;
}
.circle-icon {
	
    width: 200px;
    height: 200px;
    border-radius: 50%;
	padding: 0px;
	margin: 0px;
	
}
.icon-button-container {
    margin-bottom: 10 px; 
}



	</style>
</head>


	<!-- Header Area Start -->
	<div class="header__sticky">
        <div class="header__area">
          <div class="container custom__container">
            <div class="header__area-menubar">
              <div class="header__area-menubar-left">
                <div class="header__area-menubar-left-logo">
                  <a href="index.html"><img src="assets/img/logo0.png" alt=""></a>
                  <div class="responsive-menu"></div>
                </div>
              </div>
              <div class="header__area-menubar-right">
				
			  </div>
			  <div class="header__area-menubar-right-box">
				<div class="header__area-menubar-right-box-btn">
                    <a class="theme-btn" href="guest_index.php">Go Back<i class="fal fa-long-arrow-right"></i></a>
				  <a class="theme-btn" href="index.html">Logout<i class="fal fa-long-arrow-right"></i></a>
                  
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  
        <!-- Header Area End-->
<?php
session_start(); // Start the session

if (isset($_SESSION["user_email"])) { // Check if user_email is set in session
    $user_email = $_SESSION["user_email"];

    
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database_name = "hoteldatabase";

    $conn = new mysqli($server_name, $username, $password, $database_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch guest's full name from the database
    $sql = "SELECT guest_fname, guest_lname FROM guest WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $user_fullname = $row["guest_fname"] . " " . $row["guest_lname"];

        echo "<div class='page__banner' data-background='assets/img/index/dashboard1.jpg'>
            <div class='container'>
                <div class='row'>
                    <div class='col-xl-12'>
                        <div class='page__banner-title'>
                            <h1></h1>
                            <div class='page__banner-title-menu'>
                                <p style='color: #fddb53; font-size: 60px'>Welcome $user_fullname</p>
                                <p style='color: white; font-size: 15px'>$user_email</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";

        
    } else {
        echo "Error fetching user data.";
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect to login page if user_email is not set
    header("Location: login.php");
    exit;
}
?>

  
        
<div class="d-flex justify-content-center align-items-center vh-50">
		<div class="shadow p-2 text-center rounded-circle">
			<img src="https://www.svgrepo.com/show/350417/user-circle.svg" class="img-fluid circle-icon" alt="User Icon">
		</div>
	</div>
	
	<div class="profile-options mt-3">
		<div class="icon-button-container d-flex flex-column align-items-center">
			<a href="edit_profile.php" class="btn mb-2">Edit Personal Information</a>
		</div>
		<div class="icon-button-container d-flex flex-column align-items-center">
			<a href="guest_bookings.php" class="btn mb-2">View Previous Bookings</a>
		</div>
		
	</div>
	
	
		
     
	
	  <!-- Footer Area Start -->	
	<div class="footer__area">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 sm-mb-30">
					<div class="footer__area-widget">
						<div class="footer__area-widget-about">
							<div class="footer__area-widget-about-logo">
								<a href="index.html"><img src="assets/img/logo0.png" alt=""></a>
							</div>
							<p>THE SHARP</p>
							<div class="footer__area-widget-about-social">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-twitter"></i></a>
									</li>
				
									<li><a href="#"><i class="fab fa-youtube"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 lg-mb-30">
					<div class="footer__area-widget">
						<h5>Information</h5>
						<div class="footer__area-widget-contact">
							<div class="footer__area-widget-contact-item">
								<div class="footer__area-widget-contact-item-icon">
									<i class="fal fa-map-marked-alt"></i>
								</div>
								<div class="footer__area-widget-contact-item-content">									
									<span><a href="#">V2S 6T7 Surrey BC</a></span>
								</div>
							</div>
							<div class="footer__area-widget-contact-item">
								<div class="footer__area-widget-contact-item-icon">
									<i class="fal fa-envelope-open-text"></i>
								</div>
								<div class="footer__area-widget-contact-item-content">									
									<span><a href="mailto:help.info@gamil.com">help.thesharp@gmail.com</a></span>
								</div>
							</div>
							<div class="footer__area-widget-contact-item">
								<div class="footer__area-widget-contact-item-icon">
									<i class="fal fa-phone-alt"></i>
								</div>
								<div class="footer__area-widget-contact-item-content">									
									<span><a href="tel:+1 (604) 604 0000">+1 (604) 604 0000</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-5 col-sm-4 sm-mb-30">
					<div class="footer__area-widget">
						<h5>Useful Links</h5>
						<div class="footer__area-widget-menu">
							<ul>
								<li><a href="services-details.html"><i class="fal fa-angle-double-right"></i>Housekeeping</a></li>
								<li><a href="services-details.html"><i class="fal fa-angle-double-right"></i>Car Parkade</a></li>
								<li><a href="services-details.html"><i class="fal fa-angle-double-right"></i>Swimming pool</a></li>
								<li><a href="services-details.html"><i class="fal fa-angle-double-right"></i>Fitness Gym</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-7 col-sm-8">
					<div class="footer__area-widget">
						<h5>Subscribe to exciting news and updates!</h5>
						<div class="footer__area-widget-subscribe">
							<form action="#">
								<input type="text" name="email" placeholder="Email Address" required="">
								<button type="submit"><i class="fal fa-hand-pointer"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright__area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-6 col-lg-6 col-md-7 md-mb-10">
						<div class="copyright__area-left md-t-center">
							<p>Copyright © 2023 <a href="#">TheSharp</a> Website by <a href="#">Group F</a></p>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-5">
						<div class="copyright__area-right t-right md-t-center">
							<ul>
								<li><a href="#">FAQ</a></li>
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Area End -->	
	<!-- Scroll Btn Start -->
	<div class="scroll-up">
		<svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" /> </svg>
	</div>
	<!-- Scroll Btn End -->
	<!-- Main JS -->
	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Counter Up JS -->
	<script src="assets/js/jquery.counterup.min.js"></script>
	<!-- Popper JS -->
	<script src="assets/js/popper.min.js"></script>
	<!-- Magnific Popup JS -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Nice Select JS -->
	<script src="assets/js/jquery.nice-select.min.js"></script>
	<!-- Swiper Bundle JS -->
	<script src="assets/js/swiper-bundle.min.js"></script>
	<!-- Waypoints JS -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Mean Menu JS -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- Isotope JS -->
	<script src="assets/js/isotope.pkgd.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/custom.js"></script>
</body>

</html>