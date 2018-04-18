<?php
require_once("templates/Template.php");
$page = new Template("Index");
$page->setHeadSection("<link rel='stylesheet' href='css/prettylab.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();
print "
<header>	
	<h1>Home Page Sprint 2</h1>";
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
      <h2>Lorem Ipsum</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
	  et dolore magna aliqua. Non curabitur gravida arcu ac. Egestas tellus rutrum tellus pellentesque eu tincidunt. 
	  Nunc mattis enim ut tellus elementum. Pellentesque habitant morbi tristique senectus et netus et malesuada. 
	  Eget felis eget nunc lobortis mattis aliquam. Massa tincidunt dui ut ornare lectus. Libero nunc consequat 
	  interdum varius sit amet. Quisque non tellus orci ac auctor augue mauris. Sem integer vitae justo eget. Metus 
	  vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Tincidunt nunc pulvinar sapien et ligula 
	  ullamcorper malesuada. Mattis nunc sed blandit libero volutpat. Neque viverra justo nec ultrices dui sapien 
	  eget mi proin. Tortor vitae purus faucibus ornare suspendisse. Ullamcorper a lacus vestibulum sed arcu non odio.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
	  magna aliqua. Viverra aliquet eget sit amet tellus. Mi ipsum faucibus vitae aliquet. Nibh tortor id aliquet lectus 
	  proin nibh nisl condimentum id. Sagittis purus sit amet volutpat consequat mauris nunc congue. Nisl condimentum id 
	  venenatis a condimentum. Nisl nunc mi ipsum faucibus. </p>
    </article>
  </section>
  <aside>
    <div class=capsule>
      <h3>Aliquam </h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
	  Ut enim exercitation ut commodo consequat. Duis aute irure dolor
	  in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class=capsule>
      <h3>Volutpat</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Platea dictumst 
	  quisque sagittis purus sit amet volutpat consequat mauris. Lacus suspendisse faucibus interdum posuere. 
      Massa tincidunt dui ut ornare lectus. Libero nunc consequat interdum varius sit amet. Quisque non tellus orci ac auctor augue mauris. Sem integer vitae justo eget. Metus vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Mattis nunc sed blandit libero volutpat. Neque viverra justo nec ultrices dui sapien eget mi proin. 
      </p>
    </div>
    <div class=capsule>
      <h3>Malesuada </h3>
      <p>Aliquet risus feugiat in ante metus. Urna id volutpat lacus laoreet non curabitur. Auctor elit sed vulputate mi sit amet mauris 
	  commodo quis. Blandit turpis cursus in hac habitasse platea dictumst quisque. Malesuada nunc vel risus commodo viverra.
	  Viverra mauris in aliquam sem fringilla ut morbi.</p>
    </div>
  </aside>
  </main>
  <footer>Sprint 2 Ken Lucas Peter</footer>
  ";
print $page->getBottomSection();
?>
