<?php
require_once("templates/Template.php");
require_once("config/DB.class.php");
$page = new Template("Log In");
$page->setHeadSection("<link rel='stylesheet' href='css/prettylab.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();
print "
<header>
  <h1>Log In</h1>";
if(isset($_SESSION['isLoggedIn'])){
	if($_SESSION['isLoggedIn'] == true){
		print "<h2 align='right'>Welcome " . $_SESSION['realName'] . "</h2>";
	}
}

print "	
	<nav>
		<a href=\"booksearch.php\">Search</a>
		<a href=\"contactus.php\">Contact</a>
		<a href=\"asgnabout.php\">About</a>
		<a href=\"index.php\">Home</a>	
		<a href=\"login.php\">Log In</a>
	</nav>
</header>";

if(isset($_POST['submit']))
{
	if(isset($_POST['name']) && isset($_POST['passwrd']))
	{
		if(!empty($_POST['name']) && !empty($_POST['passwrd']))
		{
			$user = $_POST['name'];
			$password = $_POST['passwrd'];
			
			$db = new DB();
			if(!$db->getConnStatus()){
				print "An error has occurred with connection\n";
				exit;
			}
			
			$sanitizedUser = filter_var($user,FILTER_SANITIZE_STRING);
			$sanitizedPass = filter_var($password,FILTER_SANITIZE_STRING);
			$safeUser = $db->dbEsc($sanitizedUser);
			
			$query = "SELECT username,userpass,realname,rolename 
					  FROM user, user2role, role
					  WHERE user.id = user2role.userid AND user2role.roleid = role.id AND user.username = '{$safeUser}'";
			
			$result = $db->dbCall($query);
			if(!count($result) == 0)
			{
				if((password_verify($sanitizedPass,$result[0]['userpass'])) == 1)
				{
					$_SESSION['isLoggedIn'] = true;
					$_SESSION['realName'] = $result[0]['realname'];
					$_SESSION['role'] = $result[0]['rolename'];
					header("Location: index.php");
				}
				else
				{
					print "The username or password was incorrect, please try again.";
				}
			}
			else
			{
				print "The username or password was incorrect, please try again."
;			}
		}
		else
		{
			print "You must enter both a username and password";
		}
	}
	else
	{
		print "You must enter both a username and password";
	}
}


print 
"<main>
  <section>
    <article>
      <h2>Log into your account</h2>
	<form method='POST' action='login.php'>
	<div class='input'>
	Username:  <input type='text' name='name' id='name' >
	</div>
	<div class='input'>
	Password:  <input type='password' name='passwrd' id='passwrd' >
	</div>	
	<div class='input'>
	<input type='submit' name='submit' value='Log in'>
	</div>
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