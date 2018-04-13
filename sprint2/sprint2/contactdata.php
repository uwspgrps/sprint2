<?php
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
  <nav>
	<a href=\"index.php\">Home</a>
    <a href=\"asgnabout.php\">About</a>
    <a href=\"contactus.php\">Contact</a>
	<a href=\"booksearch.php\">Search</a>";
if(isset($_SESSION['isLoggedIn'])){
	if($_SESSION['isLoggedIn'] == true){
		if($_SESSION['role'] == 'administrator'){
			print "<a href=\"contactdata.php\">Contact Data</a>";
		}
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
/*
print "<table style="width:100%">
  <tr>
	<th>id</th>
    <th>inserttime</th> 
    <th>booktitle</th>
    <th>isbn</th> 
    <th>author</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td> 
    <td>94</td>
  </tr>
</table>";
*/
$db = new DB();
//var_dump($db);
if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}
//get POST input and assign to variable here
//sanitize input
/*if(isset($_POST['name'])){
	if(!empty($_POST['name'])){
		$link = $db->returnDB();
		$input = $_POST['name'];
		$safeInput = mysqli_real_escape_string($link,$input);*/
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
		}/*
	}else{
		print "You must fill in a search term";
	}
}else{
	print "Nothing was put in the search bar";
}*/
print "</div></main>
	<footer>Sprint 1 Ken Lucas Peter</footer>
	";
print $page->getBottomSection();
?>
