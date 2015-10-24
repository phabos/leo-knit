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
				<h1 id="header1"><?php echo get_bloginfo('name'); ?></h1>
				<div class="svg-container">
					<!--svg
					   width="80%"
					   height="80%"
					   viewBox="0 0 304.75092 338.35816"
					   id="svg4238">
					  <g
					     id="layer1"
					     transform="translate(-185.15625,-225.90625)">
					    <path
					       style="fill:#f0afb7;fill-opacity:1;fill-rule:evenodd;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 259.10413,242.21986 c 0,0 7.01359,-4.91289 10.59093,-6.6176 4.03694,-1.92374 12.1375,-3.989 12.1375,-3.989 0,0 11.9436,17.09432 17.69265,25.79149 4.83537,7.31497 14.00089,21.68568 14.00089,21.68568 l 45.07806,0 c 0,0 9.18817,-15.37451 13.76315,-22.7757 6.06378,-9.80969 19.4456,-28.61581 19.4456,-28.61581 0,0 8.49096,3.13871 12.17406,5.66398 3.61893,2.48128 10.32088,8.17069 10.32088,8.17069 0,0 -9.33897,45.87013 -6.61588,67.97719 1.51755,12.32003 5.06968,19.45063 10.19688,28.16688 4.84367,8.23425 20.90251,19.60768 20.90251,19.60768 0,0 -0.21429,4.61007 -0.38516,6.15283 -0.45606,4.11765 -0.58477,8.2042 -0.0242,12.42846 0.60154,4.53276 1.31444,11.09612 3.05463,13.33043 7.84928,10.07808 12.56547,21.35692 17.73489,32.59357 5.30088,11.52239 10.19161,26.22388 13.54775,35.55619 6.16485,17.14243 10.89401,38.2794 14.05582,52.81333 1.65946,7.62808 1.63364,23.36245 1.63364,23.36245 0,0 -95.3038,27.1653 -145.46785,28.99132 -23.59765,0.85898 -59.49325,-0.36572 -88.94626,-4.02168 -22.66167,-2.81296 -67.11643,-13.73169 -67.11643,-13.73169 0,0 5.95404,-34.9222 11.08177,-51.82825 4.63691,-15.28778 11.54062,-37.91598 19.41328,-57.02984 9.66064,-23.45485 14.61716,-27.5692 20.01258,-42.15972 1.54129,-4.16802 2.80386,-8.47562 3.49423,-12.86554 0.83228,-5.29238 1.05145,-14.91365 1.05145,-14.91365 l -0.3788,-7.82868 c 0,0 14.85442,-8.8045 18.46728,-16.17782 14.62902,-29.85571 -0.91585,-99.73719 -0.91585,-99.73719 z"
					       id="path4797"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="cscsccscscsscsssasscsacssssccsc" />
					    <path
					       style="fill:#ffffff;fill-opacity:1;fill-rule:evenodd;stroke:#ffffff;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
					       d="m 253.04321,445.7656 c 0,0 7.02871,20.8249 11.68574,30.75306 4.1968,8.94704 14.57823,25.81548 14.57823,25.81548 0,0 11.50852,-13.39572 14.32816,-18.60818 5.25628,-9.71687 12.61945,-34.90189 12.61945,-34.90189 0,0 -16.21226,1.39657 -27.40286,0.78291 -8.68463,-0.47624 -25.80872,-3.84138 -25.80872,-3.84138 z"
					       id="path4803"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="cscscsc" />
					    <path
					       style="fill:#ffffff;fill-opacity:1;fill-rule:evenodd;stroke:#ffffff;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
					       d="m 373.25137,440.71484 c 0,0 17.08,-0.0347 25.5861,-0.69723 8.68912,-0.6768 25.93168,-3.34338 25.93168,-3.34338 0,0 -1.07075,27.86153 -4.0487,38.14523 -2.39111,8.25719 -12.53216,23.14757 -12.53216,23.14757 0,0 -13.85962,-14.42868 -19.12084,-22.77795 -6.73759,-10.69216 -15.81608,-34.47424 -15.81608,-34.47424 z"
					       id="path4805"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="cscscsc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 308.09653,433.13869 c 0,0 4.34776,-14.5708 7.38766,-21.81498 2.71179,-6.4623 7.38632,-17.73746 10.54254,-17.58097 3.36514,0.16685 8.83884,21.71828 8.83884,21.71828 0,0 2.49536,-22.66027 5.05076,-22.72843 3.11415,-0.0831 9.59645,26.26397 9.59645,26.26397 0,0 -1.46727,-25.24722 1.01015,-25.25382 2.6208,-0.007 18.68783,27.27412 18.68783,27.27412"
					       id="path4809"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="csscscsc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 280.82241,385.66152 c 14.10004,1.85195 89.09335,2.28337 114.30507,-2.17814"
					       id="path4811"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="cc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 337.26468,341.59362 c 0,0 28.88713,-26.38081 41.20183,-41.48764 13.16227,-16.14658 34.55698,-52.0714 34.55698,-52.0714"
					       id="path4813"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="csc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 261.75578,254.7205 c 0,0 26.56595,37.59145 41.82799,54.75518 10.42559,11.72465 34.05972,32.2442 34.05972,32.2442"
					       id="path4815"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="csc" />
					    <path
					       style="fill:#ffffff;fill-opacity:0;fill-rule:evenodd;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 298.73729,562.02505 c 0,0 48.63678,-6.78017 72.67825,-13.20485 7.56523,-2.02168 18.73441,-5.50582 26.72193,-8.4641 8.91665,-3.30239 25.28013,-9.04357 26.21588,-7.56945 0.85316,1.34402 -8.46847,6.40001 -13.0152,8.93037 -4.74276,2.63945 -7.13679,3.61147 -12.17471,5.59692 -1.55366,0.6123 -3.93857,1.63187 -4.5131,4.259 -0.37207,1.70138 11.72313,-0.17506 11.72313,-0.17506 l 81.59412,-18.12782"
					       id="path4817"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="csssssscc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 424.4219,532.82813 c 0,0 1.26528,-3.93376 -0.82611,-15.20877 -2.09932,-11.31785 -5.39264,-16.67418 -5.39264,-16.67418"
					       id="path4819"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="csc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 281.70629,231.36072 c 0,0 17.6069,37.74507 27.02643,56.31355 9.15786,18.05265 28.65823,53.54054 28.65823,53.54054 0,0 17.5841,-31.54751 26.20686,-49.45911 9.5476,-19.83271 28.08884,-63.80424 28.08884,-63.80424"
					       id="path4821"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="cscsc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 311.63206,292.85376 51.39151,-0.12627"
					       id="path4823"
					       inkscape:connector-curvature="0" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 318.32432,305.98574 37.88072,-0.12627"
					       id="path4825"
					       inkscape:connector-curvature="0" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 324.25897,317.09742 26.26396,-0.12627"
					       id="path4827"
					       inkscape:connector-curvature="0" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 329.81481,327.45148 14.64721,0.12627"
					       id="path4829"
					       inkscape:connector-curvature="0" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 305.31861,280.47939 63.38707,0.12627"
					       id="path4831"
					       inkscape:connector-curvature="0" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:0.83872592px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
					       d="m 241.52613,369.08105 c 0,0 11.62713,-0.67032 17.50328,-0.60285 5.54824,0.0637 12.91546,0.43064 15.98173,1.36656 2.51865,0.76875 2.741,6.69562 2.427,13.3029 -0.28892,6.07921 -3.51684,10.55853 -5.24679,11.23071 -2.02173,0.78554 -11.89661,0.104 -17.81985,-0.2686 -6.74123,-0.42404 -17.19255,-3.07256 -17.19255,-3.07256"
					       id="path4833"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="csssssc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 267.32143,377.76399 c -1.19798,-0.071 -2.65316,0.29305 -3.41209,1.1487 -0.75893,0.85566 -1.60497,2.84049 -1.54326,4.29773 0.0548,1.29378 0.69511,2.36784 1.54088,3.19344 0.94092,0.91847 2.18465,1.6082 3.59304,1.62798 1.08531,0.0153 2.55806,-0.48391 3.27906,-1.14997 0.8415,-0.77739 1.44146,-1.97527 1.54237,-3.13574 0.12599,-1.44892 -0.30809,-3.13479 -1.22106,-4.1888 -0.91739,-1.05909 -2.38709,-1.71088 -3.77894,-1.79334 z"
					       id="path4835"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="azsassasa" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3.03988695;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 242.41448,366.85678 c 0,0 12.15068,-0.807 18.29142,-0.72577 5.79806,0.0767 13.497,0.51844 16.70132,1.64516 2.63206,0.9255 2.86442,8.06073 2.53628,16.0151 -0.30192,7.31865 -3.67518,12.71121 -5.48303,13.52043 -2.11275,0.94569 -12.43228,0.12521 -18.62222,-0.32335 -7.04477,-0.51049 -17.96667,-3.69899 -17.96667,-3.69899"
					       id="path4833-8"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="csssssc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 438.40621,362.77526 c 0,0 -13.67822,-0.85672 -20.52296,-0.75077 -7.46181,0.11551 -19.73997,-0.28157 -22.28226,2.266 -2.30349,2.30826 -0.22309,27.55072 2.27285,29.54696 2.24153,1.79277 10.94361,2.79532 22.50232,1.02049 9.96979,-1.53085 21.75499,-4.42975 21.75499,-4.42975"
					       id="path4852"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="cssssc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:0.88704026px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
					       d="m 438.09345,364.94226 c 0,0 -12.67079,-0.72769 -19.0114,-0.6377 -6.91225,0.0981 -18.2861,-0.23916 -20.64115,1.92473 -2.13382,1.96065 -0.20667,23.40159 2.10545,25.0972 2.07643,1.52277 10.13761,2.37435 20.845,0.8668 9.23549,-1.30031 19.40838,-3.57777 19.40838,-3.57777"
					       id="path4852-3"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="cssssc" />
					    <path
					       style="fill:none;stroke:#ffffff;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
					       d="m 406.90207,373.03462 c 2.18537,0.14208 3.4284,2.22988 3.47241,4.41942 0.0375,1.86693 -1.68373,3.98995 -3.53554,4.23001 -2.9084,-0.1696 -4.23197,-2.55203 -3.87114,-4.71737 0.34201,-2.0524 2.24861,-3.89695 3.93424,-3.93206 z"
					       id="path4869"
					       inkscape:connector-curvature="0"
					       sodipodi:nodetypes="cscscc" />
					  </g>
					</svg-->
					<img src="<?php echo content_url(); ?>/themes/leoknit/img/logo.jpg" />
				</div>
				<h1 id="header2"><?php echo get_bloginfo('description'); ?></h1>
				<div class="clearfix"></div>
				<div class="contact">
					<a href="#" class="text">Contact</a>
				</div>
				<div class="clearfix"></div>
				<div class="social">
					<a href="https://instagram.com/leonorsknit/" target="_blank"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
