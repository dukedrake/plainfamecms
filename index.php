<?php
/************************************************
/************************************************
Diese Software wurde erstellt von Ralph Voigt, www.dukedrake.de
Das Kopieren, Verändern oder Weitergeben dieser oder anderer Dateien der Software
ist nur bei Inkenntnissetzen des Autors erlaubt (voigt@dukedrake.de)

initial version by R.Voigt 2012-2015
*************************************************
*************************************************/

  // production version
  error_reporting(0); @ini_set('display_errors', 0);
  
  // debug version
	// error_reporting(E_ALL);
	
	header('content-type: text/html; charset=utf-8');
	
  // setup multilanguage support
  $pagelang = 'en';
  $filelang = 'EN';
  if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && $_SERVER['HTTP_ACCEPT_LANGUAGE'][0].$_SERVER['HTTP_ACCEPT_LANGUAGE'][1] == "de") {
    $pagelang = 'de';
    $filelang = '';
  }
	
	$query = "home";
  if($_GET['query']) {
    $lastin = strlen($_GET['query']) - 1;
    $query = $_GET['query'][$lastin] == "/" ? substr($_GET['query'],0,-1) : $_GET['query'];
  }

	// check for languageversion
  $checkfallback = false;
  if     (                   !file_exists('html/'.$query.$filelang.'.html') && !file_exists('html/'.$query.$filelang.'.php') )     $checkfallback = true;
  
  if ($checkfallback) echo "fallback...";
	// check for corrupt query or load fallback version
  if     ( $checkfallback && (file_exists('html/'.$query.'.html')          || file_exists('html/'.$query.'.php') )         )     $filelang = '';
  elseif ( $checkfallback )  $query = "home";
   
  
  // check if query is a module
	$ptype = "html";
	if     ( file_exists('html/'.$query.$filelang.'.php') ) $ptype = "php";
	
	
	include('pagedata.php');
  $pageData = $pagelang == 'de' ? $pageDataDE : $pageDataEN;
	
	
	foreach($pageData as $name => $page) $pageData[$name]['active'] = "";
	$pageData[$query]['active'] = 'active';
  
  $loadRightCol = false;
  $addWidth = ' class="leftwide"';
  if(!isset($pageData[$query]['norightcol']) || !$pageData[$query]['norightcol']) {
    $loadRightCol = true;
    $addWidth = '';
  }

  
  // prepare head details
  $jsfiles = "";
  if(isset($pageData[$query]['js']) && is_array($pageData[$query]['js'])) {
    for($i=0;$i<count($pageData[$query]['js']);$i++) {
      $jsfiles .= '<script src="' . $pageData[$query]['js'][$i] . '"></script>'; 
    }
  }
  
  
  $topmenu = '		<ul class="nav"> ';
  foreach($pageData as $name=>$cpage) {
    if($cpage['type']=="top") {
      $chref = isset($cpage['url']) ? $cpage['url'] : '/'.$name.'/';
      $topmenu .= '
      <li><a href="'.$chref.'" title="'.$cpage['linkdesc'].'" class="'.$name.' '.$cpage['active'].'">'.$cpage['linkname'].'</a></li>';
    }
  }
  $topmenu .= '		</ul>';
  
  
  include('pagehead.php');

	$page .= '
	<div id="fixedtop"> 
		' . $topmenu . '
	</div>
	
	<div id="container">
			<div id="title">
        <a href="/">
          <img alt="" title="plainfame CMS" src="/img/PFCMS_logo.png" style="box-shadow: 0px 0px 15px rgba(0,0,0,0.7); background: rgba(255,255,255,0.7); " />
        </a>
      </div>
			' . $topmenu . '
			
			<div id="content">
        <div id="leftcontent"' . $addWidth . '>
  ';

    
		// flush if page to prepare script
		echo $page;
		$page = "";
    
		if($ptype == "php") {
			include('html/'.$query.$filelang.'.php');
		} else {
			$page = file_get_contents('html/'.$query.$filelang.'.html');
		}
		
    
		$page .= '
				</div>
    ';

    if($loadRightCol) {
      $page .= '
          <div id="rightcontent">
            <div id="rightcontenttop">';
      $page .= file_get_contents('html/right.html');
      $page .= '
            </div>
            <div id="fbbox">';
      $page .= file_get_contents('html/infobox.html');
      $page .= '
            </div>
          </div>
      ';
    }
    
		$page .= '
			</div>
			
			<div id="footer">
		';
		
		foreach($pageData as $name=>$cpage) {
			if($cpage['type']=="bottom") {
				$chref = isset($cpage['url']) ? $cpage['url'] : '/'.$name.'/';
				$page .= '<a href="'.$chref.'" class="'.$cpage['active'].'" title="'.$cpage['linkdesc'].'">'.$cpage['linkname'].'</a>&nbsp; ';
			}
		}
		
		$page .= '
			</div>
		</div>
	</body>
	</html>
		';
		
		echo $page;
				
		
		
/************************************************
/************************************************
Diese Software wurde erstellt von Ralph Voigt, www.dukedrake.de
Das Kopieren, Verändern oder Weitergeben dieser oder anderer Dateien der Software
ist nur bei Inkenntnissetzen des Autors erlaubt (voigt@dukedrake.de)

initial version by R.Voigt 2012-2015

*************************************************
*************************************************/		
?>


