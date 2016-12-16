	<div class="container">
		<div class="sixteen columns services_div">
			<div class="Services_1_title_div">
				<h3>
					Faça sua encomenda, entre em contato =D
				</h3>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="clearfix"></div>
		<div class="contact_form_div">
				<div class="eight columns alpha">
					<div class="google_maps_div">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.0069146688074!2d-51.234359384885096!3d-30.036659481885106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9519791b4e623965%3A0x435e3ec5138ae62b!2silegra!5e0!3m2!1spt-BR!2sbr!4v1481858591973" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="eight columns omega">

					<?php echo validation_errors("<div class=\"alert alert-danger\">","</div>"); ?>
					<?php echo form_open('catalogo/contatoCriar', array('class' => '')); ?>

					<fieldset id="contact_form">

						<div id="result"></div>
					    <label for="name"><span class="contact_label">Nome Completo <span class="red_text">*</span></span><br/>
					    <input type="text" name="nome" id="name" placeholder="Seu Nome"/>
					    </label>

					    <label for="email"><span class="contact_label">Email <span class="red_text">*</span></span><br/>
					    <input type="email" name="email" id="email" placeholder="Seu Email"/>
					    </label>

					    <label for="phone"><span class="contact_label">Celular </span><br/>
					    <input type="text" name="celular" id="phone" placeholder="Seu Celular" />
					    </label>

					    <label for="message"><span class="contact_label">Mensagem <span class="red_text">*</span></span><br/>
					    <textarea rows="4" cols="50" name="mensagem" id="mensagem" placeholder="Sua Mensagem" ></textarea>
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
				<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
