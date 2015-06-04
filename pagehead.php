<?php	

$page = '<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">  
		<title>'.$pageData[$query]['title'].' // '.$siteDetails['sitetitle'].'</title>
		<meta property="og:title" content="'.$siteDetails['sitetitle'].'">
		<meta property="og:description" content="'.$siteDetails['sitedescription'].'">
		<meta property="og:image" content="'.$siteDetails['siteimage'].'">
		<meta name="description" content="'.$siteDetails['sitedescription'].'" >
		<meta name="keywords" content="'.$siteDetails['sitekeywords'].'">
		<meta name="generator" content="plainfameCMS">
		<meta name="robots" content="INDEX,FOLLOW">
		<meta name="revisit-after" content="5 days">
		<link href="/css/fonts.css" rel="stylesheet" type="text/css">
		<link href="/css/mainstyle.css" rel="stylesheet" type="text/css">
		'.$jsfiles.'
		<link rel="shortcut icon" href="/img/favicon.ico">
		<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
	</head>
	<body lang="de">
 ';