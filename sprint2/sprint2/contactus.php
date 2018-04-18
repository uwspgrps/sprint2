<?php
require_once("templates/Template.php");
require_once("config/DB.class.php");
$page = new Template("Contact Us");
$page->setHeadSection("<link rel='stylesheet' href='css/prettylab.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js'></script>
    <script type='text/javascript'' src='js/site.js'></script>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();
print"<header>	
  <h1>Contact Us Sprint 2</h1>";
if(isset($_SESSION['isLoggedIn'])){
	if($_SESSION['isLoggedIn'] == true){
		print "<h2 align='right'>Welcome " . $_SESSION['realName'] . "</h2>";
	}
}

print "	
	<nav>";
if(isset($_SESSION['isLoggedIn'])){	
	if(($_SESSION['isLoggedIn'] == true) && ($_SESSION['role'] == 'administrator')){
			print "<a href=\"contactdata.php\">Contact Data</a>";
	}
}
print "		
	<a href=\"booksearch.php\">Search</a>
	<a href=\"contactus.php\">Contact</a>
	<a href=\"asgnabout.php\">About</a>
	<a href=\"index.php\">Home</a>";

if(isset($_SESSION['isLoggedIn'])){
	if($_SESSION['isLoggedIn'] == true){
		print "<a href=\"logoff.php\">Logout</a>";
	}else{
		print "<a href=\"login.php\"> Log In</a>";
	}
}else{
	print "<a href=\"login.php\"> Log In</a>";
}

print "
  </nav>
</header>";

$db = new DB();
if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

if(isset($_POST['submit'])){
	$link = $db->returnDB();
	$postArray = $db->dbEsc($_POST);	
	
	$firstName = isset($postArray['firstName']) ? $postArray['firstName'] : '';
	$lastName = isset($postArray['lastName']) ? $postArray['lastName'] : '';
	$phoneNumber = isset($postArray['phoneNumber']) ? $postArray['phoneNumber'] : '';
	$email = isset($postArray['email']) ? $postArray['email'] : '';
	$feedback = isset($postArray['feedback']) ? $postArray['feedback'] : '';

	$validEmail;
	$sanitizedEmail = filter_var($email,FILTER_SANITIZE_EMAIL);	
	if (filter_var($sanitizedEmail,FILTER_VALIDATE_EMAIL)){
		$validEmail = $sanitizedEmail;
	}
	
	if(($firstName !== '') && ($lastName !== '') && ($phoneNumber !== '') && ($validEmail !== '') && ($feedback !== '')){
		$sqlInsert = "INSERT INTO contact_us (insertTime, firstName, lastName, phoneNumber, email, feedback)
						VALUES
						(now(), '$firstName', '$lastName', '$phoneNumber', '$validEmail', '$feedback')";
		$insertResult = mysqli_query($link,$sqlInsert);		
	}
	
    if($insertResult){
        header("Location: thanks.php");
        exit();
    }  
    else{
        print "Invalid form input.  Please check your input for errors. \n";
    }
}

print "
<main>
  <section>
    <article>
      <h2>Contact Us</h2>
	<form id='contactForm' method='POST' action='contactus.php' >        
	    <div class='input'>
            <label class='col-md-3 col-form-label'>First Name:</label>
            <input type='text' name='firstName' id='firstName' required='required' value='' size='25' maxlength='50' />
        </div>        
	    <div class='input'>
            <label class='col-md-3 col-form-label'>Last Name:</label>
            <input type='text' name='lastName' id='lastName' required='required' value='' size='25' maxlength='50' />
        </div>
	    <div class='input'>
            <label class='col-md-3 col-form-label'>Phone Number:</label>
            <input type='text' name='phoneNumber' id='phoneNumber' required='required' value='' size='25' minlength='10' maxlength='12'/>
        </div>                       
        <div class='input'>
            <label class='col-md-3 col-form-label'>Email:</label>
            <input type='text' name='email' id='email' size='25' required='required' maxlength='75'/>
        </div>
        <div class='input'>
            <label class='col-md-10 offset-1 col-form-label'>Please leave your feedback below.</label>
            <textarea class='col-md-8 offset-2 feedback' name='feedback' id='feedback' required='required' maxlength='500'></textarea>
        </div>      
        <div class='input'>
            <input class='btn btn-primary col-md-2 offset-5' id='submitBtn' type='submit' name='submit' value='Submit' />
        </div>         
	</form>
    </article>
  </section>
  <aside>
    <div class=capsule>
      <h3>Volutpat</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
	  Morbi enim nunc faucibus a. Mauris a diam maecenas sed enim ut sem viverra. In metus vulputate eu scelerisque felis. Platea dictumst 
	  quisque sagittis purus sit amet volutpat consequat mauris. Lacus suspendisse faucibus interdum posuere. </p>
    </div>  
    <div class=capsule>
      <h3>Aliquam </h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
	  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
	  in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class=capsule>
      <h3>Malesuada </h3>
      <p>Aliquet risus feugiat in ante metus. Urna id volutpat lacus laoreet non curabitur. Auctor elit sed vulputate mi sit amet mauris 
	  commodo quis. Blandit turpis cursus in hac habitasse platea dictumst quisque. Malesuada nunc vel risus commodo viverra.
	  Viverra mauris in aliquam sem fringilla ut morbi.  Pellentesque habitant morbi tristique senectus et netus et malesuada. 
	  Eget felis eget nunc lobortis mattis aliquam. Massa tincidunt dui ut ornare lectus. Libero nunc consequat 
	  interdum varius sit amet.</p>
    </div>
  </aside>
  </main>
<footer>Sprint 2 Ken Lucas Peter</footer>
";
print $page->getBottomSection();
?>