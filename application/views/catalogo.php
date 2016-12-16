	<div class="container">
		<div class="sixteen columns services_div">
			<div class="Services_1_title_div">
				<h3>
					Produtos do Dia | <?php  echo date('d/m/Y'); ?>
				</h3>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="services_boxes services_boxes2">
			<div class="sixteen columns ">


				<?php if(!isset($rsProdutosDia)): ?>

					<p class="services_tagline">
						Sem novidades no momento =(
					</p>

				<?php else: ?>

					<?php foreach ($rsProdutosDia as $sProduto): ?>

					<div class="sep"><div class="clearfix"></div></div>
					<div class="four columns  services_box team_box">
						 <img class="team_image" src="<?php echo base_url()."upload/produtos/".$sProduto->foto;?>" alt="<?php echo $sProduto->nome;?>">
						 <div class="box_text_div">
						 	<h3 class="box_title">
						 		<?php echo $sProduto->nome;?>
						 	</h3>

						 	<p class="box_text">
						 		 R$ <?php echo $sProduto->valor;?><br /><?php echo $sProduto->detalhes;?>
						 	</p>
						 	<div class="team_item_social_div">
						 	<span class="team_item_social ">
								<a href="#" class="footer_social facebook-c"></a>
								<a href="#" class="footer_social twitter-c"></a>
							</span>
						 	</div>
						 </div>
					</div>

					<?php endforeach;?>

				<?php endif;?>


			<div class="clearfix"></div>
		</div>

		</div>
		<div class="clearfix"></div>

		<div class="sixteen columns services_div">
			<div class="Services_1_title_div">
				<h3>
					Produtos dos últimos três dias =)
				</h3>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="services_boxes services_boxes2">
			<div class="sixteen columns ">

			<?php foreach ($rsProdutosDiasAnteriores as $sProduto): ?>

				<div class="sep"><div class="clearfix"></div></div>
				<div class="four columns  services_box team_box">
					 <img class="team_image" src="<?php echo base_url()."upload/produtos/".$sProduto->foto;?>" alt="<?php echo $sProduto->nome;?>">
					 <div class="box_text_div">
						<h3 class="box_title">
							<?php echo $sProduto->nome;?>
						</h3>
						<p class="box_text">
							<?php echo $sProduto->detalhes;?>
						</p>
					 </div>
				</div>

				<?php endforeach;?>
		</div>

		</div>
		<div class="clearfix"></div>


	</div>
