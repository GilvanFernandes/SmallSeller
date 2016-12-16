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

	<div class="header header2">
	<div class="container">
		<div class="four columns alpha">
			<div class="center_mobile">
			<a href="<?php echo site_url('catalogo'); ?>" class="logo">Gilvan<span class="dot">.</span></a>
			<div class="logo_tagline">Catálogo de Produtos</div>
			</div>
		</div>
		<div class="twelve columns omega">

			<nav>
			<div id='cssmenu'>
			<ul>
				<?php if($this->session->userdata('logado')): ?>

					<li class='last'><a href='<?php echo site_url('catalogo/admVenda'); ?>'><b><span>Vendas</span></b></a></li>
					<li class='last'><a href='<?php echo site_url('catalogo/admProdutos'); ?>'><b><span>Produtos</span></b></a></li>
					<li class='last'><a href='<?php echo site_url('catalogo/admUsuario'); ?>'><b><span>Usuários / Cliente</span></b></a></li>
    				<li class='last'><a href='<?php echo site_url('catalogo/admLerContato'); ?>'><b><span>Mensagens</span></b></a></li>

				<?php endif;?>

			   <li class='last'><a href='<?php echo site_url('catalogo'); ?>'><b><span>Catálogo</span></b></a></li>
			   <li class='last'><a href='<?php echo site_url('catalogo/contato'); ?>'><b><span>Contato</span></b></a></li>
			</ul>
			</div>
			</nav>

		</div>
	</div>
	</div>
