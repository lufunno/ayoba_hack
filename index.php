<?php

require_once 'database.php';

if(isset($_POST['close'])){
    session_destroy();
}

if(isset($_POST['insubmit'])){
    $username = $_SESSION['usernamer'];
	date_default_timezone_set('Africa/Johannesburg');
	$I_Name=$_POST['I_Name'];
	$category=$_POST['I_category'];
	$loc=$_POST['Location'];
	$date = date('d/m/Y');
	$time = date('h:i:s a');
	$summary = $_POST['Summary'];
	// var_dump($username, $I_Name, $category, $loc, $date, $time, $summary);
	$insertsql = $dbconnect->prepare("INSERT INTO incidentReport (ReporterName, I_Name, I_Category, Location, Dated, Timer, Summary) VALUES (?,?,?,?,?,?,?)");
    $insertsql->bind_param("sssssss", $username, $I_Name, $category, $loc, $date, $time, $summary);
    $insertsql->execute();
    $message = "Your Report was uploaded but you can retrive it. We are still in production";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('id:report');
}

if(isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($dbconnect,$_POST['uname']);
	$phone = mysqli_real_escape_string($dbconnect,$_POST['phone']);
        $adsql = $dbconnect->prepare("SELECT phone FROM User WHERE phone=?");
        $_SESSION['usernamer'] = $username;
	if($adsql->num_rows==1){
        $message = "Your Report was uploaded but you can retrive it. We are still in production";
        echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else {
		$insertsql = $dbconnect->prepare("INSERT INTO User (username, phone) VALUES (?,?)");
        $insertsql->bind_param("ss", $username, $phone);
        $insertsql->execute();
        $_SESSION['usernamer'] = $username;
        header('id:report');

	}
}
?>

<!doctype html>
<html lang="en">
<head>

<!-- Simple Page Needs
================================================== -->
<title>Alert Incident</title>
<meta charset="UTF-8">
<meta name="description" content="Allert Incident">
<meta name="keywords" content="personal, vcard, portfolio">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- Favicon
================================================== -->  
<link href="images/We-Tried.png" rel="shortcut icon" type="image/x-icon" />

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/reset.css"/>
<link rel="stylesheet" href="cubeportfolio/css/cubeportfolio.min.css"/>
<link rel="stylesheet" href="css/owl.theme.css"/> 
<link rel="stylesheet" href="css/owl.carousel.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/colors/yellow.css" id="color"/>

    
<!-- Google Web fonts
================================================== --> 
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">

<!-- Font Icons
================================================== --> 
<link rel="stylesheet" href="icon-fonts/font-awesome-4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="icon-fonts/web-design/flaticon.css" />

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="microapp.js"></script>

</head>

<script src="lib/microapp.js"></script>
<script>

    function finish() {
        Ayoba.finish();
    }

    function sendMessage() {
        Ayoba.sendMessage(document.getElementById("inputText").value);
        Ayoba.finish();
    }

    function composeMessage() {
        Ayoba.composeMessage(document.getElementById("inputText").value);
        Ayoba.finish();
    }

    function sendLocation() {
        Ayoba.sendLocation(document.getElementById("inputTextLat").value, document.getElementById("inputTextLon").value);
    }

    function getCountry() {
        var country = Ayoba.getCountry();
        document.getElementById("inputText").value = country
        return country
    }

    function getMsisdn() {
        var msisdn = Ayoba.getMsisdn();
        document.getElementById("inputText").value = msisdn
        return msisdn
    }

    function getCanSendMessage() {
        var canSendMessage = Ayoba.getCanSendMessage();
        document.getElementById("inputText").value = canSendMessage
        return canSendMessage
    }

    function getLanguage() {
        var language = Ayoba.getLanguage();
        document.getElementById("inputText").value = language
        return language
    }
    
    function getURLParameter(sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) {
                return sParameterName[1];
            }
        }
    }


    function onLocationChanged(lat, lon) {
        document.getElementById("locationInputText").value = lat.concat(", ").concat(lon)
    }

   
    function onProfileChanged(nickname, avatarPath) {
        document.getElementById("uname").value = nickname
        document.getElementById("avatarImage").src = avatarPath
    }

    
    function onPresenceChanged(presence) {
        document.getElementById("presenceInputText").value = presence
    }

    
    function onLocationSentResponse(responseCode) {
        document.getElementById("inputText").value = responseCode
    }
</script>

<body onload="getAyoba()">
 <!-- Preloading -->
<div id="preloader">
    <div class="spinner">
    </div>
</div>  
    
<!-- Wrapper --> 
<div class="wrapper top_60 container">
<div class="row">
        
