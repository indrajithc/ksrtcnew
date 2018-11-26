<?php

/**
 * @Author: indran
 * @Date:   2018-11-22 10:19:57
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 20:11:21
 */
?>

<?php

/**
 * @Author: indran
 * @Date:   2018-10-17 16:48:54
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-25 10:16:43
 */


include_once('../global.php'); ?>
<?php include_once('../root/connection.php');
include_once('../root/functions.php');





$db=  new Database();
$message=array(null,null);

?>





<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Gofar</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:700,600,400,300" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Oswald:400" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/lib/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/lib/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/lib/awe-booking-font.css">
	<link rel="stylesheet" type="text/css" href="css/lib/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/lib/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="css/lib/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="revslider-demo/css/settings.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
	<link id="colorreplace" rel="stylesheet" type="text/css" href="css/colors/blue.css">
      <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]--><script>
      		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      			n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
      			n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
      			t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
      				document,'script','http://connect.facebook.net/en_US/fbevents.js');

      			fbq('init', '1031554816897182');
      			fbq('track', "PageView");
      		</script>
      		<noscript><img height="1" width="1" style="display:none"
      			src="https://www.facebook.com/tr?id=1031554816897182&amp;ev=PageView&amp;noscript=1"
      			/></noscript>
      		</head>
   <!--[if IE 7]>
   <body class="ie7 lt-ie8 lt-ie9 lt-ie10">
      <![endif]--><!--[if IE 8]>
      <body class="ie8 lt-ie9 lt-ie10">
         <![endif]--><!--[if IE 9]>
         <body class="ie9 lt-ie10">
         <![endif]--><!--[if (gt IE 9)|!(IE)]><!-->
         <body>
         	<!--<![endif]-->
         	<div id="page-wrap">
         		<div class="preloader"></div>
         		<header id="header-page">
         			<div class="header-page__inner">
         				<div class="container">
         					<div class="logo"><a href="#">

                           <span class="text-danger" style="font-weight: 800; font-size: 4rem;">KSRTC</span>
                        </a></div>
                        <nav class="navigation awe-navigation" data-responsive="1200">
                           <ul class="menu-list"> 


                              <li class="menu-item-has-children current-menu-parent">
                                 <a href=".">Home</a> 
                              </li>
<!-- 
                              <li class="menu-item-has-children current-menu-parent">
                                 <a href="#">Home</a> 
                              </li> -->


                           </ul>
                        </nav>
                        <div class="search-box">

                        </div>
                        <a class="toggle-menu-responsive" href="#">
                           <div class="hamburger"><span class="item item-1"></span> <span class="item item-2"></span> <span class="item item-3"></span></div>
                        </a>
                     </div>
                  </div>
               </header>