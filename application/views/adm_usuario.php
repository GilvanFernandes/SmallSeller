	<div class="container">
		<div class="sixteen columns services_div">
			<div class="Services_1_title_div">
				<h3>
					ADMINISTRAÇÃO | Usuário / Cliente
				</h3>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="clearfix"></div>
		<div class="contact_form_div">

				<div class="eight columns alpha">

					<?php echo validation_errors("<div class=\"alert alert-danger\">","</div>"); ?>
					<?php echo form_open('catalogo/admUsuarioCriar', array('class' => '')); ?>

					<fieldset id="contact_form">

						<div id="result"></div>
					    <label for="name"><span class="contact_label">Nome Completo <span class="red_text">*</span></span><br/>
					    <input type="text" name="nome" id="name" placeholder="Nome"/>
					    </label>

					    <label for="email"><span class="contact_label">Email <span class="red_text">*</span></span><br/>
					    <input type="email" name="email" id="email" placeholder="Email"/>
					    </label>

					    <label for="phone"><span class="contact_label">Senha <span class="red_text">*</span></span><br/>
					    <input type="password" value="internet" name="senha"  placeholder="Informe sua senha ou a senha será internet" />
					    </label>

					    <label><span class="contact_label">Tipo de Conta<span class="red_text">*</span></span><br/>
						<select style="width:450px" name="tipo">
							<option value="2"> Cliente</option>
							<option value="1"> Administrador</option>
						</select>
						</label>

					    <button class="submit_btn" id="submit_btn">Enviar</button>

					</fieldset>
					<?php if (!empty($sRetorno)): ?>
					<div>
						<strong><?php echo $sRetorno; ?></strong>
					</div>
					<?php endif; ?>

					</form>


				</div>
				<div class="eight columns omega">

					<fieldset id="contact_form">
						<ul>
							<?php foreach ($rsClientes as $sCliente): ?>
								<li>Nome: <?php echo $sCliente->nome;?> / <?php echo $sCliente->email;?> / <?php echo $sCliente->tipo;?> </li>
							<?php endforeach;?>
						</ul>

					</fieldset>

				</div>
				<div class="clearfix"></div>
		</div>


		<div class="clearfix"></div>
	</div>