<!-- Profile Section
================================================== --> 
<?php
    @$_SESSION['usernamer']; 
    error_reporting(1);

    if(isset($_SESSION['usernamer'])){
	 echo '<div class="col-lg-3 col-md-4">
     <div class="profile">
         <div class="profile-name">
             <span class="name">'.$_SESSION['usernamer'].'</span><br>
             <span class="job">User or Responder</span>
         </div>
         <figure class="profile-image">
             <img src="images/We-Tried.png" alt="">
         </figure> 
         <ul class="profile-information">
             <li></li>
             <li><p><span>Name : </span>'.$_SESSION['usernamer'].'</p></li>
         </ul>
         <div class="col-md-12">
         <form class="site-form" action="" method="POST">
            <button class="site-btn icon" name="close" type="submit" onClick="finish">Close Application<i class="fa fa-sign-out" aria-hidden="true"></i></button>
        </form>
         </div>
     </div>
 </div>
 ';
	}
	 else
		{
	 	echo "&nbsp;";
	 }
?>

<!-- Page Tab Container Div -->   
<div id="ajax-tab-container" class="col-lg-9 col-md-8 tab-container">
    
<!-- Header
================================================== --> 
<div class="row">
    <header class="col-md-12">
        <nav>
            <div class="row">
                <!-- navigation bar -->
                <div class="col-md-8 col-sm-8 col-xs-4">
                    <ul class="tabs">
                        <li class="tab">
                            <a class="home-btn" href="#home"><i class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                        <?php
                        if(isset($_SESSION['usernamer']))
                        {
                         echo '<li class="tab"><a href="#report">REPORT</a></li>
                        <li class="tab"><a href="#incident">INCIDENT REPORTS</a></li>
                        <li class="tab"><a href="#contact">CONTACT</a></li>';
                        }
                         else
                         {
                             echo "Confirm your details below to Continue";
                         }
                        ?>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-8 dynamic">
                <div class="hamburger pull-right hidden-lg hidden-md"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <?php
                    if (isset($_SESSION['usernamer'])){
                        echo '<button class="pull-right site-btn icon hidden-xs">Hello '.$_SESSION['usernamer'].'<i class="fa fa-paper-plane" aria-hidden="true"></i></button>';
                    }
                    else{
                        echo "&nbsp;";
                    }
                    ?>
                    <div class="hidden-md social-icons pull-right"> 
                        <a class="nh" href="https://github.com/lufunno/ayoba_hack"><i class="fa fa-github" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
        
    <!-- Page Content
    ================================================== --> 
    <div class="col-md-12">
        <div id="content" class="panel-container">
          
            <!-- Home Page
            ================================================== -->  
            <div id="home">
                <!-- Text Section -->
                <div class="row">
                    <section class="about-me line col-md-12 padding_30 padbot_45">
                    <div class="section-title"><span></span><h2>About the APP</h2></div>
                    <p class="top_30">In most cases, during disasters or emergencies be it a fire, a robbery, a mother in labor, blood deficiency, floods, etc, 
                        it's a matter of life or death and the people affected count on others for their own survival and getting assistance to them is always a race against time. We believe that even 
                        with the preparedness of other other people that when a crisis hits, response time is dependent on how fast and to whom the news reach and that's why we created the Community <strong>Alert</strong> Response Team.<br>
                    </p>
                    <p class="top_30"><strong>Alert</strong> is a community-based network of people who volunteer to respond to any emergencies around them within the shortest time possible based on their proximity and easily accessible resources such as <strong>medical 
                        expertise, food, clean water, shelter, blood, medicine, fire extinguishers, vehicles, etc.<strong></p>
                </section>
                </div>
                <div class="row">
                    <!--  -->
                    <?php
                       if(isset($_SESSION['usernamer']) == ""){
                            echo '
                            <section class="contact-form col-md-6 padding_30 padbot_45">
                                <div class="section-title top_15 bottom_30"><span></span><h2>Please Confirm Your Details</h2></div>
                                <form class="site-form" action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <i class="fa fa-phone" aria-hidden="true"></i><input class="site-input" type="text" id="phone" name="phone" placeholder="Pleace confirm your phone number" maxlength="10" required="">
                                        </div>
                                        <div class="col-md-6">
                                        <i class="fa fa-user" aria-hidden="true"></i><input class="site-input" type="text" id="uname" name="uname" placeholder="Your User name" required="">
                                        </div>
                                        <div class="col-md-12 top_15 bottom_30">
                                            <button class="site-btn" name="submit" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>  
                            </section>';
                       }?>
                    <!-- -->
                    <section class="contact-info col-md-6 padding_30 padbot_45">
                        <div class="section-title top_15 bottom_30"><span></span><h2>Contact Informations</h2></div>
                        <ul>
                            <li><span>Address:</span> Virtual Hackathon #Ayoba</li>
                            <li><span>Phone:</span> 067 006 2938</li>
                            <li><span>E-mail:</span> samuel.mcebo@gmail.com</li>
                        </ul>
                    </section>
                </div>
            </div>
            
            <!-- Report Page
            ================================================== -->
            <?php
            if(isset($_SESSION['usernamer'])){
                // $rs1 = mysqli_query("SELECT * FROM incidentreport WHERE username = '{$_SESSION['usernamer']}' ORDER BY id DESC");
            echo'
            <div id="report">
                <!-- Report Section -->
                <div class="row">
                    <!-- Contact Form -->
                    <section class="contact-form col-md-6 padding_30 padbot_45">
                        <div class="section-title top_15 bottom_30"><span></span><h2>Report Incident</h2></div>
                        <form class="site-form" action="" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="site-input" type="text" name="I_Name" placeholder="Incident Name" required="">
                                </div>
                                <div class="col-md-9">
                                <select class="site-input" name="I_category" style="color:red">
                                    <option  value="Medical_Issues">Medical Issues</option>
                                    <option value="Hostel_Affairs">Hostel Affairs</option>
                                    <option value="Robbery">Robbery</option>
                                    <option value="Other">Other Emegency</option>
                                </select>
                                </div>
                                <div class="col-md-12">
                                    <input class="site-input" type="text" name="Location" placeholder="Location" required="" onClick="sendLocation()" >
                                </div>
                                <div class="col-md-12">
                                    <textarea class="site-area" type="text-area" name="Summary" placeholder="Summary" required=""></textarea>
                                </div>
                                <div class="col-md-12 top_15 bottom_30">
                                    <button class="site-btn" type="submit" name="insubmit"">Submit</button>
                                </div>
                            </div>
                        </form>  
                    </section>
                    <!-- Contact Informations -->
                    <section class="contact-info col-md-6 padding_30 padbot_45">
                        <div class="section-title top_15 bottom_30"><span></span><h2>In case of Backup</h2></div>
                        <ul>
                            <li><span>Phone:</span> 10111 / 911</li>
                            <li><span>Name:</span> Emegency call</li>
                        </ul>
                    </section>
                </div>
            </div>
            <!-- Incident Page
            ================================================== --> 
            <div id="incident" class="row bottom_45">
            <section class="col-md-12">
                <div class="col-md-12 content-header bottom_15">
                    <div class="section-title top_30 bottom_30"><span></span><h2>Incident Reports</h2></div>
                    <div id="filters-container">
                        <!--  means shows all item elements -->
                        <div data-filter="*" class="cbp-filter-item cbp-filter-item-active">All</div>
                        <div data-filter=".Medical" class="cbp-filter-item">Medical issues</div>
                        <div data-filter=".Hostel" class="cbp-filter-item">Hostel Affairs</div>
                        <div data-filter=".Robbery" class="cbp-filter-item">Robbery</div>
                        <div data-filter=".Other" class="cbp-filter-item">Other</div>
                    </div>
                </div>
                <div id="grid-container" class="top_60">
                <table class="table table-striped text-center ">
                <thead class="thead-inverse">
                              <tr>
                              <th><center>Appointment No</center></th>
                              <th><center>Patients Full Name</center></th>
                              <th><center>Medical Condition</center></th>
                              <th><center>Doctor Needed</center></th>
              
                              </tr>
                              </thead>
              </table>
                </div>
                <!-- load more button -->
                <div id="js-loadMore-agency" class="cbp-l-loadMore-button top_30">
                    <a href="load-more/portfolio.html" class="cbp-l-loadMore-link site-btn" rel="nofollow">
                        <span class="cbp-l-loadMore-defaultText">Load More (<span class="cbp-l-loadMore-loadItems">3</span>)</span>
                        <span class="cbp-l-loadMore-loadingText">Loading...</span>
                        <span class="cbp-l-loadMore-noMoreLoading">No More Works</span>
                    </a>
                </div>
            </section>
            </div>
            <!-- Contact Page
            ================================================== --> 
            <div id="contact">
                <div class="row">
                    <!-- Contact Informations -->
                    <section class="contact-info col-md-12 padding_30 padbot_45">
                        <div class="section-title top_15 bottom_30"><span></span><h2>Contact Informations</h2></div>
                        <ul>
                            <li><span>Address:</span> We are Virtual So get in touch with us through this Net</li>
                            <li><span>Tel:</span> 911</li>
                            <li><span>Job:</span> We-Tried Alert </li>
                        </ul>
                </div>
            </div>';}?>
            
        </div><!-- Content - End -->
     </div> <!-- col-md-12 end -->
</div><!-- row end -->
<!-- Footer
================================================== --> 
<footer>
    <div class="footer col-md-12 top_30 bottom_30">
        <div class="name col-md-4 hidden-md hidden-sm hidden-xs">Community Alert Response Team</div>
        <div class="copyright col-lg-8 col-md-12">© 2020 All rights reserved. Designed by <a href="https://github.com/lufunno/ayoba_hack">We-Tried</a> </div>  
    </div>
</footer>
    
</div> <!-- Tab Container - End -->
</div> <!-- Row - End --> 
</div> <!-- Wrapper - End -->   

<!-- Javascripts
================================================== -->  
<script src="js/jquery-2.1.4.min.js"></script> 
<script src="cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.easytabs.min.js"></script>
<script src="js/owl.carousel.min.js"></script> 
<script src="js/main.js"></script>
<!-- for color alternatives -->
<script src="js/jquery.cookie-1.4.1.min.js"></script>
<script src="js/Demo.js"></script>
<link rel="stylesheet" href="css/Demo.min.css" />
 

</body>
</html>
