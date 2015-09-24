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
	<body>
		<div class="container">
      <button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
			<div id="theSidebar" class="sidebar">
				<button class="close-button fa fa-fw fa-close"></button>
				<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="http://tympanus.net/Tutorials/MotionBlurEffect/" title="Previous Demo"><span>Previous Demo</span></a>
					<a class="codrops-icon codrops-icon--drop" href="http://tympanus.net/codrops/?p=23872" title="Back to the article"><span>Back to the Codrops article</span></a>
				</div>
				<h1><span>Animated<span> Grid Layout</h1>
				<nav class="codrops-demos">
					<a class="current-demo" href="index.html">Demo 1</a>
					<a href="index2.html">Demo 2</a>
				</nav>
				<div class="related">
					<h3>Related Demos</h3>
					<a href="http://tympanus.net/Development/BookPreview/">Book Preview</a>
					<a href="http://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/">Thumbnail Grid</a>
					<a href="http://tympanus.net/Development/3DGridEffect/">3D Grid Effect</a>
				</div>
			</div>
