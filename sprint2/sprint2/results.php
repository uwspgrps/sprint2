<?php
require_once("templates/Template.php");
require_once("config/DB.class.php");
$page = new Template("DB Lab");
$page->setHeadSection("<link rel='stylesheet' href='css/prettylab.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();
print "
<header>	
  <h1>Book Search Result</h1>";
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
//get POST input and assign to variable here
//sanitize input
if(isset($_POST['name'])){
	if(!empty($_POST['name'])){
		$postArray = $db->dbEsc($_POST);		
		$input = $postArray['name'];
		$query = "SELECT booktitle, isbn, author FROM bookinfo WHERE booktitle LIKE '%{$input}%' OR isbn LIKE '%{$input}%' OR author LIKE '%{$input}%'";
		$result = $db->dbCall($query);
		if(!empty($result)){
			$position=0;
			print "<table style='width:50%'>";
			print "<tr>";
			print "<th>Book Title</th>
				  <th>ISBN</th>
				  <th>Author</th>";
			print "</tr>";
			while($position < count($result)){
				print "<tr>";
				print "<td>";
				print $result[$position]['booktitle'] . " ";
				print "</td>";
				print "<td>";
				print $result[$position]['isbn'] . " ";
				print "</td>";
				print "<td>";
				print $result[$position]['author'] . " ";
				print "</td>";
				print "</tr>";
				$position++;
			}
			print "</table>";		
		}	
		else{
			print "Can not find search result.";
		}
	}else{
		print "You must fill in a search term";
	}
}else{
	print "Nothing was put in the search bar";
}
print "</div></main>
	<footer>Sprint 2 Ken Lucas Peter</footer>
	";
print $page->getBottomSection();
?>
