<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
  	<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Leo's Knit - a blog about Knitting</title>
		<meta name="description" content="A responsive, magazine-like website layout with a grid item animation effect when opening the content" />
		<meta name="keywords" content="grid, layout, effect, animated, responsive, magazine, template, web design" />
		<meta name="author" content="Codrops" />
    <?php wp_head(); ?>
	</head>
	<body ng-app="leoKnitApp">
		<div class="container">
      <button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
			<div id="theSidebar" class="sidebar">
				<button class="close-button fa fa-fw fa-close"></button>
				<h1 id="header1"><?php echo get_bloginfo('name'); ?></h1>
				<div class="svg-container">
					<img src="<?php echo content_url(); ?>/themes/leoknit/img/logo.jpg" />
				</div>
				<h1 id="header2"><?php echo get_bloginfo('description'); ?></h1>
				<div class="clearfix"></div>
				<div class="contact">
					<a href="#" class="text">Contact</a>
				</div>
				<div class="clearfix"></div>
			  <a class="social" href="https://instagram.com/leonorsknit/" target="_blank"><i class="fa fa-instagram"></i></a>
			</div>
