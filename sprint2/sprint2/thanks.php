<?php
require_once("templates/Template.php");
$page = new Template("Thank You");
$page->setHeadSection("<link rel='stylesheet' href='css/prettylab.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();
print "
<header>
  <h1>Thank you</h1>
  <nav>
    <a href=index.php>Home</a>
    <a href=asgnabout.php>About</a>
    <a href=contactus.php>Contact</a>
	<a href=booksearch.php>Search</a>
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
	<footer>Sprint 1 Ken Lucas Peter</footer>
	";
	print $page->getBottomSection();
?>
 