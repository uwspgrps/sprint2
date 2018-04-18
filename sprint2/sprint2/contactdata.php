<?php
if((isset($_SESSION['isLoggedIn'])) && (isset($_SESSION['role']) && ($_SESSION['role'] == 'administrator'))){
	require_once("templates/Template.php");
	require_once("config/DB.class.php");
	$page = new Template("Contact Data");
	$page->setHeadSection("<link rel='stylesheet' href='css/prettylab.css'>");
	$page->setTopSection();
	$page->setBottomSection();
	print $page->getTopSection();
	print "
	<header>	
	  <h1>User Database</h1>";
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
	<main><div class='tdiv'>";

	$db = new DB();
	if (!$db->getConnStatus()) {
	  print "An error has occurred with connection\n";
	  exit;
	}

	$query = "SELECT * FROM contact_us";
	$result = $db->dbCall($query);
	if(!empty($result)){
		$position=0;
		print "<table style='width:50%'>";
		print "<tr>";
		print "<th>First Name</th>
			  <th>Last Name</th>
			  <th>Phone</th>
			  <th>Email</th>";
		print "</tr>";
		while($position < count($result)){
			print "<tr>";
			print "<td>";
			print $result[$position]['firstName'] . " ";
			print "</td>";
			print "<td>";
			print $result[$position]['lastName'] . " ";
			print "</td>";
			print "<td>";
			print $result[$position]['phoneNumber'] . " ";
			print "</td>";
			print "<td>";
			print $result[$position]['email'] . " ";
			print "</td>";
			print "</tr>";
			$position++;
		}
		print "</table>";		
	}	
	else{
		print "User Table not found";
	}
	print "</div></main>
		<footer>Sprint 2 Ken Lucas Peter</footer>
		";
	print $page->getBottomSection();
}else{
	exit("HTTP 404 NOT FOUND");
}
?>