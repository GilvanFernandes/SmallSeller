	<div class="container">
		<div class="sixteen columns services_div">
			<div class="Services_1_title_div">
				<h3>
					ADMINISTRAÇÃO | Mensagens
				</h3>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="clearfix"></div>
		<div class="contact_form_div">

				<div class="eight columns omega">

					<fieldset>
						<br />
						<ul>
							<?php foreach ($rsMensagem as $sMensagem): ?>
								<li><strong>Nome do Contato: </strong> <?php echo $sMensagem->nome;?> / <strong>Email:</strong> <?php echo $sMensagem->email;?> / <strong>Celular:</strong> <?php echo $sMensagem->celular;?><br/>
									<strong>Mensagem: </strong><?php echo $sMensagem->mensagem;?>	<br/> <strong>Data/Hora:</strong> <?php echo $sMensagem->data_cadastro;?><br/><br/><br/>
								</li>
							<?php endforeach;?>
						</ul>
					</fieldset>

				</div>
				<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
