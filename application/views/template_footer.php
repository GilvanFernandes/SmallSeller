
<div class="bottom_footer_section">
	<div class="container">
	<div class="sixteen columns bottom_line_dev">
		<div class="footer_buttom">
				<?php if($this->session->userdata('logado')): ?>
					<a href="<?php echo site_url('login/deslogar'); ?>">Desconectar</a>
				<?php else: ?>
					<a href="<?php echo site_url('login'); ?>">Login para Administração</a>
				<?php endif;?>
		</div>
		<nav>
		<ul class="footer_nav">
			<li><a href="<?php echo site_url('catalogo'); ?>">Catálogo</a></li>
			<li><a href="<?php echo site_url('catalogo/contato'); ?>">Contato</a></li>
		</ul>
		</nav>
		<div class="social_footer">
			<a href="#" class="footer_social facebook-c"></a>
			<a href="#" class="footer_social twitter-c"></a>
		</div>


		</div>
	</div>
</div>


<script src="<?php echo base_url()."front/js/jquery.common.min.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url()."front/js/ticker.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url()."front/js/menu_jquery.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url()."front/js/car/jquery-1.7.2.min.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url()."front/js/car/jquery.easing.1.3.js"; ?>" type="text/javascript"></script>
<script src="<?php echo base_url()."front/js/car/custom.js"; ?>" type="text/javascript"></script>

</body>
</html>
