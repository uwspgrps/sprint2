<?php
require_once("templates/Template.php");
$page = new Template("Thank You");
$page->setHeadSection("<link rel='stylesheet' href='css/prettylab.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();
print "
<header>
  <h1>Thank you</h1>";
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
</header>
<main>
  <section>
    <article>
	  <p> Thanks for your feedback.</p>
      <p>We will reply back to you as soon as possible.</p>
      <p></p>
    </article>
  </section>
  </main>
	<footer>Sprint 2 Ken Lucas Peter</footer>
	";
print $page->getBottomSection();
?>
 