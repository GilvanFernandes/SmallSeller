<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Teste de Seleção</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php echo link_tag('front/stylesheets/base.css'); ?>
	<?php echo link_tag('front/stylesheets/skeleton.css'); ?>
	<?php echo link_tag('front/stylesheets/layout.css'); ?>
	<?php echo link_tag('front/stylesheets/main.css'); ?>

	<!-- The Menu -->
	<?php echo link_tag('front/stylesheets/styles.css'); ?>
	<?php echo link_tag('front/pe-icon-7-stroke/css/pe-icon-7-stroke.css'); ?>

	<!-- Optional - Adds useful class to manipulate icon font display -->
	<?php echo link_tag('front/pe-icon-7-stroke/css/helper.css'); ?>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>



	<!-- The Header
	================================================== -->

	<div class="header header2">
	<div class="container">
		<div class="four columns alpha">
			<div class="center_mobile">
			<a href="<a href='<?php echo site_url('catalogo'); ?>" class="logo">Gilvan<span class="dot">.</span></a>
			<div class="logo_tagline">Catálogo de Produtos</div>
			</div>
		</div>
		<div class="twelve columns omega">
			<div class="center_mobile">
			<div class="header_line"><span class="vert_line">| </span>
				<span class="header_social">
					<a href="#" class="footer_social facebook-c"></a>
					<a href="#" class="footer_social twitter-c"></a>
				</span>
			</div>
			</div>

			<nav>
			<div id='cssmenu'>
			<ul>
				 <li class='last'><a href='<?php echo site_url('catalogo'); ?>'><span>Catálogo</span></a></li>
			   <li class='last'><a href='<?php echo site_url('catalogo/contato'); ?>'><span>Contato</span></a></li>
			</ul>
			</div>
			</nav>


		</div>
	</div>
	</div>
