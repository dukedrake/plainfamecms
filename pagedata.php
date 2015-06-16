<?php	

  
  /*
  *
  * set up site details
  *
  */
  
  $siteDetails = array();
  $siteDetails['sitetitle']       = "plainfame CMS";
  $siteDetails['sitedescription'] = "Yet another simple PHP CMS";
  $siteDetails['siteimage']       = "http://plainfamecms.drakedata.com/img/logo.png";
  $siteDetails['sitekeywords']    = "CMS,open source,plaincms,plainfamecms";
  
  

	/*
	* SYNTAX:
	* 
	* $pageDataXX 											- XX = Sprache
	* $pageDataXX['abc'] 								- abc = Adresse (in der Adresszeile)
	* $pageDataXX['abc']['type']					- wo der Link aufgeführt werden soll (top, 2D-Art, 3D-Art, bottom)
	* $pageDataXX['abc']['title'] 				- Seitentitel (in der Titelleiste)
	* $pageDataXX['abc']['linkname']				- Name des Links
	* $pageDataXX['abc']['linkdesc']				- Kurzbeschreibung des Links (für mouse-hover)
	* $pageDataXX['abc']['norightcol']		  - lade keine rechte Spalte für diese Seite
	*
	*/

	// Deutsch 
	$pageDataDE = array();
	
	
	// TOP MENU
	$pageDataDE['home']['type'] 					= "top";
	$pageDataDE['home']['title'] 					= "Willkommen";
	$pageDataDE['home']['linkname'] 			= "Willkommen";
	$pageDataDE['home']['linkdesc'] 			= "Zur Startseite";

	$pageDataDE['details']['type'] 					= "top";
	$pageDataDE['details']['title'] 				= "Über das Projekt";
	$pageDataDE['details']['linkname'] 			= "Über das Projekt";
	$pageDataDE['details']['linkdesc'] 			= "Nähere Details zum SNM Projekt";
	$pageDataDE['details']['norightcol'] 		= true;
  $pageDataDE['details']['js'] 			      = array("//code.jquery.com/jquery-1.11.3.min.js","/js/stupidtable.min.js");
	
	$pageDataDE['vote']['type'] 					= "top";
	$pageDataDE['vote']['title'] 				  = "Abstimmen über Bilder";
	$pageDataDE['vote']['linkname'] 			= "Abstimmen";
	$pageDataDE['vote']['linkdesc'] 			= "Abstimmen über Bilder";
	$pageDataDE['vote']['norightcol'] 		= true;
  $pageDataDE['vote']['js'] 			      = array("//code.jquery.com/jquery-1.11.3.min.js", "/js/dovote.js");

	$pageDataDE['gallery']['type'] 					= "top";
	$pageDataDE['gallery']['title'] 				= "Fotogalerie";
	$pageDataDE['gallery']['linkname'] 			= "Fotogalerie";
	$pageDataDE['gallery']['linkdesc'] 			= "Nach Kategorien geordnete Fotos";
	$pageDataDE['gallery']['js'] 			      = array("//code.jquery.com/jquery-1.11.3.min.js", "/js/blockrotate.js");

	
	
	// UNTEN
	$pageDataDE['githome']['type'] 				= "bottom";
	$pageDataDE['githome']['title'] 			= "Projektseite auf Git";
	$pageDataDE['githome']['linkname'] 			= "Projektseite auf Git";
	$pageDataDE['githome']['linkdesc']			= "Link zur Projektseite auf Git";
	$pageDataDE['githome']['url']			= "https://github.com/dukedrake/plainfamecms"; 

	$pageDataDE['kontakt']['type'] 				= "bottom";
	$pageDataDE['kontakt']['title'] 			= "Kontakt";
	$pageDataDE['kontakt']['linkname'] 			= "Kontakt";
	$pageDataDE['kontakt']['linkdesc']			= "Hier können Sie Feedback zum Projekt geben";

	$pageDataDE['impressum']['type'] 				= "bottom";
	$pageDataDE['impressum']['title'] 			= "Impressum";
	$pageDataDE['impressum']['linkname'] 			= "Impressum";
	$pageDataDE['impressum']['linkdesc']			= "Impressum";

  
  // Englisch
	$pageDataEN = array();
	
	
	// TOP MENU
	$pageDataEN['home']['type'] 					= "top";
	$pageDataEN['home']['title'] 					= "Welcome";
	$pageDataEN['home']['linkname'] 			= "Welcome";
	$pageDataEN['home']['linkdesc'] 			= "Go to start";

	$pageDataEN['details']['type'] 					= "top";
	$pageDataEN['details']['title'] 				= "Details on the project";
	$pageDataEN['details']['linkname'] 			= "Details";
	$pageDataEN['details']['linkdesc'] 			= "Details on the project";
  $pageDataEN['details']['norightcol'] 		= true;
  $pageDataEN['details']['js'] 			      = array("//code.jquery.com/jquery-1.11.3.min.js","/js/stupidtable.min.js");
	
	$pageDataEN['vote']['type'] 					= "top";
	$pageDataEN['vote']['title'] 				  = "Vote for an image";
	$pageDataEN['vote']['linkname'] 			= "vote";
	$pageDataEN['vote']['linkdesc'] 			= "Vote for an image";
  $pageDataEN['vote']['norightcol'] 		= true;
  $pageDataEN['vote']['js'] 			      = array("//code.jquery.com/jquery-1.11.3.min.js", "/js/dovote.js");

	$pageDataEN['gallery']['type'] 					= "top";
	$pageDataEN['gallery']['title'] 				= "Picture gallery";
	$pageDataEN['gallery']['linkname'] 			= "Picture gallery";
	$pageDataEN['gallery']['linkdesc'] 			= "categorized photographies";
	$pageDataEN['gallery']['js'] 			      = array("//code.jquery.com/jquery-1.11.3.min.js", "/js/blockrotate.js");
	
	
	// UNTEN
	$pageDataEN['githome']['type'] 				= "bottom";
	$pageDataEN['githome']['title'] 			= "projecthome on Git";
	$pageDataEN['githome']['linkname'] 			= "projecthome on Git";
	$pageDataEN['githome']['linkdesc']			= "Link to project home on Git";
	$pageDataEN['githome']['url']			= "https://github.com/dukedrake/plainfamecms"; 

	$pageDataEN['kontakt']['type'] 				= "bottom";
	$pageDataEN['kontakt']['title'] 			= "Contact";
	$pageDataEN['kontakt']['linkname'] 			= "Contact";
	$pageDataEN['kontakt']['linkdesc']			= "Here you can send feedback";

	$pageDataEN['impressum']['type'] 				= "bottom";
	$pageDataEN['impressum']['title'] 			= "Imprint";
	$pageDataEN['impressum']['linkname'] 			= "Imprint";
	$pageDataEN['impressum']['linkdesc']			= "Imprint of the homepage";



	
