<?php
require_once("templates/Template.php");
$page = new Template("Search");
$page->setHeadSection("<link rel='stylesheet' href='css/prettylab.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();
print "
<header>
  <h1>Book Locator</h1>";
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
      <h2>Search for a Book</h2>
	<form method='POST' action='results.php' onsubmit='return validateForm()'>
	Enter an ISBN, Author or Title:  <input type='text' name='name' id='name' ><br />
	<br />
	<input type='submit' name='submit' value='Submit'>
	</form>
      <p></p>
      <p></p>
    </article>
  </section>
  <aside>
    <div class=capsule>
      <h3>Egestas</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
	  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
	  in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class=capsule>
      <h3>Pellentesque</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
	  Morbi enim nunc faucibus a. Mauris a diam maecenas sed enim ut sem viverra. In metus vulputate eu scelerisque felis. Platea dictumst 
	  quisque sagittis purus sit amet volutpat consequat mauris. Lacus suspendisse faucibus interdum posuere. </p>
    </div>
    <div class=capsule>
      <h3>Tincidunt</h3>
      <p>Aliquet risus feugiat in ante metus. Urna id volutpat lacus laoreet non curabitur. Auctor elit sed vulputate mi sit amet mauris 
	  commodo quis. Blandit turpis cursus in hac habitasse platea dictumst quisque. Malesuada nunc vel risus commodo viverra.
	  Viverra mauris in aliquam sem fringilla ut morbi.  Pellentesque habitant morbi tristique senectus et netus et malesuada. 
	  Eget felis eget nunc lobortis mattis aliquam. Massa tincidunt dui ut ornare lectus. Libero nunc consequat 
	  interdum varius sit amet.</p>
    </div>
  </aside>
  </main>
  <footer>Sprint 2 Ken Lucas Peter</footer>";
 print $page->getBottomSection();
?>