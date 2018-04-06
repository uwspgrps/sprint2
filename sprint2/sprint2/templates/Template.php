<?php

/**
*
* Template class
* 
* Used to create multiple unique HTML pages
*
* Usage:
*   $page = new Template("My Page");
*   $page->setHeadSection("<script type='text/javascript' src='hello.js'></script>");
*   $page->setTopSection();
*   $page->setBottomSection();
*
*   print $page->getTopSection();
*   print "<h1>Some page-specific HTML goes here</h1>\n";
*   print $page->getBottomSection();
*
* @author Steve Suehring <steve.suehring@uwsp.edu>
*/

class Template {

	private $_top;
	private $_bottom;
  private $_title;
  private $_headSection = "";

function __construct($title = "Default") {
	$this->_title = $title;
}

function setHeadSection($include) {
  $this->_headSection .= $include . "\n";
} //end function setHeadSection

function setTopSection() {
	$returnVal = "";
	$returnVal .= "<!doctype html>\n";
	$returnVal .= "<html>\n";
	$returnVal .= "<head><title>";
	$returnVal .= $this->_title;
	$returnVal .= "</title>\n";
  $returnVal .= $this->_headSection;
	$returnVal .= "</head>\n";
	$returnVal .= "<body>\n";

	$this->_top = $returnVal;

} //end function setTopSection

function setBottomSection() {
	$returnVal = "";
	$returnVal .= "</body>\n";
	$returnVal .= "</html>\n";

	$this->_bottom = $returnVal;

} //end function setBottomSection

function getTopSection() {
	return $this->_top;
}

function getBottomSection() {
	return $this->_bottom;
}

} // end class

?>
